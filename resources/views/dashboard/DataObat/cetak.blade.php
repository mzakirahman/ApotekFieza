<!DOCTYPE html>
<html lang="en">
<head>
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
    <p align="center"><b>Laporan Data Obat</b></p>
      <br>
      <h6>Total Harga Beli : Rp. {{ number_format($beli,0,',','.') }}</h6>
      <h6>Total Harga Jual : Rp. {{ number_format($jual,0,',','.') }} </h6>
      <table class="static" position="Relative" align="center" rules="all" border="1px" style="width: 100%;">
      <tr>
              <th scope="col">Kode Obat</th>
              <th scope="col">Nama Obat</th>
              <th scope="col">Jenis Obat</th>
              <th scope="col">Kategori</th>
              <th scope="col">Harga Beli</th>
              <th scope="col">Harga Jual</th>
              <th scope="col">Stok</th>
              <th scope="col">Satuan</th>
        </tr>
        @foreach($obat as $o)
            <tr>
            <td>{{ $o->kode_obat }}</td>
            <td>{{ $o->nama_obat }}</td>
            <td>{{ $o->jenis_obat }}</td>
            <td>{{ $o->kategori }}</td>
            <td>Rp. {{ $o->harga_beli }}</td>
            <td>Rp. {{ $o->harga_jual }}</td>
            <td>{{ $o->stok }}</td>
            <td>{{ $o->satuan }}</td>
            </tr>
        @endforeach
      </table>
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