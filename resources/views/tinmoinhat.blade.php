<style>
h2.entry__title {height:45px}
div.entry__excerpt p {font-size:17px; text-align:justify; }
div.entry__excerpt {height:83px; overflow:hidden; }

</style>
<?php 
  $kq = DB::select("SELECT giatri from cauhinh where id =1");
  $idLTs = $kq[0]->giatri;
  $kq = DB::select("SELECT idLT, Ten as TenLT FROM loaitin WHERE idLT in  ($idLTs)");
?>

<section class="section tab-post mb-16">
  <div class="title-wrap title-wrap--line">
    <h3 class="section-title">Tin Mới</h3>

    <div class="tabs tab-post__tabs"> 
      <ul class="tabs__list">
        <li class="tabs__item tabs__item--active">
          <a href="#tab-all" class="tabs__trigger">Tất cả</a>
        </li>
        @foreach($kq as $row)
        <li class="tabs__item">
          <a href="#tab-{{$row->idLT}}" class="tabs__trigger">{{$row->TenLT}}</a>
        </li>
        @endforeach
      </ul> <!-- end tabs -->
    </div>
  </div>

  <!-- tab content -->
  <div class="tabs__content tabs__content-trigger tab-post__tabs-content">
    
    <div class="tabs__content-pane tabs__content-pane--active" id="tab-all">
      <div class="row card-row">
      <?php 
        $arr = explode(",", $idLTs);
        foreach($arr as $idLT){
        $tinmn = DB::select("SELECT idTin,TieuDe,Ngay,TomTat, urlHinh ,TieuDe_KhongDau
        FROM tin WHERE idLT = $idLT AND AnHien=1 and lang=? 
        ORDER BY idTin DESC LIMIT 0, 2",array($lang));
        foreach($tinmn as $t){
      ?>

        <div class="col-md-6">
          <article class="entry card">
            <div class="entry__img-holder card__img-holder">
              <a href="<?=URL::to("/tin");?>/{{$t->TieuDe_KhongDau}}">
                <div class="thumb-container thumb-70">
                  <img data-src="{{$t->urlHinh}}" src="img/empty.png" class="entry__img lazyload" alt="" />
                </div>
              </a>
              <a href="#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet">world</a>
            </div>

            <div class="entry__body card__body">
              <div class="entry__header">
                
                <h2 class="entry__title">
                  <a href="<?=URL::to("/tin");?>/{{$t->TieuDe_KhongDau}}">{{$t->TieuDe}}</a>
                </h2>
                <ul class="entry__meta">
                  <li class="entry__meta-date">
                    {{date('d/m/Y',strtotime($t->Ngay))}}
                  </li>
                </ul>
              </div>
              <div class="entry__excerpt">
                <p>{{$t->TomTat}}</p>
              </div>
            </div>
          </article>
        </div>
        <?php }?>
        <?php }?>
      </div>
    </div> <!-- end pane 1 -->
    <?php $arr = explode(",", $idLTs);?>
    @foreach($arr as $idLT)
    <div class="tabs__content-pane" id="tab-<?=$idLT?>">
      <div class="row card-row">
        <?php 
        $tinmn = DB::select("SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, TieuDe_KhongDau 
           FROM tin WHERE idLT = $idLT AND AnHien=1 and lang=? 
           ORDER BY idTin DESC LIMIT 0, 2",array($lang));?>
        @foreach($tinmn as $t )      
        <div class="col-md-6">
          <article class="entry card">
            <div class="entry__img-holder card__img-holder">
              <a href="<?=URL::to("/tin");?>/{{$t->TieuDe_KhongDau}}">{{$t->TieuDe}}">
                <div class="thumb-container thumb-70">
                  <img data-src="{{$t->urlHinh}}" src="img/empty.png" class="entry__img lazyload" alt="" onerror="this.src='img/defaultimg.jpg'" />
                </div>
              </a>
              <a href="#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--orange">mining</a>
            </div>

            <div class="entry__body card__body">
              <div class="entry__header">
                
                <h2 class="entry__title">
                  <a href="<?=URL::to("/tin");?>/{{$t->TieuDe_KhongDau}}">{{$t->TieuDe}}</a>
                </h2>
                <ul class="entry__meta">
                  <li class="entry__meta-date">
                    <?=date('d/m/Y',strtotime($t->Ngay))?>
                  </li>
                </ul>
              </div>
              <div class="entry__excerpt">
                <p>{{$t->TomTat}}</p>
              </div>
            </div>
          </article>
        </div>           
        @endforeach     
      </div>
    </div> <!-- end pane 2 -->
    @endforeach
  </div> <!-- end tab content -->            
</section> <!-- end latest news -->