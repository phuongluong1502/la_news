<?php 
  $kq = DB::select("SELECT idLT, Ten, Ten_KhongDau FROM loaitin WHERE lang=? ORDER BY rand() DESC LIMIT 0, 6",array($lang));
?>

<footer class="footer footer--dark">
  <div class="container">
    <div class="footer__widgets">
      <div class="row">

        <div class="col-lg-3 col-md-6">
          <aside class="widget widget-logo">
            <a href="#" style="font-size: 25px;">
              Web Tin Tức: La News
            </a>
            <p class="copyright">
              © 2019 Tin Tức Made by <a href="#">Phương Lương</a>
            </p>
          </aside>
        </div>

        <div class="col-lg-4 col-md-6">
          <aside class="widget widget_nav_menu">
            <h4 class="widget-title">Các Loại Tin</h4>
            <ul>
              @foreach($kq as $ltfooter)
              <li><a href="<?=URL::to('/loai');?>/{{$ltfooter->Ten_KhongDau}}"/>{{$ltfooter->Ten}}</a></li>
              @endforeach
            </ul>
          </aside>
        </div>  

        <div class="col-lg-5 col-md-6">
          <aside class="widget widget-popular-posts">
            <h4 class="widget-title">Tin Hot Nhất</h4>
            <ul class="post-list-small">
              <?php 
                $kq = DB::select("SELECT idTin, TieuDe, TieuDe_KhongDau, urlHinh, Ngay, SoLanXem FROM `tin` WHERE lang=? ORDER BY SoLanXem DESC LIMIT 0, 2",array($lang));
              ?>
              @foreach($kq as $tinhot)
              <li class="post-list-small__item">
                <article class="post-list-small__entry clearfix">
                  <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-100">
                      <a href="<?=URL::to("/tin");?>/{{$tinhot->TieuDe_KhongDau}}">
                        <img data-src="{{$tinhot->urlHinh}}" src="{{$tinhot->urlHinh}}" alt="" class="post-list-small__img--rounded lazyload" onerror="this.src='img/defaultimg.jpg'" >
                      </a>
                    </div>
                  </div>
                  <div class="post-list-small__body">
                    <h3 class="post-list-small__entry-title">
                      <a href="<?=URL::to("/tin");?>/{{$tinhot->TieuDe_KhongDau}}">{{$tinhot->TieuDe}}</a>
                    </h3>
                    <ul class="entry__meta">
                      <li class="entry__meta-date">
                        {{date('d/m/Y',strtotime($tinhot->Ngay))}}
                      </li>
                    </ul>
                  </div>                  
                </article>
              </li>
              @endforeach
            </ul>
          </aside>              
        </div>
      </div>
    </div>    
  </div> <!-- end container -->
</footer> 