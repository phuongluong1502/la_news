<?php 
  $kq = DB::select("SELECT idTin,TieuDe_KhongDau, TieuDe, Ngay, TomTat, urlHinh, loaitin.Ten as TenLT FROM tin, loaitin WHERE tin.idLT = loaitin.idLT AND tin.AnHien=1 AND tin.lang=? ORDER BY rand() DESC LIMIT 0, 3",array($lang));
?>

<aside class="widget widget-rating-posts">
  <h4 class="widget-title">Bạn Xem Chưa</h4>
  @foreach($kq as $row)
  <article class="entry">
    <div class="entry__img-holder">
      <a href="<?=URL::to("/tin/{$row->TieuDe_KhongDau}");?>">
        <div class="thumb-container thumb-60">
          <img data-src="{{$row->urlHinh}}" src="{{$row->urlHinh}}" class="entry__img lazyload" alt="" onerror="this.src='img/defaultimg.jpg'" >
        </div>
      </a>
    </div>

    <div class="entry__body">
      <div class="entry__header">
        
        <h2 class="entry__title">
          <a href="<?=URL::to("/tin");?>/{{$row->TieuDe_KhongDau}}">{{$row->TieuDe}}</a>
        </h2>
        <ul class="entry__meta">
          <li class="entry__meta-date">
            {{date('d/m/Y',strtotime($row->Ngay))}}
          </li>
        </ul>
      </div>
    </div>
  </article>
  @endforeach
</aside> 