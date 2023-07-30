@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
  <h1 class="h2">Tambah Data Obat Masuk</h1>
</div>
<a href="/dashboard/obatmasuk" class="btn btn-success mb-3"><span data-feather="arrow-left-circle"></span></a>


<div class="col-lg-8">
    <form action="/dashboard/obatmasuk/store" method="post" >
    {{csrf_field()}}

    <div class="mb-3">
        <label for="kode_om" class="form-label">Kode Obat Masuk </label>
        <input type="text" class="form-control @error('kode_om') is-invalid @enderror" id="kode_om" readonly  value="{{ 'OM-'.$kd }}" name="kode_om" value="{{old('kode_om')}}">
        @error('kode_om')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <?php
        $obat = \DB::select("SELECT * from obat");
    ?>

    <div class="mb-3">
        <label for="kode_obat" class="form-label">Kode Obat</label>
        <select name="kode_obat" id="kode_obat" class="form-control" required>
            <option value="hidden" >-- Kode Obat --</option>
            @foreach($obat as $o)
                <option value="{{$o->kode_obat}}">{{$o->kode_obat}} --> {{ $o->nama_obat}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tgl_msk" class="form-label">Tanggal Masuk</label>
        <input type="date" class="form-control @error('tgl_msk') is-invalid @enderror" id="tgl_msk" name="tgl_msk" value="{{old('tgl_msk')}}">
        @error('tgl_msk')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="nama_obat" class="form-label">Nama Obat</label>
        <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" readonly id="nama_obat" name="nama_obat" value="{{old('nama_obat')}}">
        @error('nama_obat')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah </label>
        <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{old('jumlah')}}">
        @error('jumlah')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="satuan" class="form-label">Satuan </label>
        <input type="text" class="form-control @error('satuan') is-invalid @enderror" readonly id="satuan" name="satuan" value="{{old('satuan')}}">
        @error('satuan')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{old('harga')}}" readonly>
        @error('harga')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="expired" class="form-label">Tanggal Expired Obat</label>
        <input type="date" class="form-control @error('expired') is-invalid @enderror" id="expired" name="expired" value="{{old('expired')}}">
        @error('expired')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <button type="submit" onclick="myFunction()" class="btn btn-primary">Tambah</button>
    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

    $("#kode_obat").change(function(){
        var id = $("#kode_obat").val();
        $.ajax({    
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
        type:'get',
        url:"/dashboard/dataobat/show",
        data:{'kode_obat':id},
        dataType:'json',
        success:function(data){
            console.log(data)
            $("#nama_obat").val(data[0].nama_obat);
            $("#satuan").val(data[0].satuan);
            $("#harga").val(data[0].harga_beli);
        },
        error:function(error){
            console.log(error);
        }
        });
    });
   
</script>
@endsection