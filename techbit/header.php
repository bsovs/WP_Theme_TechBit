<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TechBit
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Required meta tags -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	<!--JQUERY-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	<!--ScrollSnap
	<script src="https://bundle.run/css-scroll-snap-polyfill@0.1.2"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.5.2/randomColor.js"></script>
	-->
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<!--Skip Down-->
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'techbit' ); ?></a>

	<!--NAVBAR-->
	<!--Scroll Progress-->
	<div class="progress-container">
		<div class="progress-bar" id="myBar"></div>
	</div>
	<label id="navbar">
		  <input type="checkbox">
		  <span id="menu-toggle" class="ham-menu">
			<span class="hamburger"></span>
		  </span>
		  
		  <div class="nav_links">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		  </div>
			
			<?php
			if ( !is_front_page() && !is_home() ) :
				?>
			<p class="site-title site-title-top"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
	</label>

	<!--Heading Block-->
	<header id="masthead" class="site-header">
		<div class="site-branding">
		<div id="wrapper" class="site-branding-text skewed">
		
			<div class="layer bottom">
			  <div class="content-wrap">
				<div class="content-body">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$techbit_description = get_bloginfo( 'description', 'display' );
			if ( $techbit_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $techbit_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
				
				<i class="splitButtonRight fas fa-angle-right"></i> <!--Button Right-->
				<span class="downButton fas fa-angle-down"></span> <!--Button Down-->
				
				</div>
			  </div>
			</div>
			
			<div class="layer top">
			  <div class="content-wrap">
				<div class="content-body">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$techbit_description = get_bloginfo( 'description', 'display' );
			if ( $techbit_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $techbit_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
				
				<i class="splitButtonLeft fas fa-angle-left"></i> <!--Button Left-->
				<span class="downButton fas fa-angle-down"></span> <!--Button Down-->
				
				</div>
			  </div>
			</div>
			
			<div class="handle"></div><!--split handler-->
		</div>
		</div>
		</div><!-- .site-branding -->
		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
