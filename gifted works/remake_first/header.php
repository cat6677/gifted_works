<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title><?php titles(); ?></title>
    <meta name="description" content="テキストテキストテキストテキストテキストテキストテキスト">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
    <?php wp_head(); ?>
  </head>

  <body>
    <header id="header" class="wrapper">
      <h1 class="site-title">
        <a href="index.html"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Furniture Design"></a>
      </h1>

      <nav id="navi">
        <ul class="nav-menu">
          <li><a href="<?php echo home_url(); ?>">PRODUCTS</a></li>
          <li><a href="about.html">ABOUT</a></li>
          <li><a href="company.html">COMPANY</a></li>
          <li><a href="mailto:xxxxx@xxx.xxx?subject=お問い合わせ">CONTACT</a></li>
        </ul>
      </nav>

      <div class="toggle_btn">
        <span></span>
        <span></span>
      </div>

      <div id="mask"></div>
    </header>
