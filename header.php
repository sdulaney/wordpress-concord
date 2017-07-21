<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
			<!--[if IE]>
				<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
			<![endif]-->
			<meta name="msapplication-TileColor" content="#f01d4f">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
	    	<meta name="theme-color" content="#121212">
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>
		<script type="text/javascript" src="//fast.fonts.net/jsapi/f206b357-3a93-42ae-883b-9ed03e32136b.js"></script>

		<!-- Drop Google Analytics here -->
		<!-- end analytics -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		


<style>
.column:last-child:not(:first-child), .columns:last-child:not(:first-child){
float:left;
}
#top-bar-menu{
display:none;
}
.menu .active > a {
    color: #fefefe;
}

.top-bar ul.submenu .active a {
	color:inherit;
}

body.single-case_studies .property-grid .image-wrapper,
body.post-type-archive-case_studies .property-grid .image-wrapper {
    display:table-cell;
}

.case-study-accordion .content-col{
    text-align:left !important;
}

.home-anchor-links{
    position:relative;
}

.case-study-grid .column.odd:last-child:not(:first-child), .columns.odd:last-child:not(:first-child) {
    float:none;
    width:100%;
}

.case-study-grid h2 span{
display:inline-block;
}

@media (max-width:40em) {
    #menu-footer-menu{
        margin:20px;
    }
    .footer .menu > li{
        padding-left:0;
    }
    .home-divider .divider-links{
        font-size:80%;
        margin-top:20px;
        left:0;
        position:relative;
    }
}


@media (min-width:900px) and (max-width:1190px) {
    .case-study-grid h2{
    	letter-spacing: 4px;
        font-size: 18px;
        padding: 20px 10px 10px;
    }
}

@media (max-width:899px){
    .case-study-grid h2{
    	letter-spacing: 4px;
        font-size: 20px;
        padding: 20px 10px 10px;
    }
}

@media (max-width:2490px){

    .listings-button{
        position: absolute !important;
        top: 60% !important;
        z-index: 9999 !important;
        font-size:16px;
        font-weight:500;
        left:0;
        right:0;
        text-align:center;
    }

    .property-grid .image-overlay-content .listings-button a{
    	background:rgba(255,255,255,.6); 
    	display:inline-block;
        position:relative !important;
        padding:5px;
        top: initial;
        bottom: initial;
        left: initial;
        right: initial;
    }


.pure-menu {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box
}

#tuckedMenu ul{
    margin-left:0 !important;
}
.pure-menu-fixed {
    position: fixed;
    left: 0;
    top: 0;
    z-index: 3
}

.pure-menu-list, .pure-menu-item {
    position: relative
}

.pure-menu-list {
    list-style: none;
    margin: 0;
    padding: 0
}

.pure-menu-item {
    padding: 0;
    margin: 0;
    height: 100%
}

.pure-menu-link, .pure-menu-heading {
    display: block;
    text-decoration: none;
    white-space: nowrap
}

.pure-menu-horizontal {
    width: 100%;
    white-space: nowrap
}

.pure-menu-horizontal .pure-menu-list {
    display: inline-block
}

.pure-menu-horizontal .pure-menu-item, .pure-menu-horizontal .pure-menu-heading,
.pure-menu-horizontal .pure-menu-separator {
    display: inline-block;
    * display: inline;
    zoom: 1;
    vertical-align: middle
}

.pure-menu-item .pure-menu-item {
    display: block
}

.pure-menu-children {
    display: none;
    position: absolute;
    left: 100%;
    top: 0;
    margin: 0;
    padding: 0;
    z-index: 3
}

.pure-menu-horizontal .pure-menu-children {
    left: 0;
    top: auto;
    width: inherit
}

.pure-menu-allow-hover:hover > .pure-menu-children, .pure-menu-active > .pure-menu-children {
    display: block;
    position: absolute
}

.pure-menu-has-children > .pure-menu-link:after {
   /* padding-left: .5em;
    content: "\25B8";
    font-size: small*/
}

.pure-menu-horizontal .pure-menu-has-children > .pure-menu-link:after {
   /* content: "\25BE" */
}

.pure-menu-scrollable {
    overflow-y: scroll;
    overflow-x: hidden
}

.pure-menu-scrollable .pure-menu-list {
    display: block
}

.pure-menu-horizontal.pure-menu-scrollable .pure-menu-list {
    display: inline-block
}

.pure-menu-horizontal.pure-menu-scrollable {
    white-space: nowrap;
    overflow-y: hidden;
    overflow-x: auto;
    -ms-overflow-style: none;
    -webkit-overflow-scrolling: touch;
    padding: .5em 0
}

