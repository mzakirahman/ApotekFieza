@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
  <h1 class="h2">Tambah Data Obat Keluar</h1>
</div>
<a href="/dashboard/obatkeluar" class="btn btn-success mb-3"><span data-feather="arrow-left-circle"></span></a>

<div class="col-lg-8">
    <form action="/dashboard/obatkeluar/store" method="post" >
    {{csrf_field()}}

    <div class="mb-3">
        <label for="kode_ok" class="form-label">Kode Obat Keluar </label>
        <input type="text" class="form-control @error('kode_ok') is-invalid @enderror" id="kode_ok" readonly=""  value="{{ 'OK-'.$kd }}" name="kode_ok" value="{{old('kode_ok')}}">
        @error('kode_ok')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
     <?php
        $obat = \DB::select("SELECT * from obat");
    ?>

    <div class="mb-3">
        <label for="kode_obat" class="form-label">Kode Obat </label>
        <select name="kode_obat" id="kode_obat" class="form-control" required>
            <option value="hidden">-- Pilih Kode Obat --</option>
            @foreach($obat as $o)
                <option value="{{$o->kode_obat}}">{{$o->kode_obat}} --> {{ $o->nama_obat}}</option>
            @endforeach
        </select>
        {{-- <input type="text" class="form-control @error('kode_obat') is-invalid @enderror" id="kode_obat" name="kode_obat" value="{{old('kode_obat')}}">
        @error('kode_obat')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror --}}
    </div>

    <div class="mb-3">
        <label for="nama_obat" class="form-label">Nama Obat</label>
        <select name="nama_obat" id="nama_obat" class="form-control" required>
            <option value="hidden">-- Nama Obat --</option>
            @foreach($obat as $o)
                <option value="{{$o->nama_obat}}">{{$o->nama_obat}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tgl_klr" class="form-label">Tanggal Keluar</label>
        <input type="date" class="form-control @error('tgl_klr') is-invalid @enderror" id="tgl_klr" name="tgl_klr" value="{{old('tgl_klr')}}">
        @error('tgl_klr')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="" id="stok-label"></label><br>
        <label for="jumlah" class="form-label">Jumlah </label>
        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" max="" id="jumlah" name="jumlah" value="{{old('jumlah')}}">
        @error('jumlah')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="satuan" class="form-label">Satuan </label>
        <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan" value="{{old('satuan')}}">
        @error('satuan')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
       <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon1">Rp</span>
        </div>

        <input type="text" readonly="" class="form-control" id="harga" placeholder="harga....." name="harga" required>
       </div>
 </div>
<div class="mb-3">
        <label for="total" class="form-label">Total</label>
       <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon1">Rp</span>
        </div>

        <input type="text" readonly="" class="form-control" id="total" placeholder="Total....." name="total" required>
       </div>
 </div>
    <button type="submit" onclick="myFunction()" class="btn btn-primary">Tambah</button>
    </form>
</div>

{{-- <script src="/assets/js/core/jquery.3.2.1.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $("#jumlah").keyup(function(){
            var jumlah = $("#jumlah").val();
            var harga = $("#harga").val();

            var total = parseInt(harga) * parseInt(jumlah);
            $("#total").val(total);
        });
    });
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script type="text/javascript">

    $("#kode_obat").change(function(){
        var id = $("#kode_obat").val();
        console.log(id);
        $.ajax({    
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
        type:'get',
        url:"/dashboard/dataobat/show",
        data:{'kode_obat':id},
        dataType:'json',
        success:function(data){
            console.log(data);
            $('select option[value="' + data[0].nama_obat +'"]').prop("selected", true);
            $("#harga").val(data[0].harga_jual);
            $("#satuan").val(data[0].satuan);
            $("#stok-label").html("Stok Yang Tersedia : "+data[0].stok);
            $("#jumlah").attr({"max" : data[0].stok});
            $("#stok-val").val(data[0].stok);
            var harga = $("#harga").val();
            var jumlah = $("#jumlah").val();
            var total = harga * jumlah;
            $("#total").val(total);
        },
        error:function(error){
            console.log(error);
        }
        }); 

        $("#jumlah").on('input',function(){
            var harga = $("#harga").val();
            var jumlah = $("#jumlah").val();
            var total = harga * jumlah;
            $("#total").val(total);
        });

    });
   
</script>

@endsection