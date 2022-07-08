<?php get_header(); ?>
<div class="content">
  <main class="main" style="background: green">
  <?php if (have_posts()): ?>
    <?php
    while(have_posts()):
      the_post();
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2 class=""><?php the_title(); ?></h2>
        <?php the_category(', '); ?> /
        <?php
          $tnp_post_year = get_the_date('Y');
          $tnp_post_month = get_the_date('m');
        ?>
        <a href="<?php echo get_month_link($tnp_post_year, $tnp_post_month); ?>" class="">
          <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
        </a>
        <?php if (has_post_thumbnail()): ?>
          <div class="eyecatch-wrapper">
            <?php the_post_thumbnail('page_eyecatch'); ?>
          </div>
        <?php endif; ?>
        <?php the_content(); ?>
        <?php the_tags('<ul class=""><li>', '</li><li>', '</li></ul>'); ?>
      </article>
      <? endwhile; ?>
  <?php endif; ?>
  </main>
</div>
<?php get_footer(); ?>
