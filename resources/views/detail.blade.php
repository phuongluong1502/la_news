<div class="content-box">           

  <!-- standard post -->
  <article class="entry mb-0">
    
    <div class="single-post__entry-header entry__header">
      <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--green">{{$ctTin->Ten}}</a>
      <h1 class="single-post__entry-title">
        {{$ctTin->TieuDe}}
      </h1>

      <div class="entry__meta-holder">
        <ul class="entry__meta">
          <li class="entry__meta-date">
            {{date('d/m/Y',strtotime($ctTin->Ngay))}}
          </li>
        </ul>

        <ul class="entry__meta">
          <li class="entry__meta-views">
            <i class="ui-eye"></i>
            <span>{{$ctTin->SoLanXem}}</span>
          </li>
          <li class="entry__meta-comments">
            <a href="#">
              <i class="ui-chat-empty"></i>13
            </a>
          </li>
        </ul>
      </div>
    </div> <!-- end entry header -->

    <div class="entry__img-holder">
      <img src="{{$ctTin->urlHinh}}" alt="" class="entry__img" onerror="this.src='img/defaultimg.jpg'">
    </div>

    <div class="entry__article-wrap">

      <!-- Share 
      <div class="entry__share">
        <div class="sticky-col">
          <div class="socials socials--rounded socials--large">
            <a class="social social-facebook" href="#" title="facebook" target="_blank" aria-label="facebook">
              <i class="ui-facebook"></i>
            </a>
            <a class="social social-twitter" href="#" title="twitter" target="_blank" aria-label="twitter">
              <i class="ui-twitter"></i>
            </a>
            <a class="social social-google-plus" href="#" title="google" target="_blank" aria-label="google">
              <i class="ui-google"></i>
            </a>
            <a class="social social-pinterest" href="#" title="pinterest" target="_blank" aria-label="pinterest">
              <i class="ui-pinterest"></i>
            </a>
          </div>
        </div>                  
      </div> -->
      <!-- share -->

      <div class="entry__article">
      <?=$ctTin->Content;?>
        <!-- tags -->
        <div class="entry__tags">
          <i class="ui-tags"></i>
          <span class="entry__tags-label">Tags:</span>
          <a href="#" rel="tag">mobile</a><a href="#" rel="tag">gadgets</a><a href="#" rel="tag">satelite</a>
        </div> <!-- end tags -->

      </div> <!-- end entry article -->
    </div> <!-- end entry article wrap -->
    

    <!-- Newsletter Wide -->
        <!-- Related Posts -->
    <section class="section related-posts mt-40 mb-0">
      <div class="title-wrap title-wrap--line title-wrap--pr">
        <h3 class="section-title">Tin Liên Quan</h3>
      </div>

      <!-- Slider -->
      <div id="owl-posts-3-items" class="owl-carousel owl-theme owl-carousel--arrows-outside">
        <?php 
          $kq = DB::select("SELECT * FROM tin, loaitin WHERE loaitin.idLT in (SELECT idLT FROM tin WHERE idTin = $ctTin->idTin) AND tin.AnHien = 1 AND tin.lang=? ORDER BY rand() DESC LIMIT 0,5",array($lang));
        ?>
        @foreach($kq as $row)
        <article class="entry thumb thumb--size-1">
          <div class="entry__img-holder thumb__img-holder" style="background-image: url('{{$row->urlHinh}}');">
            <div class="bottom-gradient"></div>
            <div class="thumb-text-holder">   
              <h2 class="thumb-entry-title">
                <a href="<?=URL::to("/tin/{$row->TieuDe_KhongDau}"); ?>">{{$row->TieuDe}}</a>
              </h2>
            </div>
            <a href="<?=URL::to("/tin/{$row->TieuDe_KhongDau}"); ?>" class="thumb-url"></a>
          </div>
        </article>
        @endforeach

      </div> <!-- end slider -->

    </section> <!-- end related posts -->            

  </article> <!-- end standard post -->

  <!-- Comments -->
  <div class="entry-comments">
    <div class="title-wrap title-wrap--line">
      <?php 
          $kq = DB::select("SELECT count(*) as SoBinhLuan FROM `ykien` WHERE idTin =$ctTin->idTin");
          $row = $kq[0]->SoBinhLuan
      ?>    
      <h3 class="section-title">{{$row}} Bình Luận</h3>
    </div>
    <ul class="comment-list">
      <!--<li class="comment">  
        <div class="comment-body">
          <div class="comment-avatar">
            <img alt="" src="img/content/single/comment_1.jpg">
          </div>
          <div class="comment-text">
            <h6 class="comment-author">Joeby Ragpa</h6>
            <div class="comment-metadata">
              <a href="#" class="comment-date">July 17, 2017 at 12:48 pm</a>
            </div>                      
            <p>This template is so awesome. I didn’t expect so many features inside. E-commerce pages are very useful, you can launch your online store in few seconds. I will rate 5 stars.</p>
            <a href="#" class="comment-reply">Reply</a>
          </div>
        </div>

        <ul class="children">
          <li class="comment">
            <div class="comment-body">
              <div class="comment-avatar">
                <img alt="" src="img/content/single/comment_2.jpg">
              </div>
              <div class="comment-text">
                <h6 class="comment-author">Alexander Samokhin</h6>
                <div class="comment-metadata">
                  <a href="#" class="comment-date">July 17, 2017 at 12:48 pm</a>  
                </div>                      
                <p>This template is so awesome. I didn’t expect so many features inside. E-commerce pages are very useful, you can launch your online store in few seconds. I will rate 5 stars.</p>
                <a href="#" class="comment-reply">Reply</a>
              </div>
            </div>
          </li>  end reply comment -->
        <!--</ul>

      </li> end 1-2 comment -->
      
      <?php 
          $kq = DB::select("SELECT * FROM `ykien` WHERE idTin =$ctTin->idTin");
      ?>
      @foreach($kq as $row)
      <li>
        <div class="comment-body">
          <div class="comment-avatar">
            <img alt="" src="img/anynomous.jpg" style="height: 50px;">
          </div>
          <div class="comment-text">
            <h6 class="comment-author">{{$row->HoTen}}</h6>
            <div class="comment-metadata">
              <a href="#" class="comment-date">{{date('h:m:s d/m/Y',strtotime($row->Ngay))}}</a>  
            </div>                      
            <p>{{$row->NoiDung}}</p>
            <a href="#" class="comment-reply">Reply</a>
          </div>
        </div>
      </li> <!-- end 3 comment -->
      @endforeach
    </ul>         
  </div> <!-- end comments -->

  <!-- Comment Form -->
  <div id="respond" class="comment-respond">
    <div class="title-wrap">
      <h5 class="comment-respond__title section-title">Để Lại Bình Luận</h5>
    </div>
    <form id="form" class="comment-form" method="post" action='{{route("tin/binhluan")}}' enctype="multipart/form-data">
      {{csrf_field()}}
      <p class="comment-form-comment">
        <label for="comment">Bình Luận</label>
        <textarea id="comment" name="comment" rows="5" required="required"></textarea>
      </p>

      <div class="row row-20">
        <div class="col-lg-6">
          <label for="name">Tên: *</label>
          <input name="name" id="name" type="text">
          <input name="idTin" id="idTin" type="hidden" value="{{$ctTin->idTin}}">
        </div>
        <div class="col-lg-6">
          <label for="comment">Email: *</label>
          <input name="email" id="email" type="email">
        </div>
      </div>

      <p class="comment-form-submit">
        <input type="submit" class="btn btn-lg btn-color btn-button" value="Post Comment">
      </p>
      
    </form>
  </div> <!-- end comment form -->

</div> <!-- end content box -->