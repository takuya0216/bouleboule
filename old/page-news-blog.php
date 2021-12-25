<?php get_header(); ?>
<main>
    <nav id="category-nav">
      <div class="category-nav-inner wp-inner">
        <h2>CATEGORY</h2>
        <ul class="category-nav-menu">
          <li class="category-nav-item"><a href="#">生菓子</a></li>
          <li class="category-nav-item"><a href="#">焼き菓子</a></li>
          <li class="category-nav-item"><a href="#">バースデーケーキ</a></li>
          <li class="category-nav-item"><a href="#">イベント</a></li>
          <li class="category-nav-item"><a href="#">お知らせ</a></li>
          <li class="category-nav-item"><a href="#">その他</a></li>
        </ul>
      </div>
    </nav>

    <article class="wp-inner">
      <div class="news-container">
        <?php
          global $post;
          $args = array( 'posts_per_page' => 9 );
          $myposts = get_posts( $args );
          foreach( $myposts as $post ) {
            setup_postdata($post);
        ?>
        <div id="post-<?php the_ID(); ?>" class="news-item">
          <div class="news-img "><a href="<?php the_permalink(); ?>">
            <?php if( has_post_thumbnail() ): ?>
              <?php the_post_thumbnail(array( 323, 323 )); ?>
            <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dummy.png" alt=""></a>
            <? endif; ?>
          </div>
          <h2 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="news-meta">
            <time class="news-time" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
            <?php the_category(); ?>
          </div>
          <div class="news-desc">
            <?php the_excerpt(); ?>
          </div>
          <p class="news-read"><a href="<?php the_permalink(); ?>">READ MORE</a></p>
        </div>
        <?php
        }
        wp_reset_postdata();
        ?>
      </div>
    </article>

    <div class="pager">
      <div class="pager-link pager-prev"><a href="#"><i class="fas fa-angle-double-left fa-lg"></i><span>PREVIOUS</span></a></div>
      <div class="pager-link pager-next"><a href="#"><span>NEXT</span><i class="fas fa-angle-double-right fa-lg"></i></a></div>
    </div>
  </main>
<?php get_footer(); ?>
