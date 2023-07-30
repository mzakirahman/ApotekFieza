<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\ObatMasuk;
use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardDataObatmasukAdminController extends Controller
{
    public function index(Request $request){

        if($request->has ('search')){
            $obatmasuk = DB::table('obatmasuk')->where('nama_obat','LIKE','%'.$request->search.'%')->paginate(10);
        }else{
            $obatmasuk = DB::table('obatmasuk')->paginate(10);
        }
        
        $hargamasuk = DB::table('obatmasuk')->sum('harga');

        return view('Dashboard.DataObatMasuk.index2', compact('obatmasuk','hargamasuk'));
    }

    public function cetak(){
        return view ('Dashboard.DataObatMasuk.cetakAdmin');
    }

    public function cetakPertanggal($tglAwal, $tglAkhir){
        $hargamasuk =0;

        $obatmasuk = ObatMasuk::with(['obat'])->whereBetween('tgl_msk',[$tglAwal, $tglAkhir])->get();
        $obat = Obat::all();
        $data=[];
        foreach ($obat as $key => $obt) {   
            $jum=0;
            $total_jual=0;
            $dt=[];
            foreach ($obatmasuk as $key => $val) {
                if($obt->kode_obat==$val->kode_obat){
                    $total_jual+=$val->total;
                    $jum+=$val->jumlah;
                    $hargamasuk+=$val->jumlah*$val->harga;
                    $dt=[
                        'kode_obat'=> $val->kode_obat,
                        'nama_obat'=> $val->nama_obat,
                        'jumlah'=> $jum,
                        'harga'=> $val->harga,
                        'satuan'=>$val->satuan,
                    ];
                }
            }
            if(!empty($dt)){
                array_push($data,json_decode(json_encode($dt)));
            }
        }
        return view('Dashboard.DataObatMasuk.cetakPertanggalOM', compact('data','hargamasuk','tglAwal','tglAkhir'));
    }

    public function tambah(){
        $q =DB::table('obatmasuk')->select(DB::raw('MAX(RIGHT(kode_om,3)) as kode'));
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
        return view('Dashboard.DataObatMasuk.tambahadmin', compact('kd'));
    }

    public function store(Request $request){
        $rules = [
            'kode_om'=>'required',
            'kode_obat'=>'required',
            'tgl_msk'=>'required',
            'nama_obat'=>'required',
            'jumlah'=>'required',
            'satuan'=>'required',
            'harga'=>'required',
            'expired'=>'required',

        ];

        $message = [
            'kode_om.required' => ' kode obat masuk tidak boleh kosong',
            'kode_obat.required' => ' kode obat tidak boleh kosong',
            'tgl_msk.required' => ' tanggal masuk tidak boleh kosong',
            'nama_obat.required' => ' nama obat tidak boleh kosong',
            'jumlah.required' => ' jumlah tidak boleh kosong',
            'satuan.required' => ' satuan tidak boleh kosong',
            'harga.required' => ' harga tidak boleh kosong',
            'expired.required' => ' expired tidak boleh kosong',
        ];

        $this->validate($request, $rules, $message);
        DB::table('obatmasuk')->insert([
            'kode_om'=>$request->kode_om,
            'kode_obat'=>$request->kode_obat,
            'tgl_msk'=>$request->tgl_msk,
            'nama_obat'=>$request->nama_obat,
            'jumlah'=>$request->jumlah,
            'satuan'=>$request->satuan,
            'harga'=>$request->harga,
            'expired'=>$request->expired,
        ]);
        Alert::success('Di Tambah','Data Obat Masuk Berhasil Di Tambah');
        return redirect('/admin/obatmasuk');
    }
}
