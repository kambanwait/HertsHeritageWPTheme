<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie10"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">
	<?php // force Internet Explorer to use the latest rendering engine available ?>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame. Remove this if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- ****** faviconit.com favicons ****** -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <link rel="icon" sizes="16x16 32x32 64x64" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <link rel="icon" type="image/png" sizes="196x196" href="<?php echo get_template_directory_uri(); ?>/favicon-192.png">
    <link rel="icon" type="image/png" sizes="160x160" href="<?php echo get_template_directory_uri(); ?>/favicon-160.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/favicon-96.png">
    <link rel="icon" type="image/png" sizes="64x64" href="<?php echo get_template_directory_uri(); ?>/favicon-64.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16.png">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/favicon-57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/favicon-114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/favicon-72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/favicon-144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/favicon-60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/favicon-120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/favicon-76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/favicon-152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicon-180.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favicon-144.png">
    <meta name="msapplication-config" content="/browserconfig.xml">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- ****** faviconit.com favicons ****** -->

	<title><?php wp_title(''); ?></title>

	<?php // mobile meta (hooray!) ?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="stylesheet" type="text/css" href="https://cloud.typography.com/6059312/690088/css/fonts.css" />
	<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<![endif]-->
	<?php // or, set /favicon.ico for IE10 win ?>
	<meta name="msapplication-TileColor" content="#f01d4f">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
    <meta name="theme-color" content="#121212">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php // wordpress head functions ?>
	<?php wp_head(); ?>
	<?php // end of wordpress head ?>
</head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
 
    <!-- if IE < 9 -->
    <div class="container IE" style="display:none;">
        <img class="hertsHeritageLogo" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/hertsHeritageLogo.png" alt="<?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?>" width="114" height="141" />

        <h3>Sorry, but we've decided to not yet support older browsers. Please use an up to date browser to view this site.<br />Thank you</h3>
        <h3>Supported browsers</h3>
        <a href="http://www.mozilla.org/en-Uk/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/ff.png" class="browsers" /></a>
        <a href="https://www.google.com/intl/en_uk/chrome/browser/?hl=en-GB" target="_blank" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/chrome.png" class="browsers" /></a>
        <a href="https://www.apple.com/uk/safari/" target="_blank" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/safari.png" class="browsers" /></a>
    </div>


    <!-- if not IE < 9 -->
	<div class="container notIE">
        <!-- Only show this when on the home page -->
        <?php if( is_page('Home') ) { ?>
            <header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

                <div id="top-header" class="cf">
                    <!-- Logo -->
                    <!--[if gte IE 9]><!-->
                    <img id="logo" src="<?php echo get_bloginfo('template_directory');?>/library/images/hertsHeritageLogo.svg" onerror="this.src='<?php echo get_bloginfo('template_directory');?>/library/images/hertsHeritageLogo.png';this.onerror=null;" alt="Herts Heritage Logo" width="114" height="141" />
                    <!--<![endif]-->

                    <!--[if lte IE 8]>
                      <img id="logo" src="<?php echo get_bloginfo('template_directory');?>/library/images/hertsHeritageLogo.png" alt="Herts Heritage Logo" width="114" height="141" />
                    <![endif]-->

                    <!-- chimney -->
                    <img id="chimney" src="<?php echo get_bloginfo('template_directory');?>/library/images/green-house-cnr-right.png" width="91" height="103" />

                    <!-- downArrow -->
                    <img id="downArrow" src="<?php echo get_bloginfo('template_directory');?>/library/images/downArrow.png" width="47" height="17" />
                </div> <!-- top-header -->
  			</header>
        <!-- Only show this when on the home page -->
        <?php } ?>

    <div id="content">
        <div id="menuContainer" class="cf">
            <img src="<?php echo get_bloginfo('template_directory');?>/library/images/herts-logo-menu-bar.png" id="menuBarLogo" width="36" height="45" />

            <span id="menuToggle"> MENU </span>
            <nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                <?php wp_nav_menu(array(
                    'container' => false,                           // remove nav container
                    'container_class' => 'menu cf',                 // class of container (should you choose to use it)
                    'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
                    'menu_class' => 'nav top-nav cf',               // adding custom nav class
                    'theme_location' => 'main-nav',                 // where it's located in the theme
                    'before' => '',                                 // before the menu
                    'after' => '',                                  // after the menu
                    'link_before' => '',                            // before each link
                    'link_after' => '',                             // after each link
                    'depth' => 1,                                   // limit the depth of the nav
                    'fallback_cb' => ''                             // fallback function (if there is one)
                )); ?>
            </nav>
        </div> <!-- menuContainer -->