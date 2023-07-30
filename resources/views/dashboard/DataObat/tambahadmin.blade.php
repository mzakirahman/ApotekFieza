@extends('dashboard.layouts.main2')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
  <h1 class="h2">Tambah Data Obat</h1>
</div>
<a href="/admin/dataobat" class="btn btn-success mb-3"><span data-feather="arrow-left-circle"></span></a>

<div class="col-lg-8">
    <form action="/admin/dataobat/store" method="post" >
    {{csrf_field()}}
    <div class="mb-3">
        <label for="kode_obat" class="form-label">Kode Obat </label>
        <input type="text" class="form-control @error('kode_obat') is-invalid @enderror" readonly="" value="{{ 'O-'.$kd }}" id="kode_obat" name="kode_obat" value="{{old('kode_obat')}}">
        @error('kode_obat')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="nama_obat" class="form-label">Nama Obat</label>
        <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat" name="nama_obat" value="{{old('nama_obat')}}">
        @error('nama_obat')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="jenis_obat" class="form-label">Jenis Obat</label>
        <input type="text" class="form-control @error('jenis_obat') is-invalid @enderror" id="jenis_obat" name="jenis_obat" value="{{old('jenis_obat')}}">
        @error('jenis_obat')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" value="{{old('kategori')}}">
        @error('kategori')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="harga_beli" class="form-label">Harga Beli</label>
        <input type="" class="form-control @error('harga_beli') is-invalid @enderror tanpa-rupiah" id="harga_beli" name="harga_beli" value="{{old('harga_beli')}}">
        @error('harga_beli')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="harga_jual" class="form-label">Harga Jual</label>
        <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" name="harga_jual" value="{{old('harga_jual')}}">
        @error('harga_jual')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="stok" class="form-label">Stok </label>
        <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{old('stok')}}">
        @error('stok')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="satuan" class="form-label">Satuan </label>
        <input type="text" class="form-control @error('stok') is-invalid @enderror" id="satuan" name="satuan" value="{{old('satuan')}}">
        @error('satuan')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    
    <button type="submit" onclick="myFunction()" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection