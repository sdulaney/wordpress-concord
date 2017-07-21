<?php $masterslider = get_field('page_top_bannerslider'); ?>
<div id="sliderWrap" class="fadeIn wow animated" data-wow-delay="300ms">
	<?php if ( $masterslider ) echo str_replace('<p>&nbsp;</p>', '', $masterslider); ?>
</div>