<div class="search">
  <form action="<?Php echo esc_url(home_url()); ?>" method="get">
    <div class="input-group flex-nowrap">
      <input type="search" name="s" id="search" class="search-field" placeholder="Search" />
      <div class="input-group-append">
        <button type="submit" id="button-search" class="btn-search" aria-label="Search">
          <svg class="search-icon">
            <use xlink:href="#icon-search" />
          </svg>
        </button>
      </div>
    </div>
  </form>
</div><!-- .search -->