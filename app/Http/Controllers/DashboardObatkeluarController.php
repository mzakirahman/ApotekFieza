<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\ObatKeluar;
use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardObatkeluarController extends Controller
{

    public function index(Request $request){

        if($request->has ('search')){
            $obatkeluar = DB::table('obatkeluar')->where('nama_obat','LIKE','%'.$request->search.'%')->paginate(10);
        }else{
            $obatkeluar = DB::table('obatkeluar')->paginate(10);
        }
        $total = DB::table('obatkeluar')->sum('total');

        return view('Dashboard.DataObatKeluar.index',[
            'obatkeluar'=>$obatkeluar,
            'total_keluar'=>$total,
        ]);
    }

    // public function show(Request $request)
    // {
    //     $id=$request->get('id');
    //     $data_obat=Obat::find($id);
    //     return $data_obat;
    // }

    public function cetak(){
        return view ('Dashboard.DataObatKeluar.cetak');
    }

    public function cetakPertanggal($tglAwal, $tglAkhir){
        $obatkeluar = ObatKeluar::with(['obat'])->whereBetween('tgl_klr',[$tglAwal, $tglAkhir])->get();
        $obat = Obat::all();
        $profit=0;
        $jumlah=0;
        $data=[];
        $total = DB::table('obatkeluar')->sum('total');
        foreach ($obat as $key => $obt) {   
            $jum=0;
            $total_jual=0;
            $dt=[];
            foreach ($obatkeluar as $key => $val) {
                if($obt->kode_obat==$val->kode_obat){
                $sum=$val->total - ($val->obat->harga_beli*$val->jumlah);
                $total_jual+=$val->total;
                $profit+=$sum;
                $jumlah+=$val->jumlah;
                $jum+=$val->jumlah;
                $dt=[
                    'kode_obat'=> $val->kode_obat,
                    'nama_obat'=> $val->nama_obat,
                    'jumlah'=> $jum,
                    'harga'=> $val->harga,
                    'satuan'=>$val->satuan,
                    'total'=>$total_jual,
                ];
                }
            }
            if(!empty($dt)){
                array_push($data,json_decode(json_encode($dt)));
            }
        }
       
        // dd($data);
        return view('Dashboard.DataObatKeluar.cetakPertanggalOK', compact('data', 'total','profit','jumlah','tglAwal','tglAkhir'));
    }


    public function tambah(){
        $q =DB::table('obatkeluar')->select(DB::raw('MAX(RIGHT(kode_ok,3)) as kode'));
        $kd="";
        if($q->count()>0)
        {
            foreach($q->get() as $k){
                $tmp = ((int) $k->kode)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd ="001";
        }
        return view('Dashboard.DataObatKeluar.tambah', compact('kd'));
    }

    public function store(Request $request){
        $obat = obat::where('kode_obat',$request->kode_obat)->get('stok');
        $rules = [
            'kode_ok'=>'required',
            'kode_obat'=>'required',
            'nama_obat'=>'required',
            'tgl_klr'=>'required',
            'jumlah'=>'required|max:'.$obat[0]->stok,
            'satuan'=>'required',
            'harga'=>'required',
            'total'=>'required',

        ];

        $message = [
            'kode_ok.required' => ' kode obat keluar tidak boleh kosong',
            'kode_obat.required' => ' kode obat tidak boleh kosong',
            'nama_obat.required' => ' nama obat tidak boleh kosong',
            'tgl_klr.required' => ' tanggal keluar tidak boleh kosong',
            'jumlah.required' => ' jumlah tidak boleh kosong',
            'jumlah.max' => ' jumlah melebihi stok yang ada',
            'satuan.required' => ' satuan tidak boleh kosong',
            'harga.required' => ' harga tidak boleh kosong',
            'total.required' => ' total tidak boleh kosong',
        ];
        $this->validate($request, $rules, $message);

        DB::table('obatkeluar')->insert([
            'kode_ok'=>$request->kode_ok,
            'kode_obat'=>$request->kode_obat,
            'nama_obat'=>$request->nama_obat,
            'tgl_klr'=>$request->tgl_klr,
            'jumlah'=>$request->jumlah,
            'satuan'=>$request->satuan,
            'harga'=>$request->harga,
            'total'=>$request->total,
        ]);
        Alert::success('Di Tambah','Data Obat Keluar Berhasil Di Tambah');
        return redirect('/dashboard/obatkeluar');
    }

    // public function hapus($kode_ok){
    //     DB::table('obatkeluar')->where('kode_ok',$kode_ok)->delete();
    //     Alert::success('Di Hapus','Data Obat Keluar Telah Di Hapus!!');
    //     return redirect('/dashboard/obatkeluar');
    // }

}
