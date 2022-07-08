<?php get_header(); ?>
      <main class="main">
        <div class="content">
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
                <article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>
                  <h2 class="heading--post-page mb50"><?php the_title(); ?></h2>
                  <?php if (has_post_thumbnail()): ?>
                    <?php
                      $attr = array (
                        'class' => "post-content__image",
                      );
                      the_post_thumbnail('page_eyecatch', $attr);
                    ?>
                  <?php endif; ?>
                  <div class="post-content__body post-content__body--b-hr">
                    <?php the_content(); ?>
                  </div>
                  <dl class="difi-list mb40 mt60">
                    <dt class="difi-list__dt">UPDATE:</dt>
                    <dd class="difi-list__dd"><?php echo get_the_date('Y-m-d') . ' ' . get_the_time(); ?></dd>
                    <dt class="difi-list__dt">TAGS:</dt>
                    <dd class="difi-list__dd">
                      <?php the_tags('', ' ', ''); ?>
                    </dd>
                    <!-- <dt class="difi-list__dt">SHARE:</dt>
                    <dd class="difi-list__dd"></dd> -->
                  </dl>
                  <?php get_search_form(); ?>
                </article>
              <? endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
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
