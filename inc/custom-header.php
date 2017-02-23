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
 * @package Adler
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses adler_header_style()
 */
function adler_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'adler_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '45525a',
		'width'                  => 2000,
		'height'                 => 200,
		'flex-height'            => true,
		'wp-head-callback'       => 'adler_header_style',
		'admin-head-callback'    => 'adler_admin_header_style',
		'admin-preview-callback' => 'adler_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'adler_custom_header_setup' );

if ( ! function_exists( 'adler_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see adler_custom_header_setup().
 */
function adler_header_style() {
	$header_text_color = get_header_textcolor();

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
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;

if ( ! function_exists( 'adler_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see adler_custom_header_setup().
 */
function adler_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		.displaying-header-wrapper {
			background-color: #fff;
			padding: 32px;
		}

		#headimg h1 {
			font-family: Lato, sans-serif;;
		}

		#desc {
			font-family: "Libre Baskerville", georgia, serif;
		}

		#headimg h1 {
			font-size: 26px;
			font-weight: 900;
			line-height: 32px;
			margin: 0;
		}

		#headimg h1 a {
			color: #232323;
			text-decoration: none;
		}

		#desc {
			color: #232323;
			display: none;
			font-size: 13px;
			font-weight: 400;
			line-height: 20px;
			margin: 4px 0 0 0;
			opacity: 0.7;
		}

		#headimg img {
			vertical-align: middle;
		}

		.displaying-header-image img {
			width: 100%;
			height: auto;
		}
	</style>
<?php
}
endif;

if ( ! function_exists( 'adler_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see adler_custom_header_setup().
 */
function adler_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<div class="displaying-header-image">
			<img src="<?php header_image(); ?>" alt="">
		</div>
		<?php endif; ?>
		<div class="displaying-header-wrapper">
			<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		</div>
	</div>
<?php
}
endif;
