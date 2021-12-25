<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="BouleBoule">
  <?php
  /*swiper先じゃないと崩れる*/
    if( is_home() ){
      wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper.min.css');
      wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper.min.js');
    }
    wp_enqueue_style('destyle', get_template_directory_uri() . '/assets/css/destyle.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css');
    wp_head();
  ?>
   <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <?php
    if( is_home() ){
      echo
      '<style>
        .top-container {
          height:auto;
        }
      </style>';
    }
  ?>
</head>
<body <?php body_class(); ?>>
 <?php wp_body_open(); ?>
  <div class="top-container wp-all">
    <header>
      <nav class="navbar wp-inner">
        <a class="nav-brand hidden-sp" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="ロゴ"></a>
        <a class="nav-brand nav-brand-sp-hidden hidden-pc" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_white.svg" alt="ロゴ"></a>
        <div class="navToggle">
          <span></span><span></span><span><img class="hidden-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/menu-icon.svg" width="39.3px" height="23.3px" alt="menu"><img class="hidden-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/menu-icon-sp.svg" width="39.3px" height="23.3px" alt="menu"></span>
        </div>
      </nav>
    </header>
    <div class="hamburger-content">
      <a class="nav-brand" href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_white.svg" alt="ロゴ"></a>
      <?php
        $args = array(
          'menu' => 'global-navigation', //グローバルメニュー名
          'menu_class' => 'nav-menu', //ulタグのクラス
          'add_li_class' => 'nav-item', //liタグのクラス
          'container' => false,
        );
        wp_nav_menu($args);
      ?>
      <ul class="sns-nav-menu">
        <li class="sns-nav-item"><a href="https://twitter.com/" target="_blank">Twitter</a></li>
        <li class="sns-nav-item"><a href="https://www.facebook.com" target="_blank">facebook</a></li>
        <li class="sns-nav-item"><a href="https://www.instagram.com/" target="_blank">instagram</a></li>
      </ul>
    </div>
    <div class="main-view">
      <?php if( is_home() ) : ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/title-top.png" width=295px height=422px alt="トップ画像">
      <?php else : ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/title-newsblog.png" width=728px height=399px alt="トップ画像">
      <?endif?>
      <div class="main-view-follow">
        <p class="hidden-sp">FOLLOW US</p>
        <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram_logo.svg" alt="インスタグラムロゴ"></a>
      </div>
        <?php if( is_home() ) : ?>
          <div class="main-view-text-home a1min">
          <?php $cp_options = get_option('my_cp_options'); //キャッチフレーズカスタマイザ取得 ?>
          <? foreach ($cp_options as $cp) : ?>
            <? if($cp) : ?>
             <p><?php echo esc_html($cp); ?></p><br>
            <?endif?>
          <?endforeach?>
        <?php else : ?>
          <div class="main-view-text a1min">
          <p><?php the_title(); ?></p>
        <?endif?>
      </div>
    </div>
  </div>
