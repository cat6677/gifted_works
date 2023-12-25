 <?php get_header(); ?>
 <main>
      <div id="top" class="wrapper">
        <!-- ul開始 -->
      <ul class="product-list">
        <?php if(have_posts()): ?>
          <?php while(have_posts()):the_post(); ?>
          <!-- 鈴木さん指示 -->
          <li>
           <!-- 投稿ページ繰り返し -->
          <article>
            <?php if(has_post_thumbnail()): ?>
              <!-- サムネイルがある場合 -->
              <figure>
                <?php the_post_thumbnail('post-thumbnails'); ?>
              </figure>
            <?php else: ?>
            <!-- サムネイルがない場合 -->
              <figure>
                 <img src="<?php echo get_template_directory_uri(); ?>/img/item1.jpg" width="400" height="200">
              </figure>
            <?php endif; ?>

              <p><?php the_date(); ?></p>
              <p><?php the_title(); ?></p>
              <a href="<?php the_permalink(); ?>">詳細はこちら</a>
        </article>

            </li>
            <li>
          <?php endwhile; else: ?>
            <p>投稿がありません</p>
          <?php endif; ?>
          </li>
          </ul>
          <?php
      $args = array(
          'mid_size' => 1,
          'prev_text' => '&lt;&lt;前へ',
          'next_text' => '次へ&gt;&gt;',
          'screen_reader_text' => ' ',
      );
      the_posts_pagination($args);
    ?>
      </div>
      

    
   
    </main>
    
<?php get_footer(); ?>
  