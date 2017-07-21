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
<?php /*
			<div class="fadeIn wow animated" data-wow-delay="500ms">
				<div class="columns home-anchor-links">
					<ul>
						<?php
						$services 	= get_services_data(); 
						foreach ($services as $service) {
							echo '<li><a href="#' . $service['anchor'] . '">' . $service['title'] . '</a></li>';
						}
						?>
					</ul>
				</div>
			</div> */ ?>
            
          <div class="fadeIn wow animated" data-wow-delay="500ms">
    			<div class="columns home-anchor-links anchor-links">
            
                 <div class="custom-menu-wrapper">
   
    <div class="pure-menu pure-menu-horizontal pure-menu-scrollable custom-menu custom-menu-bottom xxcustom-menu-tucked" id="tuckedMenu">
        <ul class="pure-menu-list">
            <?php
        				$services 	= get_services_data(); 
						foreach ($services as $service) {
							echo '<li class="pure-menu-item"><a class="pure-menu-link" href="#' . $service['anchor'] . '">' . $service['title'] . '</a></li>';
						}
						?>
           
        </ul>
    </div>
   
</div>
 <a href="#" id="scrollRight"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>

</div>

</div>



			<ul class="accordion" style="clear:both;" data-accordion>

				<?php $i = 0; foreach ($services as $service) : ?>
				<?php $is_active = ''; if ( $i == 0 ) $is_active = ' is-active'; ?>
				<li id="<?php echo $service['anchor']; ?>" class="accordion-item<?php echo $is_active; ?>" data-accordion-item>
			    	<a href="#" class="accordion-title"><?php echo $service['title']; ?></a>
			    	<div class="accordion-content" data-tab-content>

			    		<div class="row expanded service-hero-row">
			    			<div class="columns bg-image" style="background:url('<?php echo $service['hero_img']; ?>') no-repeat center center;background-size:cover;">
			    				<?php if ( $service['quote'] ) : ?>
			    				<div class="quote-overlay-white text-right-on-medium">
			    					<div class="quote-inner">
			    						<?php echo $service['quote']; ?>
					      			</div>
								</div>
							<?php endif; ?>
								<div class="hero-overlay-full"></div>
			    			</div>
			    		</div>


			      		<div class="row centered-row medium" style="padding-bottom:1em;">
			      			<div class="columns large-9 medium-9" style="margin:0 auto;float:none;">
			      				<?php echo $service['content']; ?>
			      			</div>
			      		</div>


			      		
			      		<?php if ( $case_studies = $service['case_studies'] ) : ?>
			      			<?php  $ids = array(); ?>
			      			<?php foreach ($case_studies as $index => $case_study) {
			      				$ids[] = $case_study->ID;
			      				} ?>
			      			<?php echo get_case_studies_grid_overlay($ids); ?>
			      		<?php else: ?>
			      			<?php echo get_services_gallery($service['id']); ?>
			      		<?php endif; ?>

			    	</div>
			  	</li>
			  <?php $i++; endforeach; ?>
			</ul>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

	
<?php get_footer(); ?>

