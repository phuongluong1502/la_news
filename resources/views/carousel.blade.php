<?php 
  $kq = DB::select("SELECT giatri FROM cauhinh WHERE id=2");
  $idLTs = $kq[0]->giatri;
  $kq = DB::select("SELECT idLT, Ten as TenLT FROM loaitin WHERE idLT in ($idLTs)");

  $idLT = $kq[0]->idLT;
  $TenLT= $kq[0]->TenLT;
?>

<section class="section mb-0">
  <div class="title-wrap title-wrap--line title-wrap--pr">
    <h3 class="section-title">{{$TenLT}}</h3>
  </div>

  <!-- Slider -->
  <div id="owl-posts" class="owl-carousel owl-theme owl-carousel--arrows-outside">
    <?php 
      $kq = DB::select("SELECT idTin, TieuDe,TieuDe_KhongDau, Ngay, TomTat, urlHinh
        FROM tin WHERE idLT in ($idLT) AND AnHien=1 and lang=?
        ORDER BY idTin DESC LIMIT 0, 8", array($lang));
    ?>
    @foreach($kq as $row)
    <article class="entry thumb thumb--size-1">
      <div class="entry__img-holder thumb__img-holder" style="background-image: url('{{$row->urlHinh}}');">
        <div class="bottom-gradient"></div>
        <div class="thumb-text-holder">   
          <h2 class="thumb-entry-title">
            <a href="<?=URL::to("/tin");?>/{{$row->TieuDe_KhongDau}}">{{$row->TieuDe}}</a>
          </h2>
        </div>
        <a href="<?=URL::to("/tin");?>/{{$row->TieuDe_KhongDau}}" class="thumb-url"></a>
      </div>
    </article>
    @endforeach
  </div> <!-- end slider -->

</section> <!-- end carousel posts -->