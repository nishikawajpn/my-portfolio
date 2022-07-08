<article id="post-<?php the_ID(); ?>" <?php post_class('swiper__item'); ?>>
  <a href="<?php the_permalink(); ?>" class="">
  <?php if (has_post_thumbnail()): ?>
    <?php the_post_thumbnail('slider_thumbnail'); ?>
  <?php else: ?>
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/no-image.png" alt="No Image" width="246" height="164">
  <?php endif; ?>
  <?php if ($args['display-title-date']): ?>
    <p class="swiper__title"><?php the_title(); ?></p>
    <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="swiper__date"><?php echo get_the_date('Y-m-d'); ?></time>
  <?php endif; ?>

  <!-- <h3 class=""><?php the_title(); ?></h3>
  <p class=""><?php echo esc_html(get_the_excerpt()); ?></p>
  <?php
    $tnp_category_list = get_the_category();
    if ($tnp_category_list):
  ?>
  <p class=""><?php echo esc_html($tnp_category_list[0]->name); ?></p>
  <?php endif; ?>
  <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time> -->

  </a>
</article>
