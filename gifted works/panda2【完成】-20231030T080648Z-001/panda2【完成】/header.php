<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title><?php titles() ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/common.css">
    <?php wp_head(); ?>
  </head>

  <body>
    <header id="header" class="wrapper">
   

      <nav id="navi">
        <ul class="nav-menu">
          <li><a href="<?php echo home_url();?>">HOME</a></li>
          <li><a href="about.html">ABOUT</a></li>
          <li><a href="company.html">COMPANY</a></li>
          <li><a href="mailto:xxxxx@xxx.xxx?subject=お問い合わせ">CONTACT</a></li>
        </ul>
      </nav>

      

      <div id="mask"></div>
    </header>