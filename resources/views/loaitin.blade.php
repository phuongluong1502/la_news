<aside class="widget widget_categories">
  <h4 class="widget-title">LOẠI TIN</h4>
  <ul>
    <?php 
      $kq = DB::select("SELECT Ten_KhongDau, loaitin.idLT, loaitin.Ten as TenLT, count(*) as SoTin FROM loaitin, tin
        WHERE tin.idLT = loaitin.idLT AND tin.lang = '$lang' AND loaitin.AnHien=1 
        GROUP BY loaitin.idLT, loaitin.Ten, Ten_KhongDau
        ORDER BY count(*) DESC LIMIT 0, 5");
    ?>
    @foreach($kq as $row)
    <li><a href="<?=URL::to("/loai");?>/{{$row->Ten_KhongDau}}">{{$row->TenLT}} <span class="categories-count">{{$row->SoTin}}</span></a></li>
    @endforeach
  </ul>
</aside> <!-- end widget categories -->