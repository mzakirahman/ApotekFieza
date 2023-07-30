@extends('dashboard.layouts.main2')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
  <h1 class="h2">Update Data Obat</h1>
</div>
<a href="/admin/dataobat" class="btn btn-success mb-3">Kembali</a><br>
<!-- <div class="alert alert-warning col-lg-8" id="myAlert">
  Data Berhasil Di Update
</div> -->
<div class="col-lg-8">
    <form action="/admin/dataobat/update" method="post" >
        {{csrf_field()}}
        @foreach($obat as $b)
            <input type="hidden" name="kode_obat" value="{{$b->kode_obat}}">

            <label for="kode_obat">Kode Obat</label><br>
            <input type="text" class="form-control" readonly="" name="kode_obat" value="{{$b->kode_obat}}"><br>

            <label for="nama_obat">Nama Obat</label><br>
            <input type="text" class="form-control" name="nama_obat" value="{{$b->nama_obat}}"> <br>
            
            <label for="jenis_obat">Jenis Obat</label><br>
            <input type="text" class="form-control" name="jenis_obat" value="{{$b->jenis_obat}}"> <br>

            <label for="kategori">Kategori</label><br>
            <input type="text" class="form-control" name="kategori" value="{{$b->kategori}}"> <br>

            <label for="harga_beli">Harga Beli</label><br>
            <input type="text" class="form-control" name="harga_beli" value="{{$b->harga_beli}}"> <br>
            
            <label for="harga_jual">Harga Jual</label><br>
            <input type="text" class="form-control" name="harga_jual" value="{{$b->harga_jual}}"> <br>

            <label for="stok">Stok</label><br>
            <input type="text" class="form-control" name="stok" value="{{$b->stok}}"> <br>

            <label for="satuan">Satuan</label><br>
            <input type="text" class="form-control" name="satuan" value="{{$b->satuan}}"> <br>

            <input class=" btn btn-primary" type="submit" value="Update" onclick="myFunction()">
    </form>
    @endforeach
</div>
@endsection