<footer class="footer">
    <div class="footer-inner wp-inner">
      <div class="footer-text">
        <div class="address">
          <p>ADDRESS</p>
          <p>〒471-0814 愛知県豊田市五ヶ丘3-14-5(駐車場4台)</p>
          <p>OPEN：10:00-19:00</p>
          <p>CLOSE：月曜日、火曜日</p>
        </div>
        <div class="contact">
          <p>ケーキのご予約・お問い合わせ<br>お電話のみのご対応にあります</p>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/yajirusi.svg" alt="">
          <p>0565-42-5900</p>
        </div>
      </div>
      <div class="calendar">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/calendar.png" alt="">
      </div>
    </div>
    <p class="copylight">
              © bouleboule All rights reserved.
    </p>
  </footer>
  <div id="overlay"></div>
  <?php
    wp_enqueue_script('jquery');
    wp_enqueue_script('myscript', get_template_directory_uri() . '/assets/js/myscript.js');
  ?>
  <?php if( is_home() ) : ?>
  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1.5,
      spaceBetween: 10,
      centeredSlides: true,
      loop: true,
      breakpoints: {
        1100:{
          slidesPerView: 4,
          spaceBetween: 20
        },
        768: {
          slidesPerView: 2.5,
          spaceBetween: 20
        }
      }

    });
    swiper.slideTo(4);
  </script>
  <?endif?>
  <? wp_footer(); ?>
</body>
</html>
