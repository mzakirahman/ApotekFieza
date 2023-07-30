@extends('dashboard.layouts.main2')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
  <h1 class="h2">Data Obat Keluar</h1>
</div>
<div class="table-responsive">
<style type="text/css">
        .pagination li{
            float:left;
            list-style-type: none;
            margin:10px;
        }
    </style>
 <a href="/admin/obatkeluar/tambah" class="btn btn-success mb-3 tambah"><span data-feather="plus"></span></a> 

    <div class="row justify-content-end">
            <div class="col-md-3">
              <form action="/admin/obatkeluar" method="GET">
                <div class="input-group mb-3">
                  <input type="search" class="form-control" placeholder="Cari Obat....." name="search">
                  <button class="btn btn-success" type="submit"><span data-feather="search"></span></button>
                </div>
              </form>
            </div>
      </div>  
      <h6>SubTotal Obat Keluar : Rp. {{ number_format($total,0,',','.') }}</h6>
      <br><br>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
            <th scope="col">Kode OK</th>
              <th scope="col">Kode Obat</th>
              <th scope="col">Nama Obat</th>
              <th scope="col">Tanggal Keluar</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Satuan</th>
              <th scope="col">Harga</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach($obatkeluar as $ok)
              <tr>
              <td>{{ $ok->kode_ok }}</td>
                <td>{{ $ok->kode_obat }}</td>
                <td>{{ $ok->nama_obat }}</td>
                <td>{{ $ok->tgl_klr }}</td>
                <td>{{ $ok->jumlah }}</td>
                <td>{{ $ok->satuan }}</td>
                <td>{{ formatRupiah($ok->harga) }}</td>
                <td>{{ formatRupiah($ok->jumlah * $ok->harga) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $obatkeluar->links() }}
        <br><br>
        <a href="/admin/obatkeluar/cetak" class="btn btn-success mb-3 cetak"><span data-feather="printer"></span></a>
      </div>

  <style>
  .cetak{
    float: right;
    border-radius: 50%;
  }
</style> 
@endsection