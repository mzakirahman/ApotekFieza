<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<center><h1>Data Obat Masuk</h1></center>
<h4>SubTotal Obat Keluar : </h4>
<table id="customers">
  
  <tr>
    <th>No</th>
    <th>Kode Obat</th>
    <th>Nama Obat</th>
    <th>Tanggal Keluar</th>
    <th>Jumlah</th>
    <th>Satuan</th>
    <th>Harga</th>
    <th>Total</th>
  </tr>
  @foreach($obatkeluar as $ok)
  <tr>
    <td>{{ $ok->kode_ok }}</td>
    <td>{{ $ok->kode_obat }}</td>
    <td>{{ $ok->nama_obat }}</td>
    <td>{{ $ok->tgl_klr }}</td>
    <td>{{ $ok->jumlah }}</td>
    <td>{{ $ok->satuan }}</td>
    <td>{{ $ok->harga }}</td>
    <td>{{ $ok->total }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>