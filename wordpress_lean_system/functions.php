<?php

add_theme_support('post-thumbnails');

// add_image_size('post-thumbnails',400,200,true);


function titles()
{
$title = wp_title('|',true,'right');
if(is_home()){
//トップページ
echo 'Wordpress化手順|HTMLからWordpressにする手順';
}else{
    //トップページ以外
    echo $title.'サイト名';
}

}

// index.phpの画像リンクの並び順を反対にする
function reverse_image_link_order($query) {
    // 管理画面やメインクエリ以外は対象外
    if (is_admin() || !$query->is_main_query()) {
      return;
    }
    // index.phpの場合
    if ($query->is_home()) {
      // orderで昇順か降順かを指定する
      $query->set('order', 'DESC');
      // orderbyで何で並べ替えるかを指定する
      $query->set('orderby', 'date');
    }
  }
  add_action('pre_get_posts', 'reverse_image_link_order');

  // カスタムメニューを追加
function add_custom_menu () {
  register_nav_menus (array(
    'header-navi' => 'ヘッダーナビ',
    'footer-navi' => 'フッターナビ',
  ));
}
add_action ('after_setup_theme','add_custom_menu');