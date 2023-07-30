<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet"/>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Apotek Fieza<span data-feather="briefcase"></a>

  <?php
  $date = date("Y-m-d");
  list($year, $month, $day) 
        = explode("-", date('y-m-d'));
  $result = $year.'-'.$month.'-'.$day;

  
  $stock = \DB::select("SELECT * from obat where stok < '5'");
  $exp = \DB::select("SELECT * from obatmasuk where expired <= '$result'");
  $total = count($stock) + count($exp);
  ?>
   
  <div class="navbar col-md-2 container">
    <li class="dropdown notification-menu">
      <a href="#" class="toggle" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-bell">
          <span class="notification">{{$total}}</span>
        </i>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenu">
        <li class="dropdown-item"><center>Perhatian</center></li>
          <li>
            <ul class="dropdown-item">
              @foreach($stock as $st)
              <li>
                  Stok {{$st->nama_obat}} Tersisa {{$st->stok}} {{$st->satuan}}
              </li>
              @endforeach
              @foreach($exp as $ex)
              <li>
                  Obat {{$ex->nama_obat}} dengan kode {{$ex->kode_om}} expired tanggal {{$ex->expired}}
              </li>
              @endforeach
            </ul>
          </li>
        </li>
      </ul>
    </div>
</header>

