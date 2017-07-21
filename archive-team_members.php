<?php get_header(); ?>
<style>
@media only screen and (min-width:40em) {
.team-row:nth-child(odd) .profile-col {
    border-right: dotted 1px #ccc;
}

.team-row:nth-child(odd) .bio-col {
    border-left: dotted 1px #ccc;
    margin-left: -1px;
}

.team-row:nth-child(even) .bio-col {
    border-right: dotted 1px #ccc;
float:right;
}
.team-row:nth-child(even) .profile-col {
    border-left: dotted 1px #ccc;
	margin-left:-1px;
}

}
@keyframes zoom-in {
  0% {
   transform: scale(.1);
  }
  100% {
    transform: none;
  }
}

@keyframes rotate-right {
  0% {
    transform: translate(-100%) rotate(-100deg);
  }
  100% {
    transform: none;
  }
}
.filter a.active {
color:#E5622D;
}
.is-animated {
  animation: .6s zoom-in;
  // animation: .6s rotate-right; 
}
</style>
<?php
$taxonomy_objects = get_object_taxonomies( 'team_members', 'objects' );
//print_r( $taxonomy_objects);

?>
<style>
.team-cats{
margin: 20px auto;
margin-top:30px;
}
.team-cats li {
display:inline-block;
margin:0 20px;
font-family:"DDIN Next W01 Light","Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;
text-transform:uppercase;
}
</style>
<div class="home-divider" id="our-team">
<h1>Our Team</h1>
<?php
$terms = get_terms( 'team_category' );
$count = count( $terms );
if ( $count > 0 ) {
    echo '<ul class="team-cats filter">';
	echo '<li><a href="#" data-filter="all" class="active">All</a></li>';
    foreach ( $terms as $term ) {
        echo '<li><a href="#" data-filter="' . $term->slug . '">' . $term->name . '</a></li>';
    }
    echo '</ul>';
}
?>

</div>
			
	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="columns" role="main">

		    	<?php
		    	add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
		    	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			  
				$args = array(
					'post_type' => 'team_members',
					'posts_per_page' => -1,
  					//'paged' => $paged,
  					'nopaging'			=> true
				);

				$query = new WP_Query( $args );

				?>

    
			    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'archive-team' ); ?>
				
				<?php endwhile; ?>	

					<?php //joints_page_navi(); ?>
					
				<?php else : ?>
											
					<?php get_template_part( 'parts/content', 'missing' ); ?>
						
				<?php endif; ?>

				<?php remove_filter( 'posts_orderby' , 'posts_orderby_lastname' ); ?>
																								
		    </main> <!-- end #main -->

		    
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
          .addClass('is-animated').fadeIn();
      });
  }
});
});
</script>
<?php get_footer(); ?>
