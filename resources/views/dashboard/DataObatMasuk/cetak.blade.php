@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
  <h1 class="h2">Cetak Laporan Obat Masuk</h1>
</div>
<a href="/dashboard/obatmasuk" class="btn btn-success mb-3"><span data-feather="arrow-left-circle"></span></a>

<div class="col-lg-8">
    <div class="mb-3">
        <label for="label" class="form-label">Tanggal Awal </label>
        <input type="date" class="form-control" id="tglAwal" name="tglAwal">
    </div>

    <div class="mb-3">
        <label for="label" class="form-label">Tanggal Akhir </label>
        <input type="date" class="form-control" id="tglAkhir" name="tglAkhir">
    </div>

    <br><br>
    <a href="" onclick="this.href='/dashboard/obatmasuk/cetakPertanggal/'+ document.getElementById('tglAwal').value + '/' + document.getElementById('tglAkhir').value" target="_blank"
    class ="btn btn-success col-md-12"> Cetak Pertanggal <span data-feather="printer"></span></a>
    </form>
</div>
@endsection