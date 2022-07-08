<?php get_header(); ?>
<main class="main">
  <div class="content">
    <div class="content__inner content__inner--3cols-wrapper">
      <h2 class="heading mt50">
        <span class="heading__en"><?php single_term_title(); ?></span>
        <span class="heading__jp">作品</span>
      </h2>
      <div class="three-cols--wrapper">
        <?php query_posts('category_name=works&posts_per_page=30'); ?>
        <?php if (have_posts()): ?>
          <?php
          while (have_posts()):
            the_post();
            ?>
            <?php get_template_part('template-parts/loop', 'thumbnail-3cols'); ?>
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
