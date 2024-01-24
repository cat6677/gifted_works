<?php get_header(); ?>
<?
/* 

Template Name:投稿ページ

*/
?>    
    <main>
      <div class="content wrapper">
        <h1 class="page-title"><?php the_title() ?></h1>
        <div id="item">
          <div class="item-img">
            <img src="<?php echo get_template_directory_uri(); ?>/img/item1.jpg" alt="">
          </div>
          <div class="item-text">
            <p>
            <?php the_content() ?>
            </p>
            <!-- <p>&yen;<?php echo CFS()->get("price"); ?>+tax</p> -->
            <dl>
              <dt>LP制作:</dt>
              <dd><?php echo CFS()->get("size"); ?></dd>
              <dt>Wordpress:</dt>
              <dd><?php echo CFS()->get("color"); ?></dd>
              <dt>アプリ開発:</dt>
              <dd><?php echo CFS()->get("material"); ?></dd>
            </dl>
          </div>
        </div>
        <a href="<?php echo home_url(); ?>">Back To Products</a>
      </div>
    </main>
    <?php get_footer(); ?>

  