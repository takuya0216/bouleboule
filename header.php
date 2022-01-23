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
	  <?php $logo_url = get_the_logo_url('logo_url'); ?>
	  <?php if($logo_url): ?>
	  	<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_the_logo_url(); ?>" alt="<?php bloginfo('name'); ?>" /></a>
	  <?php else: ?>
	    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      <?php endif; ?>
  </figure>
</header>
<?php if(has_nav_menu('primary')): ?>
<div class="hamburger">
  <span></span><span></span><span>MENU</span>
</div>
<nav class="mytheme-nav A1mintyo">
  <?php wp_nav_menu(array(
    'theme_location' => 'primary',
    'menu_class' => 'nav-menu', //ulタグのクラス
    'add_li_class' => 'nav-item', //liタグのクラス
    'container' => false,
  )); ?>
 </nav>
<?php endif; ?>
