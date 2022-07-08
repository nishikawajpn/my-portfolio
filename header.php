<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php wp_head(); ?>
</head>

<body id="top">
  <div class="container">
    <a href="#top" class="goback-top" id="goback-top"></a>
    <header class="header">
      <h1 class="header__logo">
        <a href="/" class="header__link">NISHIKAWATAKESHI.COM</a>
      </h1>
      <nav class="header__nav global-nav">
        <div class="global-nav-button" id="global-nav-button">
          <div class="global-nav-button__lines">
            <span class="global-nav-button__line"></span>
            <span class="global-nav-button__line"></span>
            <span class="global-nav-button__line"></span>
          </div>
          <p class="global-nav-button__label">MENU</p>
        </div>
        <div class="global-nav__body">
          <div class="global-nav__body--inner">
            <h2 class="global-nav__title--outer">
              <span class="global-nav__title" data-split="MENU">MENU</span>
            </h2>
            <?php
            wp_nav_menu(
              array(
                'theme_location' => 'main-menu',
                'menu_class' => 'global-nav__li',
                'container' => false,
                'add_li_class' => 'global-nav__item global-nav__item--delaytime',
                'add_a_class' => 'global-nav__link',
              )
            );
            ?>
            <!-- <p class="global-nav__domain--wrapper global-nav__item--delaytime">
              <a href="" class="global-nav__domain">NISHIKAWATAKESHI.COM</a>
            </p> -->
          </div>
        </div>
      </nav>
      <div class="silhouette-link--wrapper">
        <a href="/" class="silhouette-link"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/obj-shiba.svg" alt="" class="silhouette-link__image" width="30" height="auto"></a>
      </div>
    </header>
