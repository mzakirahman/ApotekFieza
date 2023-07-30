@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
  <h1 class="h2">Data Obat Masuk</h1>
</div>
<div class="table-responsive">
<style type="text/css">
        .pagination li{
            float:left;
            list-style-type: none;
            margin:10px;
        }
    </style>
  <a href="/dashboard/obatmasuk/tambah" class="btn btn-success mb-3 tambah"><span data-feather="plus"></span></a> 
    <div class="row justify-content-end">
            <div class="col-md-3">
              <form action="/dashboard/obatmasuk" method="GET">
                <div class="input-group mb-3">
                  <input type="search" class="form-control" placeholder="Cari Obat....." name="search">
                  <button class="btn btn-success" type="submit"><span data-feather="search"></span></button>
                </div>
              </form>
            </div>
      </div>  
      <br>
        <h6>SubTotal Obat Masuk : Rp. {{ number_format($hargamasuk,0,',','.') }}</h6>
        <br><br>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Kode OM</th>
              <th scope="col">Kode Obat</th>
              <th scope="col">Tanggal Masuk</th>
              <th scope="col">Nama Obat</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Satuan</th>
              <th scope="col">Harga</th>
              <th scope="col">Expired Obat</th>
              <!-- <th scope="col">Opsi</th> -->
            </tr>
          </thead>
          <tbody>
            @foreach($obatmasuk as $om)
              <tr>
                <td>{{ $om->kode_om }}</td>
                <td>{{ $om->kode_obat }}</td>
                <td>{{ $om->tgl_msk }}</td>
                <td>{{ $om->nama_obat }}</td>
                <td>{{ $om->jumlah }}</td>
                <td>{{ $om->satuan }}</td>
                <td>{{ formatRupiah($om->harga) }}</td>
                <td>{{ $om->expired }}</td>
                <!-- <td>
                  <a href="/dashboard/obatmasuk/hapus/{{$om->kode_om}}" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#hapus{{ $om->kode_om }}"><span data-feather="trash-2"></a>
                  <div class="modal fade" id="hapus{{ $om->kode_om }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Obat Masuk</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda Yakin Ingin Menghapus Data Obat Masuk <b>{{ $om->nama_obat }}</b>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <a href="/dashboard/obatmasuk/hapus/{{$om->kode_om}}" class="btn btn-danger">Hapus</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td> -->
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $obatmasuk->links() }}
        <br><br>
        <!-- <a href="/dashboard/obatmasuk/cetak" class="btn btn-success mb-3 cetak"><span data-feather="printer"></span></a> -->
      </div>
@endsection
                 