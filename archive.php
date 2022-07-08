<?php get_header(); ?>
<main class="main">
  <div class="content">
    <div class="content__inner content__inner--1col-wrapper">
      <h2 class="heading"><span class="heading__en"><?php single_term_title(); ?></span></h2>
      <div class="one-col--wrapper">
        <?php if (have_posts()): ?>
          <?php
          while (have_posts()):
            the_post();
            ?>
            <?php get_template_part('template-parts/loop', 'thumbnail-1col'); ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <?php get_template_part('template-parts/parts', 'pagination'); ?>
    </div>
  </div>
</main>
<nav class="footer-nav">
  <ul class="goback-li">
    <li class="goback-li__item">
      <a href="/" class="goback-li__link">HOME</a>
    </li>
  </ul>
  <!-- <?php
  wp_nav_menu(
    array(
      'theme_location' => 'footer-menu',
      'menu_class' => 'pickup-li',
      'sub_menu_class' => 'pickup-li--sub',
      'container' => false,
      'add_li_class' => 'pickup-li__item',
      'add_a_class' => 'pickup-li__link',
    )
  );
  ?> -->
</nav>
<?php get_footer(); ?>
