<?php

// *********************************
// 「after_setup_theme」でテーマが読み込まれたあとにフック
// （テーマ独自の関数）
// *********************************
function myportfolio_theme_setup() {
  // ------ ページ毎にページタイトルを表示 -------
  add_theme_support('title-tag');

  // ------ アイキャッチ画像パネルの有効化 -------
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');

  // ------ HTML5対応 -------
  add_theme_support('html5', array('search-form'));

  // ------ 画像サイズの指定 -------
  // 画像表示の関数「the_post_thumbnail()」の引数にサイズ名（以下の場合は、page_eyecatch）を渡す
  add_image_size('page_eyecatch', 980, 515, true);
  add_image_size('archive_thumbnail--one-col', 420, 274, true);
  add_image_size('archive_thumbnail--three-cols', 264, 178, true);
  add_image_size('slider_thumbnail', 246, 164, true);

  // ------ カスタムメニューの有効化 -------
  // メニュー1つの場合
  // register_nav_menu('main-menu', 'メインメニュー');
  // メニュー複数の場合
  register_nav_menus(array(
    'main-menu' => 'メインメニュー',
    'footer-menu' => 'フッターメニュー',
  ));
}
add_action('after_setup_theme', 'myportfolio_theme_setup');


// *********************************
// 「wp_enqueue_scripts」でscriptを読み込むタイミングでフック
// テーマ独自のJS・CSSファイルの読み込み
// *********************************
function myportfolio_enqueue_scripts() {

  // ------ テーマ独自のcssファイルの読み込み -------
  if (is_front_page()) {
    wp_enqueue_style(
      'swiper.css',
      'https://unpkg.com/swiper@7/swiper-bundle.min.css',
      array(),
      '1.0.0'
    );
  }

  wp_enqueue_style(
    'style.css',
    get_template_directory_uri() . '/assets/css/style.css',
    array(),
    '1.0.0'
  );


  // ------ テーマ独自のjsファイルの読み込み -------
  // jQueryの読み込み
  // wp_enqueue_script('jquery');

  if (is_front_page()) {
    wp_enqueue_script(
      'swiper.js',
      'https://unpkg.com/swiper@7/swiper-bundle.min.js',
      array(),
      '1.0.0',
      true
    );

    wp_enqueue_script(
      'swiper-setting.js',
      get_template_directory_uri() . '/assets/js/swiper.min.js',
      array(),
      '1.0.0',
      true
    );
  }

  wp_enqueue_script(
    'script.js',
    get_template_directory_uri() . '/assets/js/script.min.js',
    array(),
    '1.0.0',
    true
  );


  // ------ Googleフォントの読み込み -------
  // wp_enqueue_style(
  //   'googlefonts',
  //   'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap',
  //   array(),
  //   '1.0.0'
  // );
}
add_action('wp_enqueue_scripts', 'myportfolio_enqueue_scripts');


// ------ タイトル属性の有効化（メニュー項目のサブタイトル表示） ------
add_filter('walker_nav_menu_start_el', 'description_in_nav_menu', 10, 4);

function description_in_nav_menu( $item_output, $item, $depth, $args ) {
  if ( 'main-menu' === $args->theme_location ) {

    return preg_replace('/(<a.*?>)([^<]*?)</', '$1' . "<span class='global-nav__text--en'>" . '$2' . "</span><span class='global-nav__text--jp'>{$item->attr_title}</span><", $item_output);

  } elseif ( 'footer-menu' === $args->theme_location ) {

    return preg_replace('/(<a.*?>)([^<]*?)</', '$1' . "<span class='pickup-li__text--en'>" . '$2' . "</span><span class='pickup-li__text--jp'>{$item->attr_title}</span><", $item_output);

  }
}


// ------ wp_nav_menuのliにclass追加 ------
function add_additional_class_on_li($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes['class'] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


// ------ wp_nav_menuのaにclass追加 -------
function add_additional_class_on_a($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes['class'] = $args->add_a_class;
  }
  return $classes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);


// ------ 抜粋文の設定 -------
function twpp_change_excerpt_more( $more ) {
  return '...';
}
add_filter( 'excerpt_more', 'twpp_change_excerpt_more' );

function new_excerpt_mblength($length) {
  return 120;
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');


// ------ 検索キーワードをハイライト -------
function wps_highlight_results($text) {
  if (is_search()) {
    $sr = get_query_var('s');
    $keys = explode(" ",$sr);
    $text = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-highlight">'.$sr.'</span>', $text);
  }
  return $text;
}
add_filter('the_title', 'wps_highlight_results');
add_filter('the_excerpt', 'wps_highlight_results');

// ------ the_excerptによる抜粋文を囲む<p>を取り除く -------
remove_filter('the_excerpt', 'wpautop');
