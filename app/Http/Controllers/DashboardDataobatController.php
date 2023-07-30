<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardDataobatController extends Controller
{
    public function index(Request $request){
        $obat = Obat::all();
        $beli = Obat::all()->sum('harga_beli');
        $jual = Obat::all()->sum('harga_jual');

        if($request->has ('search')){
            $obat = DB::table('obat')->where('nama_obat','LIKE','%'.$request->search.'%')->paginate(10);
        }else{
            $obat = DB::table('obat')->paginate(10);
        }

        return view('Dashboard.DataObat.index', compact('obat','beli','jual',));
    }

    public function cetak(){
        $obat = Obat::all();
        $beli = Obat::all()->sum('harga_beli');
        $jual = Obat::all()->sum('harga_jual');
        return view('Dashboard.DataObat.cetak', compact('obat','beli','jual',));
    }

    public function tambah(){
        $q =DB::table('obat')->select(DB::raw('MAX(RIGHT(kode_obat,3)) as kode'));
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

        return view('Dashboard.DataObat.tambah', compact('kd'));
    }

    public function store(Request $request){
        $rules = [
            'kode_obat'=>'required',
            'nama_obat'=>'required',
            'jenis_obat'=>'required',
            'kategori'=>'required',
            'harga_beli'=>'required',
            'harga_jual'=>'required',
            'stok'=>'required',
            'satuan'=>'required',
        ];

        $message = [ 
            'kode_obat.required' => ' Kode Obat Tidak Boleh Kosong ',
            'nama_obat.required' => ' Nama Obat Tidak Boleh Kosong ',
            'jenis_obat.required' => ' Jenis Obat Tidak Boleh Kosong ', 
            'harga_beli.required' => ' Harga Beli Tidak Boleh Kosong ',
            'harga_jual.required' => ' Harga Jual Tidak Boleh Kosong ',
            'stok.required' => ' Stok Tidak Boleh Kosong ',
            'satuan.required' => ' Satuan Tidak Boleh Kosong ',
        ];

        $this->validate($request, $rules, $message);

        DB::table('obat')->insert([
            'kode_obat'=>$request->kode_obat,
            'nama_obat'=>$request->nama_obat,
            'jenis_obat'=>$request->jenis_obat,
            'kategori'=>$request->kategori,
            'harga_beli'=>$request->harga_beli,
            'harga_jual'=>$request->harga_jual,
            'stok'=>$request->stok,
            'satuan'=>$request->satuan,
        ]);
        Alert::success('Di Tambah','Data Obat Berhasil Ditambahkan.');
        return redirect('/dashboard/dataobat');

    }

    public function edit($kode_obat){
        $obat = DB::table('obat')->where('kode_obat',$kode_obat)->get();
        return view('/dashboard/dataobat/editdo',['obat'=>$obat]);
    }

    public function update(Request $request){
        DB::table('obat')->where('kode_obat',$request->kode_obat)->update([
            'kode_obat'=>$request->kode_obat,
            'nama_obat'=>$request->nama_obat,
            'jenis_obat'=>$request->jenis_obat,
            'kategori'=>$request->kategori,
            'harga_beli'=>$request->harga_beli,
            'harga_jual'=>$request->harga_jual,
            'stok'=>$request->stok,
            'satuan'=>$request->satuan,
        ]);

        Alert::success('Di Update','Data Obat Berhasil Diupdate.');
        return redirect('/dashboard/dataobat');
    }

    public function hapus($kode_obat){
        DB::table('obat')->where('kode_obat',$kode_obat)->delete();
        Alert::success('Dihapus','Data Obat Telah Dihapus!!.');
        return redirect('/dashboard/dataobat');
    }

        public function show(Request $request){
            $kode=$request->get('kode_obat');
            $data_obat=Obat::where('kode_obat',$kode)->get();
            return $data_obat;
        }      
}
