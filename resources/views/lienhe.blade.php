<style>
  .contact-name, .contact-email, .contact-subject {max-width:100%;  }
</style>
<h3><?= $thongbao ?></h3>
<h1 class="page-title"><?=$tieptuc ?> Liên Hệ</h1>
<div class="row justify-content-center">
  <div class="col-lg-12">
    <h4>Chúng tôi sẵn sàng phục vụ bạn</h4>
    <p>Đừng chần chừ khi cần liên hệ với chúng tôi. Hãy gửi thông tin và chúng tôi sẽ trả lời bạn sớm nhất có thể.</p>
    <ul class="contact-items">
      <li class="contact-item"><address>123 , cung Vàng, điện Ngọc, thành phố Trăng Vàng</address></li> 
      <li class="contact-item"><a href="tel:+1-800-1554-456-123">Điện thoại: 123456789</a></li>
      <li class="contact-item"><a href="mailto:themesupport@gmail.com">meomeo@gmail.com</a></li>
    </ul>            

    <!-- Contact Form -->
    @if(!session('thongbao'))
    <form id="contact-form" class="contact-form mt-30 mb-30" method="post" action="lienhe">
      {{ csrf_field()}}
      <div class="contact-name">
        <label for="name">Họ Tên <abbr title="required" class="required">*</abbr></label>
        <input name="name" id="name" type="text">
      </div>
      <div class="contact-email">
        <label for="email">Email <abbr title="required" class="required">*</abbr></label>
        <input name="email" id="email" type="email">
      </div>
      <div class="contact-message">
        <label for="message">Nội Dung <abbr title="required" class="required">*</abbr></label>
        <textarea id="message" name="message" rows="7" required="required"></textarea>
      </div>

      <input type="submit" class="btn btn-lg btn-color btn-button" value="Gửi Liên Hệ" id="submit-message1">
      <div id="msg" class="message"></div>
    </form>
    @else
    <h2> Gửi Liên Hệ Thành Công </h2>
    @endif
    
    


  </div>
</div>
