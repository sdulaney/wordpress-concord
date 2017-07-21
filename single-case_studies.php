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

			</main> <!-- end #main -->

			
			<?php
			$case_studies 	= get_case_studies_data($post->ID); 
			?>

			<ul class="accordion case-study-accordion" style="clear:both;" data-accordion data-allow-all-closed="true" data-slide-speed="400">
				<?php $i = 0; foreach ($case_studies as $case) : ?>
				<?php $is_active = ''; //if ( $i == 0 ) $is_active = ' is-active'; ?>
				<li id="<?php echo $case['anchor']; ?>" class="accordion-item<?php echo $is_active; ?> accordion-item-<?php echo $case['id']; ?>" data-accordion-item>
					<div class="row expanded">
			    			<div class="columns overlay-fade-in" style="background:url('<?php echo $case['img_banner']; ?>') no-repeat center center;background-size:cover;">
			    				<div class="hero-overlay-white">
			    						<p class="top-title">Case Study:</p>
			    						<h2><?php echo $case['street']; ?></h2>
			    						<p><?php echo $case['city']; ?>, <?php echo $case['state']; ?> <br /><?php echo $case['zip']; ?></p>
			    						<?php if ( count($case['services']) > 1 ) : ?>
			    						<h3 class="concord-services-title-box">What We Did:</h3>
					      				<ul class="two-col-list">
						      				<?php foreach ($case['services'] as $concord_service): ?>

<?php $anchor = str_replace(' ', '-', strtolower($concord_service->post_title)); ?>
						      					<li><a href="/services/#<?php echo $anchor; ?>"><?php echo $concord_service->post_title; ?></a></li>
						      				<?php endforeach; ?>
					      				</ul>
					      			<?php endif; ?>
								</div>
								<div class="hero-overlay-full"></div>
			    			</div>
			    		</div>
			    	<a href="#" class="accordion-title accordionLink<?php echo $case['id']; ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> Learn More About <?php echo $case['title']; ?> Case Study</a>
			    	<div class="accordion-content" data-tab-content>
			    		
			      		<div class="row centered-row">
			      			<div class="medium-7 columns content-col">
			      				<?php echo $case['content']; ?>
			      			</div>
			      			<div class="medium-5 columns">
			      				<?php if ( count($case['services']) > 1 ) : ?>
				      				<h3 class="concord-services-title">Concord Services</h3>
				      				<ul class="concord-services-list">
				      				<?php foreach ($case['services'] as $concord_service): ?>

<?php $anchor = str_replace(' ', '-', strtolower($concord_service->post_title)); ?>
				      					<li><a href="/services/#<?php echo $anchor; ?>"><?php echo $concord_service->post_title; ?></a></li>
				      				<?php endforeach; ?>
				      				</ul>
			      				<?php endif; ?>
			      			</div>



			      		</div>
			      		<div class="row property-grid collapse" data-equalizer style="clear:both;">
			      			
			      			<?php if ( $case['quote'] ) : ?>
							<div class="quote-overlay-wrap" data-equalizer-watch>
					      		<div class="quote-overlay">
					      			<div>
					      				<?php echo $case['quote']; ?>
					      				
					      				<?php if ($case['quote_person']): ?>
					      					<p class="quote-person">&dash; <?php echo $case['quote_person']; ?></p>
					      				<?php endif; ?>
					      				
					      				<?php if ($link = $case['quote_link']) : ?>
					      					<a class="quote-link" href="<?php echo $link; ?>" target="_blank"></a>
					      				<?php endif; ?>
					      			</div>
					      		</div>
					      	</div>
					      <?php endif; ?>

							  <div class="medium-4 large-4 columns" data-equalizer-watch>
							    <div class="image-wrapper overlay-fade-in"><img class="img-responsive" src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/service-property-management.jpg">
							      <div class="image-overlay-content"><
							      </div>
							    </div>
							  </div>
							  <div class="medium-4 large-4 columns">
							    <div class="image-wrapper overlay-fade-in"><img class="img-responsive" src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/services-capital-markets.jpg">
							      <div class="image-overlay-content">
							      </div>
							    </div>
							  </div>
							  <div class="medium-4 large-4 columns">
							    <div class="image-wrapper overlay-fade-in"><img class="img-responsive" src="<?php echo get_site_url(); ?>/wp-content/uploads/2016/08/services-advisory.jpg">
							      <div class="image-overlay-content">
							      </div>
							    </div>
							  </div>
							  <div class="property-grid-logo"></div>
						</div>

<a href="#" class="accordion-title-close" data-accordion-id="accordionLink<?php echo $case['id']; ?>"><i class="fa fa-arrow-up" aria-hidden="true"></i> Learn More About <?php echo $case['title']; ?> Case Study</a>
			    	</div>
			  	</li>
			  <?php $i++; endforeach; ?>
			</ul>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

	
<?php get_footer(); ?>

