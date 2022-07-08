<?php get_header(); ?>
      <main class="main">
        <article class="content">
          <div class="content__inner">
            <p class="category-name mt50">
              <?php
                $category = get_the_category();
                echo '<a href="/category/' . $category[0]->slug . '/" class="category-name__inner">' . $category[0]->cat_name . '</a>';
              ?>
            </p>
          <?php if (have_posts()): ?>
            <?php
            while(have_posts()):
              the_post();
              ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class(array('post-content')); ?>>
                <h2 class="heading--post-page"><?php the_title(); ?></h2>
                <p class="heading--post-page--sub"><?php echo post_custom('subtitle'); ?></p>
                <!-- <?php
                  $tnp_post_year = get_the_date('Y');
                  $tnp_post_month = get_the_date('m');
                ?>
                <a href="<?php echo get_month_link($tnp_post_year, $tnp_post_month); ?>" class="">
                  <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
                </a> -->
                <!-- <?php if (has_post_thumbnail()): ?>
                  <div class="eyecatch-wrapper">
                    <?php the_post_thumbnail('page_eyecatch'); ?>
                  </div>
                <?php endif; ?> -->
                <div class="post-content__body"><?php the_content('post-content'); ?></div>
                <!-- <?php the_tags('<ul class=""><li>', '</li><li>', '</li></ul>'); ?> -->
                <dl class="difi-list mt60">
                  <dt class="difi-list__dt">SCOPE:</dt>
                  <dd class="difi-list__dd"><?php echo post_custom('scope'); ?></dd>
                  <dt class="difi-list__dt">SITE:</dt>
                  <dd class="difi-list__dd">
                    <a href="<?php echo post_custom('site-url'); ?>" target="_blank" class="difi-list__link"><?php echo parse_url(post_custom('site-url'))['host']; ?></a>
                  </dd>
                </dl>
              </article>
            <? endwhile; ?>
          <?php endif; ?>
          </div>
        </article>
      </main>
      <nav class="footer-nav">
        <ul class="goback-li">
          <li class="goback-li__item">
            <a href="#top" class="goback-li__link">HOME</a>
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
