<?php $member = get_team_data($post->ID); $use_lazy = false; ?>
<?php
$terms_obj = $member[0]['terms'];
//print_($terms_class);
$terms_class = '';
foreach ($terms_obj as $term) {
	$terms_class .= ' ' . $term->slug;
}
?>
<div id="<?php echo str_replace(' ', '_', strtolower(get_the_title())); ?>" class="row team-row" data-category="<?php echo trim($terms_class); ?>" data-eequalizer data-equalize-on="medium">
<div class="large-5 medium-5 columns profile-col" data-eequalizer-watch>					

	<div class="row">
		<?php if ( get_the_post_thumbnail() ) : ?>
		<div class="large-5 medium-5 small-5 columns image-col">
			<?php if ( $use_lazy ) : ?>
				<img class="lazyimg" data-original="<?php echo the_post_thumbnail_url( 'large' ); ?>" width="208" height="280" />
			<?php else: ?>
				<img  src="<?php echo the_post_thumbnail_url( 'large' ); ?>" width="208" height="280" />
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if ( !get_the_post_thumbnail() ) : ?>
			<div class="columns stats-col">
		<?php else: ?>
			<div class="large-7 medium-7 small-7 columns stats-col">
		<?php endif; ?>
			<h2><?php the_title(); ?></h2>
			<h3><?php echo $member[0]['title'] ?></h3>
			<p><?php echo $member[0]['office'] ?></p>
			<p><?php echo $member[0]['direct'] ?></p>
			<p><?php echo $member[0]['fax'] ?></p>
			<?php /* <p><?php echo $member[0]['email'] ?></p> */ ?>
		</div>
	</div>

</div>


<div class="large-7 medium-7 small-7 show-for-medium columns bio-col" data-equalizer-watch>

	<?php the_field('member_bio'); ?>					
						
</div> 
</div>
