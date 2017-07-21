<!-- Specialised header to insert SEO friendly meta info -->
<?php get_header( 'properties' ); ?>

	<div id="content">

		<div id="inner-content" class="row expanded">

		    <main id="main" class="columns" role="main">
		    	<div class="fadeIn wow animated" data-wow-delay="300ms">

			    <?php //echo do_shortcode('[masterslider id="2"]'); ?>
			    </div>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php //get_template_part( 'parts/loop', 'page' ); ?>

			    <?php endwhile; endif; ?>



			</main> <!-- end #main -->





		</div> <!-- end #inner-content -->

            <div class="home-divider" id="commercial">
			<h2>Commercial Properties</h2>
		</div>

		<?php echo get_properties('', -1, 'active', 'commercial'); ?>

		<div class="home-divider" id="residential">
			<h2>Residential Properties</h2>
		</div>

		<?php echo get_properties('', -1, 'active', 'residential'); ?>



		<div class="home-divider" id="forlease">
			<h2>For Lease</h2>
		</div>

		<?php echo get_properties('', -1, 'active', 'for-lease'); ?>

		<div class="home-divider" id="closed">
			<h2>Closed</h2>
		</div>

		<?php echo get_properties('', -1, 'sold'); ?>


	</div> <!-- end #content -->

<?php get_footer(); ?>
