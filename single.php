<?php get_header(); ?>
<main class="mytheme-main">
  <?php
    // get reusable gutenberg block
    $reuse_block = get_post( 1128 ); //  123 is ID. reusable block page. ID from the URL.
    $reuse_block_content = apply_filters( 'the_content', $reuse_block->post_content);
    echo $reuse_block_content;
  ?>
  <?php if(have_posts()): while(have_posts()): the_post(); ?>

  <article <?php post_class('mytheme-article'); ?>>
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
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
