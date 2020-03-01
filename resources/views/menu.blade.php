<ul class="nav__menu">

  <li class="nav__dropdown">
    <a href="<?=URL::to('/');?>">{{ trans('mes.tc') }}  </a>
  </li>
  <?php
    $kq = DB::select("select idTL, TenTL from theloai WHERE AnHien=1 AND HienMenu=1 AND lang=? order by ThuTu", array($lang));
  ?>
  @foreach($kq as $rowTL)
  <li class="nav__dropdown">
    <a href="#"><?=$rowTL->TenTL?></a>
    <ul class="nav__dropdown-menu">
      <?php 
        $kq1 = DB::select("SELECT idLT, Ten, Ten_KhongDau FROM loaitin WHERE AnHien = 1 and idTL=? ORDER BY ThuTu", array($rowTL->idTL));
      ?>
      @foreach($kq1 as $rowLT)
      <li><a href="<?=URL::to("/loai");?>/{{$rowLT->Ten_KhongDau}}"><?=$rowLT->Ten?></a></li>
      @endforeach
    </ul>
  </li>
  @endforeach                
  <li>
    <a href="<?=URL::to("/");?>/lienhe">{{ trans('mes.lh') }}</a>
  </li>


</ul> <!-- end menu -->
