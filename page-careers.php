<?php get_header(); ?>

<style type="text/css">

	ul.orbit-container {
    height: auto !important;
}
li.orbit-slide {
    max-height: none !important;
}

.bg-contact-us p {
font-size:1.25em;
font-weight:bold;;
margin: 0 6px 0 0;
}
</style>

	<div id="content">

		<div id="inner-content" class="row expanded">

		    <main id="main" class="columns" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop', 'page' ); ?>

			    <?php endwhile; endif; ?>


			</main> <!-- end #main -->
<?php /*
			<div class="fadeIn wow animated" data-wow-delay="500ms">

			<div class="columns home-anchor-links anchor-links">
				<ul>
					<li><a href="#careers">Careers</a></li>
					<li><a href="#press">Press</a></li>
					<li><a href="#contact">Contact Us</a></li>
				</ul>
			</div>
			</div> */ ?>

<div class="fadeIn wow animated" data-wow-delay="500ms">
    			<div class="columns home-anchor-links anchor-links">

                 <div class="custom-menu-wrapper">

    <div class="pure-menu pure-menu-horizontal pure-menu-scrollable custom-menu custom-menu-bottom xxcustom-menu-tucked" id="tuckedMenu">
        <ul class="pure-menu-list">
            <li><a href="#careers">Careers</a></li>
					<li><a href="#press">Press</a></li>
					<li><a href="#contact">Contact Us</a></li>

        </ul>
    </div>

</div>
 <a href="#" id="scrollRight"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>

</div>

</div>

<div class="fadeIn wow animated" data-wow-delay="600ms">

			<div class="row centered-row small" id="careers">
				<div class="columns">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; endif; ?>
				</div>



				<?/*
				<div class="columns medium-6">
					<div class="row">
						<div class="small-6 columns">
			<img width="338" height="455" src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/4d8723df-c5c9-4545-b168-39e129ba0a08_h.png" class="attachment-full size-full wp-post-image" alt="4d8723df-c5c9-4545-b168-39e129ba0a08_h.png" srcset="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/4d8723df-c5c9-4545-b168-39e129ba0a08_h.png 338w, <?php echo get_site_url(); ?>/wp-content/uploads/2016/08/4d8723df-c5c9-4545-b168-39e129ba0a08_h-223x300.png 223w" sizes="(max-width: 338px) 100vw, 338px">
						</div>

						<div class="small-6 columns">
			<img width="338" height="455" src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/56823717-c80f-45ce-830e-6076b964d417_h.png" class="attachment-full size-full wp-post-image" alt="56823717-c80f-45ce-830e-6076b964d417_h.png" srcset="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/56823717-c80f-45ce-830e-6076b964d417_h.png 338w, <?php echo get_site_url(); ?>/wp-content/uploads/2016/08/56823717-c80f-45ce-830e-6076b964d417_h-223x300.png 223w" sizes="(max-width: 338px) 100vw, 338px">
						</div>

					</div>
				</div>
				*/ ?>
			</div>

			<?php
			$jobs 	= get_careers_data();
			$oportunities = get_field('career_opportunities_flag', 37);
			$o_message	= get_field('careers_no_opportunities_message', 37);
			?>

<?php if ( $oportunities == false ) : ?>
			<ul class="accordion careers-accordion" style="clear:both; margin-top:2rem;" data-accordion data-allow-all-closed="true" data-slide-speed="400">

				<?php $i = 0; foreach ($jobs as $job) : ?>
				<?php $is_active = ''; //if ( $i == 0 ) $is_active = ' is-active'; ?>
				<li class="accordion-item<?php echo $is_active; ?> accordion-item-<?php echo $job['id']; ?>" data-accordion-item>

					<a href="#" class="accordion-title"><?php echo $job['title']; ?></a>

		    		<div class="accordion-content" data-tab-content>
		    			<div class="row centered-row small">
		    				<?php echo $job['content']; ?>
		    				<?php if ( $job['pdf'] ) : ?>
		    					<?php echo '<a href="' . $job['pdf'] . '" class="button">Learn more</a>'; ?>
		    				<?php endif; ?>
		    			</div>
		    		</div>
			    </li>

			    <?php $i++; endforeach; ?>
			</ul>
<?php else: ?>
<div class="row centered-row small">
<div class="column">
<p><em><?php echo $o_message; ?></em></p>
</div>
</div>
<?php endif; ?>
</div><!-- eo #careers -->

			<div class="home-divider" id="press">
				<h2>Recent Press</h2>
				<div class="divider-links">
					<a href="<?php echo get_site_url(); ?>/press/">See All Press</a>
				</div>
			</div>

			<?php echo get_press_grid('', 3); ?>


<div class="home-divider" id="contact" style="margin-bottom:0;">
					<h2>Contact Us</h2>
				</div>
		    <div class="bg-contact-us">

				<div class="row centered-row small" style="z-index:20;position:relative;padding-top:2em;">
				<div class="columns medium-6">
				<?php echo do_shortcode('[formidable id=2]'); ?>
				</div>
				<div class="columns medium-6">
			<p style="margin-bottom:25px;margin-top:25px;"><a href="https://www.google.com/maps/place/Concord+Real+Estate+Services/@34.0575427,-118.3986037,18z/data=!4m8!1m2!2m1!1s449+S+Beverly+Drive,+First+Floor+Beverly+Hills,+CA+90212!3m4!1s0x80c2bb8b632ad897:0xbf0acad5880844ba!8m2!3d34.0578552!4d-118.39755?hl=en&authuser=0" target="_blank"><img src="/wp-content/uploads/2017/05/concord-map.png" /></a></p>
			<p>449 S Beverly Drive, First Floor<br>
Beverly Hills, CA 90212</p
>
	<p>310 551 0660</p>
<p>hello@concord-re.com</p>

			</div>
				</div>
				<div class="overlay-white"></div>
		    </div>
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->


<?php get_footer(); ?>
