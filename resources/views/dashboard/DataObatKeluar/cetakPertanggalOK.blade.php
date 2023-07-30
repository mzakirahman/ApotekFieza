<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Laporan Obat Keluar</title>
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
      <p align="center"><b>Laporan Obat Keluar</b></p>
      <p>SubTotal Obat Terjual : {{ number_format($jumlah,0,',','.') }} Obat <br>
        SubTotal Obat Keluar : Rp. {{ number_format($total,0,',','.') }} <br>
        SubTotal Keuntungan : Rp. {{ number_format($profit,0,',','.') }}</p>
      <table class="static" position="Relative" align="center" rules="all" border="1px" style="width: 100%;">
        <tr>
            <th scope="col">Kode Obat</th>
            <th scope="col">Nama Obat</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Satuan</th>
            <th scope="col">Harga</th>
            <th scope="col">Total</th>
        </tr>

        @foreach($data as $ok)
            <tr>
            <td>{{ $ok->kode_obat }}</td>
            <td>{{ $ok->nama_obat }}</td>
            <td>{{ $ok->jumlah }}</td>
            <td>{{ $ok->satuan }}</td>
            <td>Rp. {{ $ok->harga }}</td>
            <td>Rp. {{ $ok->total }}</td>
            </tr>
        @endforeach
      </table>
      <p>*Laporan obat keluar mulai tanggal {{$tglAwal}} sampai {{$tglAkhir}} </p>
      <br><br>
      <div style="width: 30%; text-align: left; float: right;">Mengetahui</div><br>
      <div style="width: 30%; text-align: left; float: right;">Pemilik Apotek</div><br><br><br><br><br>
      <div style="width: 30%; text-align: left; float: right;">Fieza</div>
    </div>
    <script type="text/javascript">
      window.print();
    </script>
</body>
</html>