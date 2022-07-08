<?php get_header(); ?>
      <main class="main">
        <div class="main-visual">
          <p class="main-visual__title">WEBSITE/<br class="sp-tab-only">WEB APPLICATION</p>
          <p class="main-visual__description">CODING - HTML5, CSS3, JavaScript, Vue.js, <br>PHP, WordPress, Laravel / SEO / Web Design</p>
          <div class="main-visual__circle"></div>
          <div class="main-visual__triangle"></div>
          <div class="main-visual__rectangle"></div>
        </div>
        <article class="content content--about" id="about">
          <div class="content__inner content__inner--narrow">
            <h2 class="heading mb60">
              <span class="heading__en">ABOUT</span>
              <span class="heading__jp">経歴</span>
            </h2>
            <div class="about-content">
              <p class="text">WordPressブログの運営をしたり、Webサイト制作会社でHTML5 / CSS3でのマークアップやJavaScriptでの実装やSEO対策をしたりしてきました。</p>
              <p class="text">JavaScript（Vue.js）やPHP（WordPress・Laravel）でWebサイト・アプリをつくり、Web集客もできるようになりたいと思っています。</p>
            </div>
          </div>
          <div class="content--about__deco"></div>
        </article>
        <article class="content content--skills" id="skills">
          <div class="content__inner content__inner--narrow">
            <h2 class="heading mb60">
              <span class="heading__en">SKILLS</span>
              <span class="heading__jp">できること</span>
            </h2>
            <dl class="skills-dl">
              <div class="skills-dl__item">
                <dt class="skills-dl__dt">
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icon-html5css3.svg" alt="" class="skills-dl__icon" width="95" height="auto">
                  <p class="skills-dl__title">HTML5 / CSS3</p>
                </dt>
                <dd class="skills-dl__dd">
                  <p class="skills-dl__desc text">HTML5 / CSS3によるコーディング。EmmetやSassを使った効率的で、セマンティックなマークアップを心がけています。</p>
                </dd>
              </div>
              <div class="skills-dl__item">
                <dt class="skills-dl__dt">
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icon-javascript.svg" alt="" class="skills-dl__icon" width="50" height="50">
                  <p class="skills-dl__title">JavaScript<span class="skills-dl__title--small">（Vue.js）</span></p>
                </dt>
                <dd class="skills-dl__dd">
                  <p class="skills-dl__desc text">JavaScriptでの実装や、Vue.js（Vue
                    CLI・Nuxt.js）とFirebaseの連携によるシングルページアプリケーションの開発。</p>
                </dd>
              </div>
              <div class="skills-dl__item">
                <dt class="skills-dl__dt">
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icon-php.svg" alt="" class="skills-dl__icon" width="50" height="50">
                  <p class="skills-dl__title">PHP<span class="skills-dl__title--small">（WP・Lavavel）</span></p>
                </dt>
                <dd class="skills-dl__dd">
                  <p class="skills-dl__desc text">PHP・Laravelによるアプリケーション開発や、静的サイトのWordPress化。</p>
                </dd>
              </div>
              <div class="skills-dl__item">
                <dt class="skills-dl__dt">
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icon-seo.svg" alt="" class="skills-dl__icon" width="50" height="50">
                  <p class="skills-dl__title">SEO</p>
                </dt>
                <dd class="skills-dl__dd">
                  <p class="skills-dl__desc text">基本的な内部対策、キーワード選定。</p>
                </dd>
              </div>
              <div class="skills-dl__item">
                <dt class="skills-dl__dt">
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icon-xd.svg" alt="" class="skills-dl__icon" width="50" height="50">
                  <p class="skills-dl__title">Web Design</p>
                </dt>
                <dd class="skills-dl__dd">
                  <p class="skills-dl__desc text">Adobe XDでのデザインカンプ作成。</p>
                </dd>
              </div>
            </dl>
          </div>
        </article>
        <article class="content content--works" id="works">
          <div class="content__inner content__inner--wide">
            <h2 class="heading">
              <span class="heading__en">WORKS</span>
              <span class="heading__jp">作品</span>
            </h2>
            <?php
              $post_args = array('display-title-date' => false);
              $blog_args = array(
                'post_type' => 'post',
                'posts_per_page' => 5,
                'category_name' => 'works'
              );
              $tnp_blog_query = new WP_Query($blog_args);
              if ($tnp_blog_query->have_posts()):
            ?>
            <div class="swiper-container <?php echo $post_args['display-title-date'] ? 'display-title-date' : ''; ?>">
              <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                <?php
                while ($tnp_blog_query->have_posts()):
                  $tnp_blog_query->the_post();
                  ?>
                  <div class="swiper-slide"><?php get_template_part('template-parts/loop', 'thumbnail-slider', $post_args); ?></div>
                  <?php
                endwhile;
                wp_reset_postdata();
                ?>
                </div>
                <div class="swiper-button-next" id="works-next"></div>
                <div class="swiper-button-prev" id="works-prev"></div>
              </div>
              <span id="works-next--fake" class="swiper-button-next--fake"></span>
              <span id="works-prev--fake" class="swiper-button-prev--fake"></span>
            </div>
            <?php endif; ?>
            <p class="link-wrapper--center mt45">
              <a href="/category/works/" class="link link--arrow">作品一覧</a>
            </p>
          </div>
        </article>
        <article class="content content--blog" id="blog">
          <div class="content__inner content__inner--wide">
            <h2 class="heading">
              <span class="heading__en">BLOG</span>
              <span class="heading__jp">ブログ</span>
            </h2>
            <?php
              $post_args = array('display-title-date' => true);
              $blog_args = array(
                'post_type' => 'post',
                'posts_per_page' => 5,
                'category_name' => 'blog'
              );
              $tnp_blog_query = new WP_Query($blog_args);
              if ($tnp_blog_query->have_posts()):
            ?>
            <div class="swiper-container <?php echo $post_args['display-title-date'] ? 'display-title-date' : ''; ?>">
              <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                <?php
                while ($tnp_blog_query->have_posts()):
                  $tnp_blog_query->the_post();
                  ?>
                  <div class="swiper-slide"><?php get_template_part('template-parts/loop', 'thumbnail-slider', $post_args); ?></div>
                  <?php
                endwhile;
                wp_reset_postdata();
                ?>
                </div>
                <div class="swiper-button-next" id="blog-next"></div>
                <div class="swiper-button-prev" id="blog-prev"></div>
              </div>
              <p id="blog-next--fake" class="swiper-button-next--fake"></p>
              <p id="blog-prev--fake" class="swiper-button-prev--fake"></p>
            </div>
            <?php endif; ?>
            <p class="link-wrapper--center mt45">
              <a href="category/blog/" class="link link--arrow">ブログ一覧</a>
            </p>
          </div>
        </article>
        <article class="content content--contact" id="contact">
          <div class="content__inner">
            <h2 class="heading heading--circle" data-split="CONTACT">
              <span class="heading__en">CONTACT</span>
              <span class="heading__jp">お問い合わせ</span>
            </h2>
            <p class="link-wrapper--center mt45">
              <a href="mailto:contact@nishikawatakeshi.com" class="link--email">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.797 17.324" class="link__icon--email" fill="red">
                  <g data-name="Icon feather-mail" transform="translate(-2.304 -5.5)">
                    <path data-name="パス 10" d="M5.04,6H21.364A2.046,2.046,0,0,1,23.4,8.04V20.283a2.046,2.046,0,0,1-2.04,2.04H5.04A2.046,2.046,0,0,1,3,20.283V8.04A2.046,2.046,0,0,1,5.04,6Z" transform="translate(0 0)" fill="none" stroke="#161615" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                    <path data-name="パス 11" d="M23.4,9,13.2,16.142,3,9" transform="translate(0 -0.96)" fill="none" stroke="#161615" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                  </g>
                </svg>
                contact@nishikawatakeshi.com
              </a>
            </p>
          </div>
        </article>
      </main>
      <nav class="footer-nav">
        <ul class="goback-li">
          <li class="goback-li__item">
            <a href="#top" class="goback-li__link">HOME</a>
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
