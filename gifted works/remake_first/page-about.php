<?php get_header(); ?>

    <main>
      <div class="content wrapper">
        <h1 class="page-title"><?php the_title() ?></h1>
        <div id="about">
          <p>
          <?php the_content(); ?>
          </p>
        </div>
      </div>
    </main>

    <?php get_footer(); ?>