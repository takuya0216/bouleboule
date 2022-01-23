<?php $footer_options = get_option('my_footer_options'); //フッター情報カスタマイザ取得 ?>
<footer class="mytheme-footer">
  <div class="footer-inner">
      <div class="footer-text">
        <div class="address">
          <p>ADDRESS</p>
          <p>〒<?php if($footer_options['footer_post']) : echo esc_html($footer_options['footer_post']); ?><p><?php endif; ?>
          <?php if($footer_options['footer_address']) : echo esc_html($footer_options['footer_address']); ?><?php endif; ?> </p>
          <p>OPEN：<?php if($footer_options['footer_open']) : echo esc_html($footer_options['footer_open']); ?><?php endif; ?></p>
          <p>CLOSE：<?php if($footer_options['footer_close']) : echo esc_html($footer_options['footer_close']); ?><?php endif; ?></p>
        </div>
        <div class="contact">
          <p>ケーキのご予約・お問い合わせ<br>お電話のみのご対応にあります</p>
          <?php if($footer_options['footer_tell']) : $tell = esc_html($footer_options['footer_tell']); ?><?php endif; ?>
          <p><a href="tel:<?php echo $tell; ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/tel-icon-pric.svg" alt="TEL"><?php echo $tell; ?></a></p>
        </div>
      </div>
      <div class="calendar">
        <?php echo do_shortcode( '[xo_event_calendar holidays="all,can-not-reserve" previous="12" next="12" months="1"]' ); ?>
      </div>
    </div>
    <p class="copylight">
              © bouleboule All rights reserved.
    </p>
    <a href="#" id="page-top" class="arrow-r-up"></a>
</footer>

<?php wp_footer(); ?>
<?php if( is_front_page()): ?>
<script>
    const theWrapper = document.getElementById('swiperWrapper');
    var swiper = new Swiper('.swiper-container', {
      freeMode: true,
      slidesPerView: 1.2,
      spaceBetween: 0,
      centeredSlides: true,
      loop: true,
      breakpoints: {
        768: {
          slidesPerView: 4.5,
          spaceBetween: 20,
        }
      },
      speed: 6000,
      autoplay: {
        delay: 0,
        disableOnInteraction: false
      },
      on: {
        slideChangeTransitionStart: function(){
        theWrapper.style.transitionTimingFunction = 'linear';
      }
      },
    });
  </script>
<?php endif; ?>
</body>

</html>
