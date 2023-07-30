@extends('dashboard.layouts.main')

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
 <a href="/dashboard/obatkeluar/tambah" class="btn btn-success mb-3 tambah"><span data-feather="plus"></span></a> 


    <div class="row justify-content-end">
            <div class="col-md-3">
              <form action="/dashboard/obatkeluar" method="GET">
                <div class="input-group mb-3">
                  <input type="search" class="form-control" placeholder="Cari Obat....." name="search">
                  <button class="btn btn-success" type="submit"><span data-feather="search"></span></button>
                </div>
              </form>
            </div>
      </div>  

      <br>
        <h6>SubTotal Obat Keluar : Rp. {{ number_format($total_keluar,0,',','.') }}</h6>
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
              <!-- <th scope="col">Opsi</th> -->
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
                <!-- <td>
                  <a href="/dashboard/obatkeluar/hapusobatkeluar/{{$ok->kode_ok}}" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#hapus{{ $ok->kode_ok }}"><span data-feather="trash-2"></a>
                  <div class="modal fade" id="hapus{{ $ok->kode_ok }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Obat Keluar</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda Yakin Ingin Menghapus Data Obat Keluar <b>{{ $ok->nama_obat }}</b>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <a href="/dashboard/obatkeluar/hapusobatkeluar/{{$ok->kode_ok}}" class="btn btn-danger">Hapus</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td> -->
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $obatkeluar->links() }}
        <br><br>
        <!-- <a href="/dashboard/obatkeluar/cetak" class="btn btn-success mb-3 cetak"><span data-feather="printer"></span></a> -->
      </div>
@endsection