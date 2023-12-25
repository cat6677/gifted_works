
<?php get_header(); ?>
    <main>
      <div id="top" class="wrapper">
        <?php if(have_posts()): ?>
          <?php while(have_posts()):the_post(); ?>
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
            </a>
        </article>
          <?php endwhile; else: ?>
            <p>投稿がありません</p>
          <?php endif; ?>
        <a class="link-text" href="products.html">View More</a>
      </div>
    </main>
<?php get_footer(); ?>
    