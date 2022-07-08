<?php get_header(); ?>
<div class="content">
  <main class="main">
  <?php if (have_posts()): ?>
    <?php
    while(have_posts()):
      the_post();
      ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h2 class=""><?php the_title(); ?></h2>
      <?php if (has_post_thumbnail()): ?>
        <div class="eyecatch-wrapper">
          <?php the_post_thumbnail('page_eyecatch'); ?>
        </div>
      <?php endif; ?>
      <?php the_content(); ?>
    </article>
    <?php endwhile; ?>
  <?php endif; ?>
  </main>
</div>
<?php get_footer(); ?>
