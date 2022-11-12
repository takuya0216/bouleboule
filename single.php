<?php get_header(); ?>
<main class="mytheme-main mytheme-article mytheme-post">
  <?php
    // 再利用ブロックを取得
    $reuse_block = get_post( 1128 ); //投稿ヘッダー
    $reuse_block_content = apply_filters( 'the_content', $reuse_block->post_content);
    echo $reuse_block_content;
  ?>
  <?php if(have_posts()): while(have_posts()): the_post(); ?>

  <article <?php post_class(); ?>>
  <h1 class="mytheme-post-title"><?php the_title(); ?></h1>
  <time class="mytheme-time" datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>">
  <i class="far fa-clock"></i>
  <?php echo esc_html(get_the_date()); ?>
  </time>
  <?php the_content(); ?>
  <?php the_category(); ?>
  </article>
  <?php endwhile; endif; ?>
  <?php the_post_navigation(array(
    'prev_text' => '<i class="fas fa-lg fa-angle-double-left"></i><span class="my-prev-next my-pagi-prev">PREVIOUS</span>',
    'next_text' => '<span class="my-prev-next my-pagi-next">NEXT</span><i class="fas fa-lg fa-angle-double-right"></i>',)); ?>

  <!-- ウィジェットエリア（シングルページ最下部） -->
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('シングルページ最下部') ) : ?>
  <?php endif; ?>
  <!-- / ウィジェットエリア（シングルページ最下部） -->

  <!-- コメントエリア -->
  <?php /*comments_template(); */?>
  <!-- / コメントエリア -->
</main>

<?php get_footer(); ?>
