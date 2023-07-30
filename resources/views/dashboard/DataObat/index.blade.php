@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
  <h1 class="">Data Obat</h1>
</div>
<div class="table-responsive">
<style type="text/css">
        .pagination li{
            float:left;
            list-style-type: none;
            margin:10px;
        }
    </style>
  <a href="/dashboard/dataobat/tambah" class="btn btn-success mb-3 tambah"><span data-feather="plus"></span></a>
    <div class="row justify-content-end">
            <div class="col-md-3">
              <form action="/dashboard/dataobat" method="GET">
                <div class="input-group mb-3">
                  <input type="search" class="form-control" placeholder="Cari Obat....." name="search">
                  <button class="btn btn-success" type="submit"><span data-feather="search"></span></button>
                </div>
              </form>
            </div>
      </div>  
      <h6>Total Harga Beli : Rp. {{ number_format($beli,0,',','.') }}</h6>
      <h6>Total Harga Jual : Rp. {{ number_format($jual,0,',','.') }} </h6>
      <br><br>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Kode Obat</th>
              <th scope="col">Nama Obat</th>
              <th scope="col">Jenis Obat</th>
              <th scope="col">Kategori</th>
              <th scope="col">Harga Beli</th>
              <th scope="col">Harga Jual</th>
              <th scope="col">Stok</th>
              <th scope="col">Satuan</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($obat as $o)
              <tr>
                <td>{{ $o->kode_obat }}</td>
                <td>{{ $o->nama_obat }}</td>
                <td>{{ $o->jenis_obat }}</td>
                <td>{{ $o->kategori }}</td>
                <td>{{ formatRupiah($o->harga_beli) }}</td>
                <td>{{ formatRupiah($o->harga_jual) }}</td>
                <td>{{ $o->stok }}</td>
                <td>{{ $o->satuan }}</td>
                <td>
                  <a href="/dashboard/dataobat/editdo/{{$o->kode_obat}}" class="badge bg-warning"><span data-feather="edit"></a>
                  | 
                  <a href="/dashboard/dataobat/hapusdo/{{$o->kode_obat}}" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#hapus{{ $o->kode_obat }}"><span data-feather="trash-2"></a>
                  <div class="modal fade" id="hapus{{ $o->kode_obat }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Obat</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda Yakin Ingin Menghapus Data <b>Obat {{ $o->nama_obat }}</b> 
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <a href="/dashboard/dataobat/hapusdo/{{$o->kode_obat}}" class="btn btn-danger">Hapus</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $obat->links() }}
        <br><br>
        <!-- <a href="/dashboard/dataobat/cetak" target="_blank" class="btn btn-success mb-3 cetak"><span data-feather="printer"></span></a> -->
      </div>   
@endsection

