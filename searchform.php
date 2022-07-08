<div class="search-form--wrapper">
  <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label for="" class="search-form__label--wrapper">
      <span class="search-form__search--outer">
        <span class="search-form__search--inner">
          <input type="hidden" class="" value="4" name="cat"/>
          <input type="text" class="search-form__search" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
        </span>
      </span>
      <span class="search-form__label"><?php echo _x( 'SEARCH', 'label' ) ?></span>
    </label>
  </form>
</div>
