<article id="post-<?php the_ID(); ?>" <?php post_class('three-cols__item'); ?>>
  <a href="<?php the_permalink(); ?>" class="three-cols__link">
  <?php
    if (has_post_thumbnail()) {
      $post_title = get_the_title();
      $attr = array(
        'class' => "three-cols__image",
	      'alt' => $post_title
      );
  ?>
    <?php the_post_thumbnail('archive_thumbnail--three-cols', $attr); ?>
  <?php } else { ?>
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/no-image.png" alt="No Image" width="264" height="178" class="three-cols__image">
  <?php } ?>
    <h3 class="three-cols__title"><?php the_title(); ?></h3>
    <!-- <p class=""><?php echo esc_html(get_the_excerpt()); ?></p>
    <?php
      $tnp_category_list = get_the_category();
      if ($tnp_category_list):
    ?>
    <p class=""><?php echo esc_html($tnp_category_list[0]->name); ?></p>
    <?php endif; ?>
    <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time> -->
  </a>
</article>