.pure-menu-horizontal.pure-menu-scrollable::-webkit-scrollbar {
    display: none
}

.pure-menu-separator {
    
}

.pure-menu-horizontal .pure-menu-separator {
    width: 1px;
    height: 1.3em;
    margin: 0 .3em
}

.pure-menu-heading {
    
}

.pure-menu-link {
}

.pure-menu-children {
}

.pure-menu-link, .pure-menu-disabled, .pure-menu-heading {
    padding: .5em 1em
}

.pure-menu-disabled {
    opacity: .5
}

.pure-menu-disabled .pure-menu-link:hover {
    background-color: transparent
}

.pure-menu-active > .pure-menu-link, .pure-menu-link:hover, .pure-menu-link:focus {
}

.pure-menu-selected .pure-menu-link, .pure-menu-selected .pure-menu-link:visited {
}


.custom-menu-wrapper {
    position:relative;
    white-space: nowrap;
    position: relative;
	height: 35px;
    margin-right: 0px;
    margin-left: 0;
}

#scrollRight{
    border: none;
    position: absolute;
    right: -30px;
    padding: 0;
    margin: 0;
    font-size: 25px;
    top: 0;
    border-left: solid 1px #ccc;
    padding: 11px;
    bottom: 0;
    background: rgba(255,255,255,.6);
	right: 0;
z-index:9999;
}

#scrollRight .fa {
    margin-top:8px;
opacity:.5;
}

@media (max-width:540px) {
	.home-anchor-links{
    	background: #f3f3f5 !important;
        padding-left:10px;
        padding-right:10px;
    }
}

.service-hero-row .quote-inner {
	position: absolute;
    bottom: 20px;
    top: 20px;
    right: 20px;
    left: 20px;
}

.service-hero-row .quote-overlay-white {
	bottom: 20px;
    top: 20px;
    right: 20px;
    left: 20px;
}

@media (min-width: 540px) {
	.custom-menu-wrapper {
    	height: 35px;
        margin-right: 61px;
        margin-left: 60px;
    }

    #scrollRight{
        padding:10px;
        right:53px;
    }

    #scrollRight .fa {
        margin-top:10px;
    }
}

@media (min-width: 640px) {
    	
    #scrollRight{
        right:91px;
    }

    #scrollRight .fa {
        margin-top:30px;
    }
}

.custom-menu {
    display: inline-block;
    width: auto;
    vertical-align: middle;
    -webkit-font-smoothing: antialiased;
}

.custom-menu .pure-menu-link,
.custom-menu .pure-menu-heading {
}

.custom-menu .pure-menu-link:hover,
.custom-menu .pure-menu-heading:hover {
    background-color: transparent;
}

.custom-menu-top {
    position: relative;
    
}


.custom-menu-tucked .custom-menu-screen {
    -webkit-transform: translateY(-44px);
    -moz-transform: translateY(-44px);
    -ms-transform: translateY(-44px);
    transform: translateY(-44px);
}

@media (max-width: 2272em) {

    .custom-menu {
        display: block;
    }

    .custom-menu-toggle {
        display: block;
        display: none\9;
    }

    .custom-menu-bottom {
        position: absolute;
        width: 100%;
        z-index: 100;
    }

    .custom-menu-bottom .pure-menu-link {
        opacity: 1;
        -webkit-transform: translateX(0);
        -moz-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0);
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -ms-transition: all 0.5s;
        transition: all 0.5s;
    }

    .custom-menu-bottom.custom-menu-tucked .pure-menu-link {
        -webkit-transform: translateX(-140px);
        -moz-transform: translateX(-140px);
        -ms-transform: translateX(-140px);
        transform: translateX(-140px);
        opacity: 0;
        opacity: 1\9;
    }

    

}


div.title-bar {
background: #585858 url(/wp-content/themes/concord/assets/images/login-logo.png) no-repeat center center;
    background-size: auto 64%;
}

.grid-icon.sold:after {
    border-color: transparent transparent #944c25 transparent;
}
</style>
	</head>
	
	<!-- Uncomment this line if using the Off-Canvas Menu --> 
		
	<body <?php body_class(''); ?>>

		<div class="off-canvas-wrapper">
			
			<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
				
				<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
				
				<div class="off-canvas-content" data-off-canvas-content>
					
					<header class="header" role="banner">
							
						 <!-- This navs will be applied to the topbar, above all content 
							  To see additional nav styles, visit the /parts directory -->
						 <?php get_template_part( 'parts/nav', 'title-bar' ); ?>
		 	
					</header> <!-- end .header -->
