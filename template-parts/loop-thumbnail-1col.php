<article id="post-<?php the_ID(); ?>" <?php post_class('one-col__item'); ?>>
  <a href="<?php the_permalink(); ?>" class="one-col__link">
  <?php
    if (has_post_thumbnail()) {
      $post_title = get_the_title();
      $attr = array(
        'class' => 'one-col__image',
        'alt' => $post_title
      )
  ?>
    <?php the_post_thumbnail('archive_thumbnail--one-col', $attr); ?>
  <?php } else { ?>
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/no-image.png" alt="No Image" width="420" height="274" class="one-col__image">
  <?php } ?>
  <div class="one-col__right">
    <h3 class="one-col__title"><?php the_title(); ?></h3>
    <p class="one-col__excerpt"><?php the_excerpt(); ?></p>
    <p class="one-col__readmore--wrapper link-wrapper--center">
      <span class="link--chevron">Read More</span>
    </p>
  </div>
  <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="one-col__date"><?php echo get_the_date('Y-m-d'); ?></time>
  </a>
</article>
