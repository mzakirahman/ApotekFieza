@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
  <h1 class="h2">Update Data Obat Masuk</h1>
</div>
<a href="/dashboard/obatmasuk" class="btn btn-success mb-3">Kembali</a><br>

<!-- <div class="alert alert-warning col-lg-8" id="myAlert">
  Data Berhasil Di Update
</div> -->

<div class="col-lg-8">
    <form action="/dashboard/obatmasuk/update" method="post" >
        {{csrf_field()}}
        @foreach($obatmasuk as $b)
            <input type="hidden" name="kode_om" value="{{$b->kode_om}}">

            <label for="kode_om">Kode Obat Masuk</label><br>
            <input type="text" class="form-control" name="kode_om" readonly="" value="{{$b->kode_om}},{{ 'OM-'.$kd }}"><br>

            <label for="kode_obat">Kode Obat</label><br>
            <input type="text" class="form-control" name="kode_obat" value="{{$b->kode_obat}}"><br>

            <label for="tgl_msk">Tanggal Masuk</label><br>
            <input type="date" class="form-control" name="tgl_msk" value="{{$b->tgl_msk}}"> <br>

            <label for="nama_obat">Nama Obat</label><br>
            <input type="text" class="form-control" name="nama_obat" value="{{$b->nama_obat}}"> <br>

            <label for="jumlah">Jumlah</label><br>
            <input type="text" class="form-control" name="jumlah" value="{{$b->jumlah}}"> <br>

            <label for="satuan">Satuan</label><br>
            <input type="text" class="form-control" name="satuan" value="{{$b->satuan}}"> <br>

            <label for="harga">Harga</label><br>
            <input type="date" class="form-control" name="harga" value="{{$b->harga}}"> <br>

            <label for="expied">Tanggal Expired Obat</label><br>
            <input type="date" class="form-control" name="expied" value="{{$b->expied}}"> <br>

            <input class=" btn btn-primary" type="submit" value="Update" onclick="myFunction()">
    </form>
    @endforeach
</div>
<!-- <script>
  var myAlert = document.getElementById('myAlert');

  myAlert.style.display='none'

  function myFunction(){
    myAlert.style.display='block'
  }
</script> -->

@endsection