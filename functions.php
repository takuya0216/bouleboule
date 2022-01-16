<?php

/**
 * 基本設定：どんなテーマでも使う設定
 */
function mytheme_setup(){

  //ページタイトルを出力
  add_theme_support('title-tag');

  //HTML5対応
  add_theme_support('html5', array('style', 'script'));

  // ブロックベースのウィジェットエディタを無効化
  remove_theme_support( 'widgets-block-editor' );

  //アイキャッチ画像
  add_theme_support('post-thumbnails');

  //ナビゲーションメニュー
  register_nav_menus(array(
    'primary' => 'メイン',
  ));

  //編集画面用CSS設定（editor-style.cssを作成）
  add_theme_support('editor-styles');
  add_editor_style('editor-style.css');
  //グーテンベルク由来のcss設定(theme.css)
  add_theme_support('wp-block-styles');

  //埋め込みコンテンツのレスポンシブ化
  add_theme_support('responsive-embeds');

  //幅広・全幅設定
  add_theme_support('align-wide');

  //カスタム単位
  add_theme_support('custom-units');

  //カラーパレット設定
  // デフォルトカラーパレット取得（子テーマの場合）親テーマの場合はfalse
  $oldColorPalette = current( (array) get_theme_support( 'editor-color-palette' ) );
  // Wordpressのデフォルトカラーパレット取得 wp-includes/theme.json
  if (false === $oldColorPalette && class_exists('WP_Theme_JSON_Resolver')) {
      $settings = WP_Theme_JSON_Resolver::get_core_data()->get_settings();
      if (isset($settings['color']['palette']['core'])) {
          $oldColorPalette = $settings['color']['palette']['core']; // WPの言語設定で翻訳された名前が入る。
      }
  }
  // カラー追加
  $newColorPalette = [
      [
          'name' => esc_attr__('グリーン（メイン）', 'myThemeLangDomain'),
          'slug' => 'primary',
          'color' => '#315933',
      ],
      [
          'name' => esc_attr__('グリーン（サブ）', 'myThemeLangDomain'),
          'slug' => 'secondary',
          'color' => '#275931',
      ],
      [
          'name' => esc_attr__('グレー（背景）', 'myThemeLangDomain'),
          'slug' => 'tertiary',
          'color' => '#e0e1e1',
      ],
      [
          'name' => esc_attr__('黄色（アクセント）', 'myThemeLangDomain'),
          'slug' => 'accent',
          'color' => '#f6e17a',
      ],
  ];
  // カラーパレット配列作成
  if (!empty($oldColorPalette)) {
      $newColorPalette = array_merge($oldColorPalette, $newColorPalette);
  }
  // カラーパレット設定適用
  add_theme_support( 'editor-color-palette', $newColorPalette);

  /*エディタに色設定任意設定。(使用色を限定したい時に使う。基本は使わない)
   .has-slug-background-color=背景色
   .has-slug-color=文字色
   をcssで指定する必要あり。*/
  /*add_theme_support('editor-color-palette', array(
  array(
    'name' => '青色',
    'slug' => 'blue',
    'color' => '#1b5e92',
  ),
  array(
    'name' => '黄色',
    'slug' => 'yellow',
    'color' => '#f1f40e',
  ),
));*/

/*エディタに文字サイズ任意設定。(文字サイズを限定したい時に使う。基本は使わない)
   .has-slug-font-size
   をcssで指定する必要あり。*/
  /*add_theme_support('editor-font-sizes', array(
  array(
    'name' => '小',
    'size' => '12.8',
    'slug' => 'small',
  ),
  array(
    'name' => '標準',
    'size' => '16',
    'slug' => 'normal',
  ),
  array(
    'name' => '大',
    'size' => '20',
    'slug' => 'large',
  ),
));*/

//カスタムカラーをオフ
//add_theme_support('disable-custom-colors');
//カスタムサイズをオフ
//add_theme_support('disable-custom-font-sizes');

}
add_action('after_setup_theme', 'mytheme_setup');

