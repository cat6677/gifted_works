<?php get_header(); ?>
    
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
            <p>&yen;99,999 +tax</p>
            <dl>
              <dt>SIZE：</dt>
              <dd>W999 × D999 × H999</dd>
              <dt>COLOR：</dt>
              <dd>テキスト</dd>
              <dt>MATERIAL：</dt>
              <dd>テキストテキストテキスト</dd>
            </dl>
          </div>
        </div>
        <a class="link-text" href="products.html">Back To Products</a>
      </div>
    </main>
    <?php get_footer(); ?>

  