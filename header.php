<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/nivo-slider/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({
        pauseTime: 4000,
        directionNav: true, // Next & Prev navigation
        directionNavHide: true, // Only show on hover
        controlNav: false, // 1,2,3... navigation
        controlNavThumbs: false, // Use thumbnails for Control Nav
        prevText: '', // Prev directionNav text
        nextText: ''
    });
});
</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <header id="masthead" class="site-header" role="banner">
        <hgroup>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        </hgroup>

        <nav id="site-navigation" class="main-navigation" role="navigation">
            <h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
            <a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
        </nav><!-- #site-navigation -->

        <?php
        $headerImages = array();
        $dir = __DIR__ . '/header_images';
        if ($handle = opendir($dir)) {
            while (false !== ($entry = readdir($handle))) {
                if(substr($entry, -3) == 'jpg') {
                    $headerImages[] = get_stylesheet_directory_uri() . "/header_images/$entry";
                }
            }
            closedir($handle);
            shuffle($headerImages);
        }
        ?>
        <div class="slider-wrapper">
            <div id="slider" class="nivoSlider">
                <?php foreach($headerImages as $img): ?>
                <img src="<?php echo $img; ?>" alt=""/>
                <?php endforeach; ?>
            </div>
        </div>
    </header><!-- #masthead -->

    <div id="main" class="wrapper">
