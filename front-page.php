<?php get_header(); ?>

<style type="text/css">
	
	ul.orbit-container {
    height: auto !important;
}
li.orbit-slide {
    max-height: none !important;
}
#content.start #sliderWrap{
min-height:100vh;
}
ul.team-cats{
margin-top:1.5em;
}
ul.team-cats li {
    display: inline-block;
    margin: 0 20px;
    font-family: "DDIN Next W01 Light","Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;
    text-transform: uppercase;
}
.filter a.active {
    color: #e5622d;
}
.bio-image {
    float: none !important;
    display: inline-block;
}
.team-grid{
text-align:center;
}
.bio-image{
position:relative;
}
.team-image.hover:after {
    content: 'View profile';
    color: white;
    position: absolute;
    z-index: 10;
    bottom: 54px;
    text-align: center;
    left: 1.04167rem;
    right: 1.04167rem;
    text-transform: uppercase;
    background: rgba(0,0,0,.1);
	z-index:10;
}

</style>
	
	<div id="content" class="fadeInXXanimated wow start" style="opacity:1" data-wow-delay="800ms">
	
		<div id="inner-content" class="row expanded">
	
		    <main id="main" class="columns" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop', 'page' ); ?>
			    
			    <?php endwhile; endif; ?>	
			    					
			    					
			</main> <!-- end #main -->

			<?php /*
			<div>

			<div class="columns home-anchor-links">
				<ul>
					<li class="featured-title">Featured</li>
					<li><a href="<?php echo get_site_url(); ?>/services/">Services</a></li>
					<li><a href="<?php echo get_site_url(); ?>/properties/">Listings</a></li>
					<li><a href="<?php echo get_site_url(); ?>/case-studies/">Case Studies</a></li>
					<li><a href="<?php echo get_site_url(); ?>/our-team/">Our Team</a></li>
				</ul>
			</div>
			</div>

*/ ?>

<div class="fadeIn animated">
    			<div class="columns home-anchor-links">
            
                 <div class="custom-menu-wrapper">
   
    <div class="pure-menu pure-menu-horizontal pure-menu-scrollable custom-menu custom-menu-bottom xxcustom-menu-tucked" id="tuckedMenu">
        <ul class="pure-menu-list">
            <li class="featured-title">Featured</li>
					<li><a href="<?php echo get_site_url(); ?>/services/">Services</a></li>
					<li><a href="<?php echo get_site_url(); ?>/properties/">Listings</a></li>
					<li><a href="<?php echo get_site_url(); ?>/case-studies/">Case Studies</a></li>
					<li><a href="<?php echo get_site_url(); ?>/our-team/">Our Team</a></li>
           
        </ul>
    </div>
   
</div>
 <a href="#" id="scrollRight"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>

</div>

</div>


			<div data-class="fadeIn wow animated" data-wow-delay="500ms">
				<div class="home-divider" id="services">
					<h2>Services</h2>
				</div>
				<?php echo do_shortcode('[services_grid]'); ?>
			</div>
<?php /*
				<h2 class="home-divider" id="case-studies">Case Studies <a href="case-studies">See All Case Studies</a></h2>
				<?php echo do_shortcode('[properties]'); ?>
*/?>
				<div class="home-divider" id="listings">
					<div class="pre-heading-text">Featured</div>
					<h2>Properties</h2>
					<div class="divider-links"><a href="<?php echo get_site_url(); ?>/properties/">See All Commercial</a> &nbsp;|&nbsp; <a href="<?php echo get_site_url(); ?>/properties/">Residential</a></div>
				</div>


    <?php 
$assoc_property_ids = array();
				$featured_properties = get_field('featured_properties', 2);
foreach ($featured_properties as $fp) {
	$assoc_property_ids[] = $fp->ID;
}
				echo get_properties($assoc_property_ids); ?>


				<div class="home-divider" id="case-studies">
					<div class="pre-heading-text">Featured</div>
					<h2>Case Studies</h2>
					<div class="divider-links"><a href="<?php echo get_site_url(); ?>/case-studies/">See All Case Studies</a></div>
				</div>

				<?php 
$assoc_case_studies_ids = array();
				$case_studies = get_field('featured_case_studies', 2);
foreach ($case_studies as $cs) {
	$assoc_case_studies_ids[] = $cs->ID;
}
				echo get_case_studies_orbit($assoc_case_studies_ids); ?>


				<div data-class="fadeIn wow animated" data-wow-delay="600ms">
				<div class="home-divider" id="our-team">
					<h2>Our Team</h2>
					<div class="divider-links-team">
						<?php
						$terms = get_terms( 'team_category' );
						$count = count( $terms );
						if ( $count > 0 ) {
						    echo '<ul class="team-cats filter">';
				        	//echo '<li><a href="#" data-filter="all" class="active">All</a></li>';
				            echo '<li><a href="our-team">All</a></li>';

						    foreach ( $terms as $term ) {
						        echo '<li><a href="#" data-filter="' . $term->slug . '"';
if ($term->slug == 'executive-leadership') echo ' class="active"';
echo '>' . $term->name . '</a></li>';
						    }

						    echo '</ul>';
						}
						?>
					</div>
				</div>

				<?php
				$terms = get_terms( 'team_category' );
				$count = count( $terms );
				if ( $count > 0 ) {
				    foreach ( $terms as $term ) {
				    	if ($term->slug == 'executive-leadership') {
				    		echo '<div data-category="' . $term->slug . '">';
				    	} else {
				    		echo '<div data-category="' . $term->slug . '" style="display:none;">';
				    	}
				    	
				        echo do_shortcode('[team_grid_orbit terms="' . $term->slug . '"]');
				    	echo '</div>';
				    }
				}
				?>

				<?php  ?>
			</div>
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<script type="text/javascript">
jQuery().ready(function($) {
var $filters    = $('.filter [data-filter]'),
    $boxes      = $('[data-category]');

$filters.on('click', function(e) {
  e.preventDefault();
  var $this = $(this);
  $filters.removeClass('active');
  $this.addClass('active');

  var $filterCat = $this.attr('data-filter');

  if ($filterCat == 'all') {
    $boxes.removeClass('is-animated')
      .fadeOut().promise().done(function() {
        $boxes.addClass('is-animated').fadeIn();
      });
  } else {
    $boxes.removeClass('is-animated')
      .fadeOut().promise().done(function() {
        $boxes.filter('[data-category = "' + $filterCat + '"]')
          .addClass('is-animated').fadeIn(100, function() {$(window).trigger('scroll');});
      });
  }

});
});

jQuery().ready(function($) {
$('.team-image').on("touchstart", function (e) {
'use strict'; //satisfy code inspectors
var link = $(this); //preselect the link
if (link.hasClass('hover')) {
    return true;
 } 
else {
   link.addClass('hover');
	$('.team-image').not(this).removeClass('hover');
   e.preventDefault();
   return false; //extra, and to make sure the function has consistent return points
  }
});
});
</script>
	
<?php get_footer(); ?>

