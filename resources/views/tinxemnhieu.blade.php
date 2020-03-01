
  <!-- Widget Popular Posts -->
  <aside class="widget widget-popular-posts">
    <h4 class="widget-title">Tin Xem Nhiều</h4>
    <ul class="post-list-small">
      <?php 
      $kq = DB::select("SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, TieuDe_KhongDau,
       loaitin.Ten as TenLT FROM tin, loaitin
       WHERE tin.idLT = loaitin.idLT AND tin.AnHien=1 AND tin.lang='$lang' 
       ORDER BY SoLanXem DESC LIMIT 0, 6");
      ?>
      @foreach($kq as $row)
      <li class="post-list-small__item">
        <article class="post-list-small__entry clearfix">
          <div class="post-list-small__img-holder">
            <div class="thumb-container thumb-100">
              <a href="<?=URL::to("/tin");?>/{{$row->TieuDe_KhongDau}}">
                <img data-src="{{$row->urlHinh}}" src="img/empty.png" alt="" class="post-list-small__img--rounded lazyload" onerror="this.src='img/defaultimg.jpg'">
              </a>
            </div>
          </div>
          <div class="post-list-small__body">
            <h3 class="post-list-small__entry-title">
              <a href="<?=URL::to("/tin");?>/{{$row->TieuDe_KhongDau}}">{{$row->TieuDe}}></a>
            </h3>
            <ul class="entry__meta">
              <li class="entry__meta-date">
                {{date('d/m/Y',strtotime($row->Ngay))}}
              </li>
            </ul>
          </div>                  
        </article>
      </li>
      @endforeach
    </ul>           
  </aside> <!-- end widget popular posts -->
