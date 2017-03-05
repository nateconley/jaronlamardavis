<?php
/**
 * This is the header!
 */
?>
<!doctype html>
<head>
	<title><?php bloginfo( 'name' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<nav>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<h1>jaron<span>lamar</span>davis</h1>
	</a>
	<div class="hamburger">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<?php wp_nav_menu( array( 
			'theme_location' => 'main-nav-menu',
			'menu_id' => 'primary-menu' 
		) ); ?>
	</div>
</nav>
<header id="masthead" class="site-header">
	<div class="foreground"></div>
	<?php if( ! is_front_page() ) { ?>
		<h2><?php echo $wp_query->post->post_title; ?></h2>
	<?php } ?>
</header>