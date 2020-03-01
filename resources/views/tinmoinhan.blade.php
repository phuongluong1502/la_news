<div class="trending-now">
  <span class="trending-now__label">
    <i class="ui-flash"></i>
    <span class="trending-now__text d-lg-inline-block d-none">{{ trans('mes.tinmn') }}  </span>
  </span>
  <div class="newsticker">
    <ul class="newsticker__list">
      <?php 
        $kq = DB::select("SELECT idTin, TieuDe, Ngay,TieuDe_KhongDau FROM tin WHERE idTL=21 LIMIT 0,3");
      ?>
      @foreach ( $kq as $row)
      <li class="newsticker__item"><a href="<?=URL::to("/tin"); ?>/{{$row->TieuDe_KhongDau}}" class="newsticker__item-url"><?= $row->TieuDe; ?> </a></li>
      @endforeach
    </ul>
  </div>
  <div class="newsticker-buttons">
    <button class="newsticker-button newsticker-button--prev" id="newsticker-button--prev" aria-label="next article"><i class="ui-arrow-left"></i></button>
    <button class="newsticker-button newsticker-button--next" id="newsticker-button--next" aria-label="previous article"><i class="ui-arrow-right"></i></button>
  </div>
</div>
