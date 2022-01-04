<footer class="mytheme-footer">
  <div class="footer-inner">
      <div class="footer-text">
        <div class="address">
          <p>ADDRESS</p>
          <p>〒471-0814 愛知県豊田市五ヶ丘3-14-5(駐車場4台)</p>
          <p>OPEN：10:00-19:00</p>
          <p>CLOSE：月曜日、火曜日</p>
        </div>
        <div class="contact">
          <p>ケーキのご予約・お問い合わせ<br>お電話のみのご対応にあります</p>
          <img src="<?php echo get_template_directory_uri(); ?>/img/footer-arrow.svg" alt="▶">
          <p>0565-42-5900</p>
        </div>
      </div>
      <div class="calendar">
        <img src="<?php echo get_template_directory_uri(); ?>/img/calendar.png" alt="">
      </div>
    </div>
    <p class="copylight">
              © bouleboule All rights reserved.
    </p>
</footer>

<?php wp_footer(); ?>
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
</body>

</html>
