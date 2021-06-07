<div class="dashboard-heading dashboard-flex">
  <div class="dashboard-heading-left-content dashboard-flex mr-26">
      <div class="dashboard-heading-icon">
        <img class="admin-light-icon" src="<?php echo esc_url(CREST_IMAGE. 'elements.svg'); ?>" alt="Over View">
      </div>
      <div class="dashboard-heading-text">
        <h3 class="title"><?php echo esc_html__('Performance', 'kcg'); ?></h3>
      </div>
  </div>
</div>
<div class="purge--main-content">
	<div class="purge-inner-content">
		<h4 class="kcg-title"><?php echo esc_html__('Remove Cache', 'kcg'); ?></h4>
		<p class="kcg-paragraph"><?php echo esc_html__('Remove all the cache file from the derectory for speed up site performance.', 'kcg'); ?></p>
	</div>
	<div class="purge-button-content">
		<button class="purge-button kcg-remove-cache" id="kcg-remove-cache"><?php echo esc_html__('Purge All Cache', 'kcg'); ?><span class="loading-ring"></span></button>
    <button class="purge-button kcg-remove-backend" id="kcg-remove-backend"><?php echo esc_html__('Purge Backend', 'kcg'); ?><span class="loading-ring"></span></button>
	</div>
</div>