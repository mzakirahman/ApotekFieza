<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Laporan Obat Masuk</title>
</head>
<body>
    <div class="form-group">
    <table width="100%">
    <tr>
      <td width="25" align="center"><img src="{{URL ('img/logoapotek.png') }}" width="40%"></td>
      <td width="50" align="center"><h2>Apotek Fieza</h2><span>Jl. Antara, Damon, Kec. Bengkalis, Kabupaten Bengkalis, Riau 28711</span><br><span>Telepon. 0822-8636-7786</span></td>
      <td width="25" align="center"><img src="{{URL ('img/logoapotek.png') }}" width="40%"></td>
    </tr>
    </table> 
    <hr><br>
      <p align="center"><b>Laporan Obat Masuk</b></p>
      <h6>SubTotal Obat Masuk : Rp. {{ number_format($hargamasuk,0,',','.') }}</h6>
      <table class="static" position="Relative" align="center" rules="all" border="1px" style="width: 100%;">
        <tr>
          <th>No</th>
          <th>Kode Obat</th>
          <th>Nama Obat</th>
          <th>Jumlah</th>
          <th>Satuan</th>
          <th>Harga</th>
        </tr>

        @foreach($data as $om)
          <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $om->kode_obat }}</td>
            <td>{{ $om->nama_obat }}</td>
            <td>{{ $om->jumlah }}</td>
            <td>{{ $om->satuan }}</td>
            <td>Rp. {{ $om->harga }}</td>
          </tr>
        @endforeach
      </table>
      <p>*Laporan obat masuk mulai tanggal {{$tglAwal}} sampai {{$tglAkhir}} </p>
      <br><br>
      <div style="width: 30%; text-align: left; float: right;">Mengetahui</div><br>
      <div style="width: 30%; text-align: left; float: right;">Pemilk Apotek</div><br><br><br><br><br>
      <div style="width: 30%; text-align: left; float: right;">Fieza</div>
    </div>
    <script type="text/javascript">
      window.print();
    </script>
</body>
</html>