<?php 
  $kq = DB::select("select Ten_KhongDau, idTin, TieuDe,TieuDe_KhongDau, Ngay, TomTat, urlHinh, loaitin.Ten as TenTL FROM tin, loaitin WHERE tin.idLT = loaitin.idLT AND tin.AnHien=1 AND TinNoiBat=1 AND tin.lang=? ORDER BY idTin DESC LIMIT 0,4", array($lang));
?>
<section class="featured-posts-grid">
  <div class="container">
    <div class="row row-8">

      <div class="col-lg-6">
        
        <!-- Small post -->
        @for($i = 0; $i<3;$i++)
        <?php $row = $kq[$i]; ?>        
        <div class="featured-posts-grid__item featured-posts-grid__item--sm">
          <article class="entry card post-list featured-posts-grid__entry">
            <div class="entry__img-holder post-list__img-holder card__img-holder" style="background-image: url(<?=$row->urlHinh?>)">
              <a href="<?=URL::to("/tin/{$row->TieuDe_KhongDau}"); ?>" class="thumb-url"></a>
              <img src="<?=$row->urlHinh?>" alt="" class="entry__img d-none" onerror="this.src='img/defaultimg.jpg'">
              <a href="<?=URL::to("/loai");?>/{{$row->Ten_KhongDau}}" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet"><?=$row->TenTL?></a>
            </div>

            <div class="entry__body post-list__body card__body">  
              <h2 class="entry__title">
                <a href="<?=URL::to("/tin/{$row->TieuDe_KhongDau}"); ?>"><?=$row->TieuDe?></a>
              </h2>
              <ul class="entry__meta">
                <li class="entry__meta-date">
                  <?=date('d/m/Y',strtotime($row->Ngay))?>
                </li>              
              </ul>
            </div>
          </article>
        </div> <!-- end post -->
        @endfor

      </div> <!-- end col -->

      <div class="col-lg-6">
        <?php $row = $kq[3]; ?>
        <!-- Large post -->
        <div class="featured-posts-grid__item featured-posts-grid__item--lg">
          <article class="entry card featured-posts-grid__entry">
            <div class="entry__img-holder card__img-holder">
              <a href="<?=URL::to("/tin/{$row->TieuDe_KhongDau}");?>">
                <img src="<?=$row->urlHinh?>" alt="" class="entry__img" onerror="this.src='img/defaultimg.jpg'">
              </a>
              <a href="<?=URL::to("/loai");?>/{{$row->Ten_KhongDau}}" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--green"><?=$row->TenTL?></a>
            </div>

            <div class="entry__body card__body">   
              <h3 class="entry__title">
                <a href="<?=URL::to("/tin/{$row->TieuDe_KhongDau}");?>"><?=$row->TieuDe?></a>
              </h3>
              <ul class="entry__meta">
                <li class="entry__meta-date">
                  <?=date('d/m/Y',strtotime($row->Ngay))?>
                </li>              
              </ul>
            </div>
          </article>
        </div> <!-- end large post -->
      </div>          

    </div>
  </div>
</section> <!-- end featured posts grid -->
