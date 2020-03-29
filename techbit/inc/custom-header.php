<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package TechBit
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses techbit_header_style()
 */
function techbit_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'techbit_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'background_color'		 => 'ffffff',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'techbit_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'techbit_custom_header_setup' );

if ( ! function_exists( 'techbit_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see techbit_custom_header_setup().
	 */
	function techbit_header_style() {
		$header_text_color = get_header_textcolor();
		$background_color = get_background_color();
		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		
		body{
			background:#<?php echo esc_attr( $background_color ); ?>;
		}
		
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-title a:visited,
			.site-description
			{
				color: #<?php echo esc_attr( $header_text_color ); ?>;
				text-decoration: none;
			}
			
			.site-title-top
			{
				position:fixed;
				top:0px;
				width:100vw;
				text-align:center;
				font-size:45px;
				padding-top:5px;
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
			
			.site-title-top a,
			.site-title-top a:visited
			{
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
			
			.site-title a:hover
			{
				color: <?php echo shadeColor("#".(esc_attr($header_text_color)),60); ?>;
			}
			
		<?php endif; ?>
		
		
		.site-branding
		{
			position:relative;
			display:inline-block;
			height:100%;
			width:100%;
			
			<?php
			// Is Header Image Set?
			if ( has_header_image() ) :
				?>	
				background-image: url(<?php echo get_header_image(); ?>);
				background-position: center; /* Center the image */
				background-repeat: no-repeat; /* Do not repeat the image */
				background-size: cover; /* Resize the background image to cover the entire container */
				
				background-color: #424242; /* Tint color */
				background-blend-mode: multiply;
			<?php
			endif;?>
		}
		
		/* RIGHT IMAGE */
		<?php
			// Is Image Set?
			if ( get_theme_mod('right_image') != null ) :
				?>			
		.bottom .content-wrap{
			
				height:100%;
				
				background-image: url(<?php echo get_theme_mod('right_image'); ?>);
				background-position: center; /* Center the image */
				background-repeat: no-repeat; /* Do not repeat the image */
				background-size: cover; /* Resize the background image to cover the entire container */
				
				<?php
				// Is Color Set?
				if ( get_theme_mod('right_tint_color') != null ) :
					?>	
					background-color: <?php echo get_theme_mod('right_tint_color'); ?>; /* Tint color */
				<?php else: //print default color
				?>
					background-color: none; /* Tint color */
				<?php
				endif;?>
				background-blend-mode: multiply;
				
		}
		<?php else: //print default color
			?>
		.bottom,
		.bottom a,
		.bottom a:visited,
		.bottom p{
			background:#<?php echo esc_attr( $background_color ); ?>;
		}
		<?php
			endif;?>
		.bottom,
		.bottom a,
		.bottom a:visited,
		.bottom p{
			<?php
			// Is Color Set?
			if ( get_theme_mod('right_color') != null ) :
				?>	
				color:<?php echo get_theme_mod('right_color'); ?>;
			<?php else: //print default color
			?>
				color:#<?php echo esc_attr( $header_text_color ); ?>;
			<?php
			endif;?>
		}


		/* LEFT IMAGE */
		<?php
			// Is Image Set?
			if ( get_theme_mod('left_image') != null ) :
				?>			
		.top .content-wrap{
			
				height:100%;
				
				background-image: url(<?php echo get_theme_mod('left_image'); ?>);
				background-position: center; /* Center the image */
				background-repeat: no-repeat; /* Do not repeat the image */
				background-size: cover; /* Resize the background image to cover the entire container */
				
				<?php
				// Is Color Set?
				if ( get_theme_mod('left_tint_color') != null ) :
					?>	
					background-color: <?php echo get_theme_mod('left_tint_color'); ?>; /* Tint color */
				<?php else: //print default color
				?>
					background-color: none; /* Tint color */
				<?php
				endif;?>
				background-blend-mode: multiply;
				
		}
		<?php else: //print default color
			?>
		.top,
		.top a,
		.top a:visited,
		.top p{
			background:#<?php echo esc_attr( $header_text_color ); ?>;
		}
		<?php
			endif;?>
		.top,
		.top a,
		.top a:visited,
		.top p{
			<?php
			// Is Color Set?
			if ( get_theme_mod('left_color') != null ) :
				?>	
				color:<?php echo get_theme_mod('left_color'); ?>;
			<?php else: //print default color
			?>
				color:#<?php echo esc_attr( $header_text_color ); ?>;
			<?php
			endif;?>
		}
		
		
		<?php
		// Is Background Image Set?
		if ( get_background_image() != null ) :
			?>	
			.snap{
				background:transparent !important;
			}
			<?php
		endif;?>
		
		</style>
		<?php
	}
endif;


#shader function
function shadeColor($color, $percent) {

    $R = hexdec(substr ($color, 1,2));
    $G = hexdec(substr ($color, 3,2));
    $B = hexdec(substr ($color, 5,2));

    $R = (int)($R * (100 + $percent) / 100);
    $G = (int)($G * (100 + $percent) / 100);
    $B = (int)($B * (100 + $percent) / 100);

    $R = ($R<255)?$R:255;  
    $G = ($G<255)?$G:255;  
    $B = ($B<255)?$B:255;  

    $RR = ((strlen(dechex($R))==1)?"0".dechex($R):dechex($R));
    $GG = ((strlen(dechex($G))==1)?"0".dechex($G):dechex($G));
    $BB = ((strlen(dechex($B))==1)?"0".dechex($B):dechex($B));

    return "#".$RR.$GG.$BB;
}
