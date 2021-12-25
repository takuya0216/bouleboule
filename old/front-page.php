<?php get_header(); ?>
  <main>
    <section id="news-blog">
      <div class="news-blog-inner wp-inner">
        <h2 class="section-header">NEWS<br>BLOG</h2>
        <div class="news-blog-posts">
          <?php if( have_posts() ): ?>
            <?php while( have_posts() ) : the_post(); ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class('news-blog-post'); ?>>
            <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y/m/d'); ?></time>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          </div>
          <?php endwhile; ?>
        <?php endif; ?>
        </div>
        <div class="news-blog-more">
          <a href="https://bouleboule.takuyaishida.net/news-blog/"><p>MORE</p></a>
        </div>
      </div>
    </section>
    <section id="about">
      <div class="about-inner wp-inner">
        <div class="about-text">
          <div class="about-text-inner">
            <h3 class="fade-in-up">BOULE BOULEのケーキは</h3>
            <p class="fade-in-up">BOUL BOULでは、フルーツにこだわり Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores fugit iure nisi animi recusandae consectetur, ipsum corporis saepe officiis, voluptatibus totam eius dolorum officia ad debitis laboriosam accusamus, porro veniam! Lorem ipsum dolor sit amet consectetur </p>
            <div class="about-f-img fade-in-up">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about_text_img.png" alt="フルーツ">
            </div>
          </div>
          <div class="about-img fade-in-up">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about_img.png" alt="About画像">
          </div>
        </div>
      </div>
    </section>
    <section id="birthday">
      <div class="birthday-inner wp-inner">
        <h2 class="section-header a1min fade-in-up">BIRTHDAY</h2>
        <div class="birthday-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/birthday.png" alt="birthday">
        </div>
        <div class="birthday-text fade-in-up">
          <p>プールプールでは季節に合わせた4種類のバースデイケーキをご用意しています。 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum voluptatum, in numquam rem </p>
          <div class="view-all">
            <a href=""><p>一覧へ <img src="<?php echo get_template_directory_uri(); ?>/assets/img/yajirusi.svg" alt="→"></p></a>
          </div>
        </div>
      </div>
    </section>
    <section id="lineup">
      <div class="lineup-inner wp-inner">
        <h2 class="section-header a1min fade-in-up">LINEUP</h2>
        <div class="lineup-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/lineup.png" alt="lineup">
        </div>
        <div class="lineup-text fade-in-up">
          <p>プールプールでは季節に合わせた4種類のバースデイケーキをご用意しています。 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum voluptatum, in numquam rem </p>
          <div class="view-all">
            <a href=""><p>一覧へ <img src="<?php echo get_template_directory_uri(); ?>/assets/img/yajirusi.svg" alt="→"></p></a>
          </div>
        </div>
      </div>
    </section>
    <section id="gallery">
      <h2 class="section-header a1min fade-in-up">GALLERY</h2>
      <div class="swiper-container fade-in-up">
        <div class="swiper-wrapper">
          <div class="swiper-slide"><img class="slide-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/cake1.png" alt=""></div>
          <div class="swiper-slide"><img class="slide-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/room.png" alt=""></div>
          <div class="swiper-slide"><img class="slide-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/cake2.png" alt=""></div>
          <div class="swiper-slide"><img class="slide-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/cake3.png" alt=""></div>
        </div>
      </div>
    </section>
  </main>
<?php get_footer(); ?>
