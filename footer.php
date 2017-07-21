					<footer class="footer" role="contentinfo">
						<div id="inner-footer" class="row">
							<div class="large-12 medium-12 columns">
								<nav role="navigation">
		    						<?php joints_footer_links(); ?>
		    					</nav>
		    				</div>
							<div class="large-12 medium-12 columns footer-logo-bar">
								<div class="row display-table">
									<div class="columns large-4 medium-4 text-right display-table-cell">
<p>449 S Beverly Drive, First Floor<br />
Beverly Hills, CA 90212</p>
									</div>
									<div class="columns large-4 medium-4 text-center display-table-cell footer-logo-col">
									<img class="footer-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/login-logo.png">
								<p class="source-org copyright">&copy; <?php echo date('Y'); ?>, All Rights Reserved.</p>
									</div>
									<div class="columns large-4 medium-4 text-left display-table-cell">
<p>email: hello@concord-re.com<br />
telephone: 310 551 0660</p>
									</div>
								</div>
							</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div>  <!-- end .main-content -->
			</div> <!-- end .off-canvas-wrapper-inner -->
		</div> <!-- end .off-canvas-wrapper -->
		<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-84199402-1', 'auto');
  ga('send', 'pageview');
 
</script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    	<script>
			new WOW().init();
		</script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
		<script>
			jQuery().ready(function($) {
				setTimeout(function() {$('#content').removeClass('start');},600);

				$('.anchor-links a').not('#scrollRight').click(function(e){
					e.preventDefault();
					var theAnchor = $(this).attr('href');
					// smooth scroll
					//console.log(theAnchor);
					$('body,html').animate({'scrollTop': $(theAnchor).offset().top}, 500);
					$(theAnchor).find('a').trigger('click');
					
				});

				// trigger equalizer reflow
				// equalizer does not work on hidden elements
				$('.case-study-accordion .accordion-title').on('click', function() {
					var thisTitle = $(this);
					$('.accordion-title').show('', function(){
						//thisTitle.hide();
					});
					$(window).resize();
				});

				$('.accordion-title-close').on('click', function(e){
				
					var theId = $(this).data('accordion-id');
					$('.' + theId).show().trigger('click');
					console.log(theId);
					e.preventDefault();
				});

				// lazy load images
				$('.lazyimg').lazyload({
				    effect : "fadeIn",
				    effect_speed: 800,
				    load: function(elements_left, settings){
				       
				    }
				});

				$(".orbit").on("slidechange.zf.orbit", function(event) {
					setTimeout(function() {$(window).trigger('scroll');}, 400);
				});

				$(window).scroll(function() {
				    clearTimeout($.data(this, 'scrollTimer'));
				    $.data(this, 'scrollTimer', setTimeout(function() {
				        // do something
				        $(window).resize();
				    }, 100));
				});

				if(window.location.hash) {
			      var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
			      console.log(hash);
				
if ( $('.accordion-title').length ) {

			      $('#'+hash).find('.accordion-title').click();

				setTimeout(
					function() {
		          			$('html,body').animate({scrollTop: $(".is-active").offset().top},'slow');}, 400);
		     		
			   
} 		      	
			     
			      // hash found
			  } else {
			      // No hash found
			  }

		
		
			  $(".accordion li > a").click(function() {
			  	setTimeout(function() {
		          $('html,body').animate({
		              scrollTop: $(".is-active").offset().top},
		              'slow');
			  	}, 400);
		      });


			});

jQuery(window).on("load", function () {


if(window.location.hash) {

if ( ! jQuery("#"+hash).length ) return false;
			      var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
			      console.log(hash);
				

setTimeout(
					function() {
		          			jQuery('html,body').animate({scrollTop: jQuery("#"+hash).offset().top},'slow');}, 400);
console.log('hasfound');

}


 


});

          
     
        
		</script>


<script>
jQuery().ready(function($){
    $('#scrollRight').click(function (e) {
        e.preventDefault();
        var leftPos = $('div.pure-menu-scrollable').scrollLeft();
        console.log(leftPos);
        $("div.pure-menu-scrollable").animate({
            scrollLeft: leftPos + 140
        }, 500);
    });
    var menuWrapWidth = $('div.pure-menu-scrollable').width();
    var menuListWidth = $('ul.pure-menu-list').width();
    
    var isScrollableMenu = ( menuWrapWidth < menuListWidth );
    
    if ( isScrollableMenu == true ) { 
        $('#scrollRight').show();
    } else {
        $('#scrollRight').hide();
    }
    
});

jQuery(window).resize(function() {
    var menuWrapWidth = jQuery('div.pure-menu-scrollable').width();
    var menuListWidth = jQuery('ul.pure-menu-list').width();
    
    var isScrollableMenu = ( menuWrapWidth < menuListWidth );
    
    if ( isScrollableMenu == true ) { 
        jQuery('#scrollRight').show();
    } else {
        jQuery('#scrollRight').hide();
    }
});
</script>
	</body>
</html> <!-- end page -->