<?php get_header(); ?>
<main class="mytheme-main mytheme-article">
  <?php
    // get reusable gutenberg block
    $reuse_block = get_post( 699 ); //  123 is ID. reusable block page. ID from the URL.
    $reuse_block_content = apply_filters( 'the_content', $reuse_block->post_content);
    echo $reuse_block_content;
  ?>
  <nav id="category-nav">
      <div class="category-nav-inner wp-inner">
        <h2>CATEGORY</h2>
        <ul class="category-nav-menu">
          <?php
          //ID順にカテゴリナビを作成。未分類は含まない。現在のページのカテゴリをアクティブ。
          $args = array('orderby' => 'id'); ?>
          <?php
            global $wp_query;
            $post_obj = $wp_query->get_queried_object();
            $cat_id = $post_obj->term_id;  //カテゴリーアーカイブページのID
          ?>
          <?php $categories = get_categories($args); ?>
              <?php foreach( $categories as $category ): ?>
              <?php if($category->term_id != 1): ?>
              <?php if($category->term_id == $cat_id): echo '<li class="category-nav-item active"><a href="'.get_category_link($category->term_id).'">'.$category->name.'</a></li>';
              ?>
              <?php else: echo '<li class="category-nav-item"><a href="'.get_category_link($category->term_id).'">'.$category->name.'</a></li>';
              ?>
              <?php endif; endif; endforeach; ?>
        </ul>
      </div>
    </nav>
 <div class="postlist">
  <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article <?php post_class(); ?>>
    <a href="<?php the_permalink(); ?>">
    <?php if(has_post_thumbnail()): ?>
      <figure>
      <?php the_post_thumbnail(); ?>
      </figure>
    <?php else: ?>
      <figure>
        <img src="<?php echo get_template_directory_uri(); ?>/img/dumy.png" alt="" width="323" height="323">
      </figure>
    <?php endif; ?>
    <div class="postlist-textview">
      <h2><?php the_title(); ?></h2>
      <time class="mytheme-time" datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>">
      <?php echo esc_html(get_the_date()); ?>
      </time>
    </div>
    </a>
    <div class="postlist-excerpt">
      <p><?php echo get_the_excerpt(); ?></p>
    </div>
    <div class="postlist-readmore genkakugo">
      <a href="<?php the_permalink(); ?>"><p>READ MORE</p></a>
    </div>
    </article>
  <?php endwhile; endif; ?>
  </div>
  <?php the_posts_pagination(array(
    'mid_size' => '3',
    'prev_next' => true,
    'prev_text' => '<i class="fas fa-lg fa-angle-double-left"></i><span class="my-prev-next my-pagi-prev">PREVIOUS</span>',
    'next_text' => '<span class="my-prev-next my-pagi-next">NEXT</span><i class="fas fa-lg fa-angle-double-right"></i>',)); ?>
</main>

<?php get_footer(); ?>
