<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="mytheme-header">
  <figure class="header-logo">
  <a href="<?php
  echo esc_url(home_url('/')); ?> ">
  <img src="http://dev.takuyaishida.net/wp-content/uploads/2021/11/logo.png" alt="BouleBoule">
  </a>
  </figure>
</header>
<?php if(has_nav_menu('primary')): ?>
<div class="hamburger">
  <span></span><span></span>
</div>
<nav class="mytheme-nav">
  <?php wp_nav_menu(array(
    'theme_location' => 'primary',
    'menu_class' => 'nav-menu', //ulタグのクラス
    'add_li_class' => 'nav-item', //liタグのクラス
    'container' => false,
  )); ?>
 </nav>
<?php endif; ?>
