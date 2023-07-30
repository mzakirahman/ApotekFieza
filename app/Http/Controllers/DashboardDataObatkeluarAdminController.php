<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use App\Models\ObatKeluar;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class DashboardDataObatkeluarAdminController extends Controller
{
    public function index(Request $request){

        if($request->has ('search')){
            $obatkeluar = DB::table('obatkeluar')->where('nama_obat','LIKE','%'.$request->search.'%')->paginate(10);
        }else{
            $obatkeluar = DB::table('obatkeluar')->paginate(10);
        }
        $total = DB::table('obatkeluar')->sum('total');

        return view('Dashboard.DataObatKeluar.index2', compact('obatkeluar','total'));
    }

    public function cetak(){
        return view ('Dashboard.DataObatKeluar.cetakAdmin');
    }

    public function cetakPertanggal($tglAwal, $tglAkhir){
        // get data obat keluar
        $obatkeluar = ObatKeluar::with(['obat'])->whereBetween('tgl_klr',[$tglAwal, $tglAkhir])->get();
        // get data daftar obat
        $obat = Obat::all();
        
        $profit=0; /** variable untuk menampung data keuntungan*/
        $jumlah=0; /** variable untuk menampung data jumlah obat terjual*/
        $data=[]; /** variable untuk menampung data obat keluar*/
        // total penjualan
        $total = DB::table('obatkeluar')->sum('total');
        // perulangan untuk menghitung data obat keluar
        foreach ($obat as $key => $obt) {   
            $jum=0; /** variable untuk menampung jumlah obat keluar per jenis obat */
            $total_jual=0; /** variable untuk menampung total penjualan obat per jenis obat */
            $dt=[]; /** variable untuk menampung sementara data obat keluar per jenis obat */
            
            // perulangan untuk menghitung jenis obat yang sama
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
                // memasukkan data obat keluar perjenis obat ke dalam array $data
                array_push($data,json_decode(json_encode($dt)));
            }
        }
        return view('Dashboard.DataObatKeluar.cetakPertanggalOK', compact('data','total','profit','jumlah','tglAwal','tglAkhir'));
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
        return view('Dashboard.DataObatKeluar.tambahadmin', compact('kd'));
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
        return redirect('/admin/obatkeluar');
    }
}

