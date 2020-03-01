<style> 
h2.entry__title {height:100px}
div.entry__excerpt p {font-size:17px; text-align:justify; }
div.entry__excerpt {height:110px; overflow:hidden; }
</style>
  <h1 class="page-title"><?=$TenLT?> </h1>
  <div class="row card-row">
    @foreach($listtin as $row)
    <div class="col-lg-6">
      <article class="entry card">
        <div class="entry__img-holder card__img-holder">
          <a href="<?=URL::to("/tin");?>/{{$row->TieuDe_KhongDau}}">
            <div class="thumb-container thumb-70">
              <img data-src="<?=$row->urlHinh?>" src="img/empty.png" class="entry__img lazyload" alt="" onerror="this.src='img/defaultimg.jpg'" />
            </div>
          </a>
          <a href="#" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet"><?=$TenLT?></a>
        </div>

        <div class="entry__body card__body">
          <div class="entry__header">
            
            <h2 class="entry__title">
              <a href="<?=URL::to("/tin");?>/{{$row->TieuDe_KhongDau}}"><?=$row->TieuDe?></a>
            </h2>
            <ul class="entry__meta">
              <li class="entry__meta-date">
                <?=date('d/m/Y',strtotime($row->Ngay))?> 
              </li>
            </ul>
          </div>
          <div class="entry__excerpt">
            <p><?=$row->TomTat?></p>
          </div>
        </div>
      </article>
    </div>
    @endforeach
  </div>

  <!-- Pagination -->
  <?php echo $listtin->links('vendor.pagination.default'); ?>