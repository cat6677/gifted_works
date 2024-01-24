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
          
          <a href="<?php the_permalink(); ?>">
            <?php if(has_post_thumbnail()): ?>
              <!-- サムネイルがある場合 -->
              
                <?php the_post_thumbnail('post-thumbnails'); ?>
              
            <?php else: ?>
            <!-- サムネイルがない場合 -->
              
                <img src="<?php echo get_template_directory_uri(); ?>/img/item1.jpg" width="400" height="200">
             
            <?php endif; ?>

             
              <p>title</p>
              <!-- <p>&yen;99,999 +tax</p> -->
            </a>
        

            </li>
            
          <?php endwhile; else: ?>
            <p>投稿がありません</p>
          <?php endif; ?>
          
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
  