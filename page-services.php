<?php get_header(); ?>

<style type="text/css">
	
	ul.orbit-container {
    height: auto !important;
}
li.orbit-slide {
    max-height: none !important;
}
</style>
	
	<div id="content">
	
		<div id="inner-content" class="row expanded">
	
		    <main id="main" class="columns" role="main">
				
				<?php /* if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop', 'page' ); ?>
			    
			    <?php endwhile; endif; */?>	
			    <div class="fadeIn wow animated" data-wow-delay="300ms">	

			    <?php echo do_shortcode('[masterslider id="2"]'); ?>
			    </div>

			    					
			    					
			</main> <!-- end #main -->

			<div class="fadeIn wow animated" data-wow-delay="500ms">

			<div class="columns home-anchor-links">
				<ul>
				<?php
				$services = get_services_data(); 
				foreach ($services as $service) {
					echo '<li><a href="' . $service['anchor'] . '">' . $service['title'] . '</a></li>';
				}
				?>

				</ul>
			</div>
			</div>

<div class="fadeIn wow animated" data-wow-delay="600ms">
			<h2 class="home-divider" id="our-team">Our Team <a href="our-team">See All Team Members</a></h2>

			<?php echo do_shortcode('[team_grid_orbit]'); ?>
</div>

<div class="fadeInUp wow animated" data-wow-delay="100ms"">
			<h2 class="home-divider" id="case-studies">Case Studies</h2>

			<?php echo do_shortcode('[properties]'); ?>
		    </div>
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

	
<?php get_footer(); ?>

