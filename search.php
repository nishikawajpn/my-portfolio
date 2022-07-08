<?php get_header(); ?>
<main class="main">
  <div class="content mb40">
    <div class="content__inner content__inner--1col-wrapper">
      <h2 class="heading">
        <span class="heading__en"><?php single_term_title(); ?></span>
        <span class="heading__jp">ブログ</span>
      </h2>
      <div class="one-col--wrapper">
        <?php if (have_posts()): ?>
          <p class="search-ResultNum">「<?php the_search_query(); ?>」の検索結果</p>
          <?php
          while (have_posts()):
            the_post();
            ?>
            <?php get_template_part('template-parts/loop', 'thumbnail-1col'); ?>
          <?php endwhile; ?>
          <?php get_template_part('template-parts/parts', 'pagination'); ?>
        <?php else: ?>
          <p class="">検索キーワードに一致する記事が見つかりませんでした。他のキーワードでお試しください。</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php get_search_form(); ?>
</main>
<nav class="footer-nav">
  <ul class="goback-li">
    <li class="goback-li__item">
      <a href="/" class="goback-li__link">HOME</a>
    </li>
    <?php if (get_the_category()): ?>
    <li class="goback-li__item">
      <?php
        $category = get_the_category();
        echo '<a href="/category/' . $category[0]->slug . '/" class="goback-li__link">' . $category[0]->cat_name . '</a>';
      ?>
    </li>
    <?php endif; ?>
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