//ウィジェット
function mytheme_widgets(){
  register_sidebar(array(
    'id' => 'sidebar-1',
    'name' => '投稿一覧ページ最下部',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>'
  ));
  register_sidebar(array(
    'id' => 'sidebar-2',
    'name' => 'シングルページ最下部',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>'
  ));
}
add_action('widgets_init', 'mytheme_widgets');

//CSSとJS
function mytheme_enqueue(){

  //Font Awesome
  wp_enqueue_style('mytheme-fontawesome', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css', array(), null);
  //Google Fonts
  wp_enqueue_style('mytheme-googlefonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600;700&family=Shippori+Mincho:wght@400;500;600;700&family=Roboto+Condensed:wght@300;400&family=Roboto:wght@300;400;700&display=swap', array(), null);

  //テーマのCSS
  //ファイル名に更新時刻を入れる（キャッシュ対策）
  wp_enqueue_style('mytheme-style', get_stylesheet_uri(),array(),
  filemtime(get_template_directory() . '/style.css'));

  //JS
  //jQuery読み込み
  wp_enqueue_script('jquery');
  wp_enqueue_script('myjs',get_template_directory_uri() . '/myscript.js',
  array(),
  filemtime(get_template_directory() . '/myscript.js'));
  wp_enqueue_script('swiperjs',get_template_directory_uri() . '/swiper.min.js',
  array(),
  filemtime(get_template_directory() . '/swiper.min.js'));
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue');

function mytheme_both(){

  //フロントとエディタの両方に適応するCSS
  wp_enqueue_style('mytheme-style-both', get_template_directory_uri() . '/style-both.css',array(),
  filemtime(get_template_directory() . '/style-both.css'));
  //AdobeFonts

}
add_action('enqueue_block_assets', 'mytheme_both');

//テーマ用JS
function myjs_enqueue(){

  //ブロックスタイルJS
  wp_enqueue_script('myjs-style',get_template_directory_uri() . '/mystyle.js',
  array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
  filemtime(get_template_directory() . '/mystyle.js'));
}
add_action('enqueue_block_editor_assets', 'myjs_enqueue');

//LP従来版 フロント用css
function lp_custom(){
  if(is_page('ランディングページ：従来のスタイル')){
    wp_enqueue_style('lp-custom-style', get_template_directory_uri() . '/lp-custom/lp-custom.css',array(),
    filemtime(get_template_directory() . '/lp-custom/lp-custom.css'));
  }
}
add_action('wp_enqueue_scripts', 'lp_custom');

//LPグーテンベルク版 フロント用css
function lp_guten_front(){
  if(is_page('TOPページ')){
    wp_enqueue_style('lp-guten-front-style', get_template_directory_uri() . '/lp-guten/lp-guten-front.css',array(),
    filemtime(get_template_directory() . '/lp-guten/lp-guten-front.css'));
  }
}
add_action('wp_enqueue_scripts', 'lp_guten_front');

//LPグーテンベルク版 フロント・エディタ用css
function lp_guten_both(){

  global $post;
  if($post->post_title == 'TOPページ'){
    wp_enqueue_style(
      'lp-guten-both-style',
      get_template_directory_uri() . '/lp-guten/lp-guten-both.css',array(),
      filemtime(get_template_directory() . '/lp-guten/lp-guten-both.css')
    );
  }
}
add_action('enqueue_block_assets', 'lp_guten_both');

//LPグーテンベルク版エディタ設定
function lp_guten_editor(){
  //プロックスタイルJS
  global $post;
  if($post->post_title == 'TOPページ'){
    wp_enqueue_script('lp-guten-js',
    get_template_directory_uri() . '/lp-guten/lp-guten.js',
    array(),
    filemtime(get_template_directory() . '/lp-guten/lp-guten.js')
    );
  }
  //Google Fonts
  wp_enqueue_style('mytheme-googlefonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600;700&family=Shippori+Mincho:wght@400;500;600;700&family=Roboto+Condensed:wght@300;400&family=Roboto:wght@300;400;700&display=swap', array(), null);
}
add_action('enqueue_block_editor_assets', 'lp_guten_editor');

//Font Awesomeの属性
function mytheme_sri($html, $handle){
  if($handle === 'mytheme-fontawesome'){
    return str_replace('/>','integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"' . '/>',$html
  );
  }
  return $html;
}
add_filter('style_loader_tag', 'mytheme_sri', 10, 2);

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
/**
 * 抜粋の文字数変更,WP Multibyte Patch必須
 */
function twpp_change_excerpt_length( $length ) {
  return 80;
}
add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );

/**
 * 以下は、カスタマイズ要件に応じて設定
 * */

//グーテンベルクのcssの読み込み削除
/*function remove_css(){
  //style.min.cssを削除
  wp_dequeue_style('wp-block-library');
  //theme.min.cssを削除
  wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'remove_css');
*/

//グーテンベルクのCSSをエディタとフロント両方から削除
/*function remove_both_css(){
  //style.min.cssを削除
  wp_deregister_style('wp-block-library');
  wp_register_style('wp-block-library', '');
  //theme.min.cssを削除
  wp_deregister_style('wp-block-library-theme');
  wp_register_style('wp-block-library-theme', '');
}
add_action('enqueue_block_assets', 'remove_both_css');
*/

//使用可能なブロックを限定：指定した物のみ使用可能
/*function mytheme_block(){
  return array(
    'core/paragraph', //段落
    'core/image', //画像
    'core/embed' //埋め込み
  );
}
add_filter('allowed_block_types_all', 'mytheme_block');
*/

//ページの種類によって使用可能なブロックを限定
/*function mytheme_block($allowed_block_types, $post){

  //投稿
  if($post->post_type === 'post'){
    return array(
      'core/paragraph', //段落
      'core/image', //画像
    );
  }

  //固定ページ
  if($post->post_type === 'page'){
    return array(
      'core/paragraph', //段落
    );
  }

  //上記以外
  return $allowed_block_types;
}
add_filter('allowed_block_types', 'mytheme_block', 10, 2);
*/

//ブロックテンプレート（投稿や固定ページの新規作成時のデフォルト構成）
function mytheme_block_temp(){

  //投稿
  $obj = get_post_type_object('post');
  //$obj->template_lock = 'all'; //テンプレ変更のロック
  $obj->template = array(
    array(
      'core/paragraph',
      array(
        'placeholder' => 'ここに記事を入力',
      )
    ),
    array(
      'core/image'
    ),
  );
}
add_action('init', 'mytheme_block_temp');

/*管理画面にメニューを追加する*/
function add_custom_menu(){
    add_menu_page( '再利用ブロックの管理', '再利用ブロックの管理',
    'manage_options', 'edit.php?post_type=wp_block', '', 'dashicons-admin-post', 21 );
}
add_action( 'admin_menu', 'add_custom_menu' );

// アイキャッチデフォルト設定
add_action( 'save_post', 'save_default_thumbnail' );
function save_default_thumbnail( $post_id ) {
  $post_thumbnail = get_post_meta( $post_id, $key = '_thumbnail_id', $single = true );
  if ( !wp_is_post_revision( $post_id ) ) {
    if ( empty( $post_thumbnail ) ) {
      update_post_meta( $post_id, $meta_key = '_thumbnail_id', $meta_value = '753' );
    }
  }
}

/* テーマカスタマイザー
---------------------------------------------------------- */
add_action( 'customize_register', 'theme_customize' );

function theme_customize($wp_customize){

	//ロゴ画像
	$wp_customize->add_section( 'logo_section', array(
		'title' => 'ロゴ画像', //セクションのタイトル
		'priority' => 59, //セクションの位置
		'description' => 'ロゴ画像を使用する場合はアップロードしてください。画像を使用しない場合はタイトルがテキストで表示されます。', //セクションの説明
	));

		$wp_customize->add_setting( 'logo_url' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_url', array(
			'label' => 'ロゴ画像',//セッティングのタイトル
			'section' => 'logo_section', //セクションID
			'settings' => 'logo_url', //セッティングID
			'description' => 'ロゴ画像を設定してください。<br>推奨サイズ：472x178px', //セッティングの説明
		)));
	//フッター設定
  $wp_customize->add_section( 'my_footer_info', array ( //ID
    'title' => 'フッター情報設定', //表示名
    'priority' => 100,
  ));

  //郵便番号
	$wp_customize->add_setting(
		'my_footer_options[footer_post]', // テーマ設定を識別する「テーマ設定ID」を指定
		array(
			'default'     => '471-0814', // デフォルト値を設定
      'type'        => 'option', //option:データベースに保存 デフォルト：theme_mod
      'transport'   => 'refresh', //ライブプレビューON（OFF：postMessage)
		)
	);
  //住所
	$wp_customize->add_setting(
		'my_footer_options[footer_address]', // テーマ設定を識別する「テーマ設定ID」を指定
		array(
			'default'     => '愛知県豊田市五ヶ丘3-14-5(駐車場4台)', // デフォルト値を設定
      'type'        => 'option',
      'transport'   => 'refresh', //ライブプレビューON（OFF：postMessage)
		)
	);
  //営業時間
	$wp_customize->add_setting(
		'my_footer_options[footer_open]', // テーマ設定を識別する「テーマ設定ID」を指定
		array(
			'default'     => '10:00-19:00', // デフォルト値を設定
      'type'        => 'option',
      'transport'   => 'refresh', //ライブプレビューON（OFF：postMessage)
		)
	);
  //定休日
	$wp_customize->add_setting(
		'my_footer_options[footer_close]', // テーマ設定を識別する「テーマ設定ID」を指定
		array(
			'default'     => '月曜日、火曜日', // デフォルト値を設定
      'type'        => 'option',
      'transport'   => 'refresh', //ライブプレビューON（OFF：postMessage)
		)
	);
  //電話番号
	$wp_customize->add_setting(
		'my_footer_options[footer_tell]', // テーマ設定を識別する「テーマ設定ID」を指定
		array(
			'default'     => '0565-42-5900', // デフォルト値を設定
      'type'        => 'option',
      'transport'   => 'refresh', //ライブプレビューON（OFF：postMessage)
		)
	);
  // コントロール：郵便番号
  $wp_customize->add_control( 'footer_post_control', array(
    'settings'  => 'my_footer_options[footer_post]',
    'label'     => '郵便番号',
    'section'   => 'my_footer_info',
    'type'      => 'text',
  ));
  // コントロール：住所
  $wp_customize->add_control( 'footer_address_control', array(
    'settings'  => 'my_footer_options[footer_address]',
    'label'     => '住所',
    'section'   => 'my_footer_info',
    'type'      => 'text',
  ));
  // コントロール：営業時間
  $wp_customize->add_control( 'footer_open_control', array(
    'settings'  => 'my_footer_options[footer_open]',
    'label'     => '営業時間',
    'section'   => 'my_footer_info',
    'type'      => 'text',
  ));
  // コントロール：定休日
  $wp_customize->add_control( 'footer_close_control', array(
    'settings'  => 'my_footer_options[footer_close]',
    'label'     => '定休日',
    'section'   => 'my_footer_info',
    'type'      => 'text',
  ));
  // コントロール：電話番号
  $wp_customize->add_control( 'footer_tell_control', array(
    'settings'  => 'my_footer_options[footer_tell]',
    'label'     => '電話番号',
    'section'   => 'my_footer_info',
    'type'      => 'text',
  ));
}

/* テーマカスタマイザーで設定された画像のURLを取得
---------------------------------------------------------- */
//ロゴ画像
function get_the_logo_url(){
	return esc_url( get_theme_mod( 'logo_url' ) );
}
//ロゴ画像
function get_the_footer_logo_url(){
	return esc_url( get_theme_mod( 'footer_logo_url' ) );
}
