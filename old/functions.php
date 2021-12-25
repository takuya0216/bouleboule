<?php
/**
 * titleタグを出力
 */
add_theme_support('title-tag');
/**
 * カスタムメニュー有効
 */
add_theme_support('menus');
/**
*アイキャッチ画像を有効にする
**/
add_theme_support( 'post-thumbnails' );

/**
 * wp_nav_menuのliにclass追加
 */
function add_additional_class_on_li($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes['class'] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

//Custom CSS Widget
add_action('admin_menu', 'custom_css_hooks');
add_action('save_post', 'save_custom_css');
add_action('wp_head','insert_custom_css');
function custom_css_hooks() {
	add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'post', 'normal', 'high');
	add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'page', 'normal', 'high');
}
function custom_css_input() {
	global $post;
	echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
	echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}
function save_custom_css($post_id) {
	if (!wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')) return $post_id;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	$custom_css = $_POST['custom_css'];
	update_post_meta($post_id, '_custom_css', $custom_css);
}
function insert_custom_css() {
	if (is_page() || is_single()) {
		if (have_posts()) : while (have_posts()) : the_post();
			echo '<style type="text/css">'.get_post_meta(get_the_ID(), '_custom_css', true).'</style>';
		endwhile; endif;
		rewind_posts();
	}
}

/**
 * テーマカスタマイザー追加項目
 *
 * 元からあるセクション名：
 * title_tagline - サイトタイトルとキャッチフレーズ
 * colors - 色
 * header_image - ヘッダー画像
 * background_image - 背景画像
 * nav - ナビゲーション（訳注：無いかも？）
 * static_front_page - 固定フロントページ
 *
 * priority：
 * サイト基本情報・・・20
 * 色・・・40
 * ヘッダー画像・・・60
 * 背景画像・・・80
 * メニュー・・・100
 * ウィジェット・・・110
 * ホームページ設定・・・120
 * 追加CSS・・・200
 *
 */

 function theme_customizer_extension($wp_customize) {
  //処理

  //セクション
  $wp_customize->add_section( 'my_catchphrase', array ( //ID
    'title' => 'キャッチフレーズ', //表示名
    'priority' => 100,
  ));

  //セッティング：キャッチフレーズ1行目
	$wp_customize->add_setting(
		'my_cp_options[cp_text_1]', // テーマ設定を識別する「テーマ設定ID」を指定
		array(
			'default'     => 'フルーツの', // デフォルト値を設定
      'type'        => 'option', //option:データベースに保存 デフォルト：theme_mod
      'transport'   => 'refresh', //ライブプレビューON（OFF：postMessage)
		)
	);
  //セッティング：キャッチフレーズ2行目
	$wp_customize->add_setting(
		'my_cp_options[cp_text_2]', // テーマ設定を識別する「テーマ設定ID」を指定
		array(
			'default'     => '美味しいケーキで', // デフォルト値を設定
      'type'        => 'option',
      'transport'   => 'refresh', //ライブプレビューON（OFF：postMessage)
		)
	);
  //セッティング：キャッチフレーズ3行目
	$wp_customize->add_setting(
		'my_cp_options[cp_text_3]', // テーマ設定を識別する「テーマ設定ID」を指定
		array(
			'default'     => 'ちょっぴり贅沢な時間を。', // デフォルト値を設定
      'type'        => 'option',
      'transport'   => 'refresh', //ライブプレビューON（OFF：postMessage)
		)
	);
  // コントロール：キャッチフレーズ1行目
  $wp_customize->add_control( 'cp_text_1_control', array(
    'settings'  => 'my_cp_options[cp_text_1]',
    'label'     => 'キャッチフレーズ1行目',
    'section'   => 'my_catchphrase',
    'type'      => 'text',
  ));
  // コントロール：キャッチフレーズ2行目
  $wp_customize->add_control( 'cp_text_2_control', array(
    'settings'  => 'my_cp_options[cp_text_2]',
    'label'     => 'キャッチフレーズ2行目',
    'section'   => 'my_catchphrase',
    'type'      => 'text',
  ));
  // コントロール：キャッチフレーズ3行目
  $wp_customize->add_control( 'cp_text_3_control', array(
    'settings'  => 'my_cp_options[cp_text_3]',
    'label'     => 'キャッチフレーズ3行目',
    'section'   => 'my_catchphrase',
    'type'      => 'text',
  ));
 }
add_action('customize_register', 'theme_customizer_extension');
 ?>
