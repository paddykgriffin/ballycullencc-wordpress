<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/*-----------------------------------------------------------------------------------*/
/* Understrap
/*-----------------------------------------------------------------------------------*/


function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/css/theme.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'popper-script', get_stylesheet_directory_uri() . '/js/popper.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'bootstrap-script', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), $the_theme->get( 'Version' ), true );
	wp_enqueue_script( 'theme-script', get_stylesheet_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
	wp_enqueue_script( 'wow-script', get_stylesheet_directory_uri() . '/js/wow.min.js', array(), $the_theme->get( 'Version' ), true );
	

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/*-----------------------------------------------------------------------------------*/
/* Remove Guttenberg CSS
/*-----------------------------------------------------------------------------------*/


function wpassist_remove_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
} 
add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );



/*-----------------------------------------------------------------------------------*/
/* Generate page/post slug -> call the_slug();
/*-----------------------------------------------------------------------------------*/

function the_slug($echo=true){
    $slug = basename(get_permalink());
    do_action('before_slug', $slug);
    $slug = apply_filters('slug_filter', $slug);
    if( $echo ) echo $slug;
    do_action('after_slug', $slug);
    return $slug;
  }
  
  
/*-----------------------------------------------------------------------------------*/
/* Editor: prevent wp code injections (p tags etc.)
/*-----------------------------------------------------------------------------------*/

remove_filter( 'the_content', 'wpautop' );

/*-----------------------------------------------------------------------------------*/
/* SVG Custom Icon Shortcode -> [svgicon foo="foo-value"]
/*-----------------------------------------------------------------------------------*/

function svgicon_func( $atts ) {
	// define vars (suppress errors)
	$size = '';
	$style = '';
    $a = shortcode_atts( array(
        'icon' => 'plus', // plus/expand
        'type' => 'primary', // primary/secondary
        'size' => '', // x2/x4/x6/x8 (applied if present: defaults to $font-size-base)
        'class' => '', // custom classes (applied if present)
        'style' => '' // custom styles (applied if present)
    ), $atts );

    if (!empty($a['size'])) {
      $size = ' '.$a['size'];
    }
    if (!empty($a['class'])) {
      $class = ' '.$a['class'];
    }
    if (!empty($a['style'])) {
      $style = ' style="'.$a['style'].'"';
    }

    ob_start();
    get_template_part('svg/inline', $a['icon'].'.svg');
    $svg = ob_get_contents();
    ob_end_clean();

    $icon = '<div class="svgicon '.$a['type'] . $size . $class .'"'. $style .'>' . $svg . '</div>';

    return $icon;
}
add_shortcode( 'svgicon', 'svgicon_func' );


/*-----------------------------------------------------------------------------------*/
/* Remove Unwanted Admin Menu Items */
/*-----------------------------------------------------------------------------------*/

function remove_admin_menu_items() {
	$remove_menu_items = array(__('Comments'),__('Posts'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
		unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_admin_menu_items');


/*-----------------------------------------------------------------------------------*/
/* Remove Admin Bar
/*-----------------------------------------------------------------------------------*/

function remove_admin_bar()
{
    return false;
}
add_filter('show_admin_bar', 'remove_admin_bar');


/*-----------------------------------------------------------------------------------*/
/* Disable XML-RPC
/*-----------------------------------------------------------------------------------*/

add_filter('xmlrpc_enabled', '__return_false');


/*-----------------------------------------------------------------------------------*/
/* Print Short Theme URI
/*-----------------------------------------------------------------------------------*/

function themeURI() {
	$theme_uri = get_stylesheet_directory_uri();
	return print $theme_uri;
}


/*-----------------------------------------------------------------------------------*/
/* Register Dynamic Nav Menu (and Assign Location)
/*-----------------------------------------------------------------------------------*/

register_nav_menus( array(
    'primary' => 'Primary',
    'footer1' => 'Footer1',
    'footer2' => 'Footer2',
    'footer3' => 'Footer3',
	'footerPrivacy' => 'Footer Privacy',
	'sidebarRightMenu' => 'Sidebar Menu'
) );




/*-----------------------------------------------------------------------------------*/
/* Remove Defaults Image sizes
/*-----------------------------------------------------------------------------------*/


/* Add the following code in the theme's functions.php and disable any unset function as required */
function remove_default_image_sizes( $sizes ) {
  
	/* Default WordPress */
	unset( $sizes[ 'medium' ]);          // Remove Thumbnail (150 x 150 hard cropped)
	unset( $sizes[ 'medium_large' ]);    // Remove Medium Large (added in WP 4.4) resolution (768 x 0 infinite height)
	unset( $sizes[ 'large' ]);           // Remove Large resolution (1024 x 1024 max height 1024px)
	
	
	return $sizes;
  }
  add_filter( 'intermediate_image_sizes_advanced', 'remove_default_image_sizes' );


/*-----------------------------------------------------------------------------------*/
/* Add Custom Images
/*-----------------------------------------------------------------------------------*/


add_theme_support( 'post-thumbnails' );


// Tile/Square Images
add_image_size( 'tile-sm', 200, 200, true ); 
add_image_size( 'tile-md', 400, 400, true ); 
add_image_size( 'tile-lg', 800, 800, true ); 


//Content Images (recentangles)
add_image_size( 'landscape', 640, 400, true ); 
add_image_size( 'landscape-md', 960, 600, true ); 
add_image_size( 'landscape-lg', 1280, 800, true ); 


/*-----------------------------------------------------------------------------------*/
/* Hero Image Sizes
/*-----------------------------------------------------------------------------------*/

add_image_size( 'hero', 1280, 960, true ); 
//add_image_size( 'ipad-sm-hero', 768, 1024, true ); 
//add_image_size( 'ipad-lg-hero', 1024, 768, true ); 
//add_image_size( 'desktop-hero', 1280, 800, true ); 
add_image_size( 'desktop-lg-hero', 1440, 900, true ); 
add_image_size( 'desktop-xl-hero', 1680, 1050, true ); 
add_image_size( 'desktop-xxl-hero', 1920, 1080, true ); 
add_image_size( 'desktop-xxxl-hero', 2465, 1216, true ); 



/*-----------------------------------------------------------------------------------*/
/* Custom Inner Banner sizes
/*-----------------------------------------------------------------------------------*/

// Banners
add_image_size( 'banner-sm', 1024, 300, true );
//add_image_size( 'banner-ipadP', 768, 275, true ); 
add_image_size( 'banner-ipadL', 1024, 310, true ); 
add_image_size( 'banner-desktop', 1280, 275, true ); 
add_image_size( 'banner-lg', 1440, 320, true ); 
add_image_size( 'banner-xl', 1680, 375, true ); 
add_image_size( 'banner-xxl', 1920, 420, true ); 
add_image_size( 'banner-xxxl', 2465, 525, true);


function bcc_post_thumbnail( $post_id, $class = '' )
{   

  // Default Banner Size (used for fallback too)
  $bannerDefault = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'banner-xl' ); // 1680px

  // Various Banner Sizes
	$bannerSm = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'banner-sm' ); // 414px
	//$bannerIpadP = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'banner-ipadP' ); // 768px
	$bannerIpadL = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'banner-ipadL' ); // 1024px
	$bannerDesktop = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'banner-desktop' ); // 1280px
	$bannerDesktopLG = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'banner-lg' ); // 1440px
	$bannerDesktopXL = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'banner-xl' ); // 1680px
	$bannerDesktopXXL = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'banner-xxl' ); // 1920px
	$bannerDesktopXXXL = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'banner-xxxl' ); // 2465px

	//$image  = '<picture>';
	//$image .= '<source srcset="' . $bannerSm[0] .'" media="(min-width: 20em) and (max-width: 63.9375em)">';
	//$image .= '<source srcset="' . $bannerIpadP[0] .'" media="(min-width: 48em) and (max-width: 63.9375em)">';
	//$image .= '<source srcset="' . $bannerIpadL[0] .'" media="(min-width: 64em) and (max-width: 79.9375em)">';
	//$image .= '<source srcset="' . $bannerDesktop[0] .'" media="(min-width: 80em) and (max-width: 89.9375em)">';
	//$image .= '<source srcset="' . $bannerDesktopLG[0] .'" media="(min-width: 90em) and (max-width: 104.9375em)">';
	//$image .= '<source srcset="' . $bannerDesktopXL[0] .'" media="(min-width: 105em)">'; 
	//$image .= '<source srcset="' . $bannerDesktopXXL[0] .'" media="(min-width: 110em)">';
	//$image .= '<source srcset="' . $bannerDesktopXXXL[0] .'" media="(min-width: 150em)">';
	//$image .= '<img src="' . $bannerDefault[0] . '"';
	//$image .= ( $class ? ' class="' . esc_attr($class) . '"' : '' );
	//$image .= '></picture>';
	
	//$image = '<div class="hero-cover" style="background:" url'(. $bannerDefault[0] .)'" />';
	
	$image = '<div style="background-image: url(\'' . $bannerDefault[0] . '\');background-size:cover; height: 50vh;"></div>';

	//$image = '<div style="background: url( .$bannerDefault[0].); background-size: cover; height: 50vh;" />';

	return $image;
}



/*-----------------------------------------------------------------------------------*/
/* Register Sidebars
/*-----------------------------------------------------------------------------------*/


add_action( 'widgets_init', 'understrap_widgets_init' );

if ( ! function_exists( 'understrap_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function understrap_widgets_init() {
		register_sidebar(
            array(
                'name'          => __( 'Mailchimp Full', 'understrap' ),
                'id'            => 'mailchimp',
                'description'   => __( 'Full sized footer widget with dynamic grid', 'understrap' ),
                'before_widget' => '<div id="%1$s" class="footer-widget %2$s ">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4>',
                'after_title'   => '</h4>',
            )
		);
		

	}
} // endif function_exists( 'understrap_widgets_init' ).



/*-----------------------------------------------------------------------------------*/
/* Remove Parent Templates
/*-----------------------------------------------------------------------------------*/



add_filter( 'theme_page_templates', 'child_theme_remove_page_template' );
/**
* Remove page templates inherited from the parent theme.
*
* @param array $page_templates List of currently active page templates.
*
* @return array Modified list of page templates.
*/
function child_theme_remove_page_template( $page_templates ) {
// Remove the template we don’t need.
unset( $page_templates['page-templates/blank.php'] );
unset( $page_templates['page-templates/both-sidebarspage.php'] );
unset( $page_templates['page-templates/empty.php'] );
unset( $page_templates['page-templates/fullwidthpage.php'] );
unset( $page_templates['page-templates/left-sidebarpage.php'] );
unset( $page_templates['page-templates/right-sidebarpage.php'] );


return $page_templates;
}



/*-----------------------------------------------------------------------------------*/
/* Remove Edit Page Link Instances
/*-----------------------------------------------------------------------------------*/


function wpse_remove_edit_post_link( $link ) {
    return '';
}
add_filter('edit_post_link', 'wpse_remove_edit_post_link');




/*-----------------------------------------------------------------------------------*/
/* ACF - Options (need pro license)
/* ref: https://www.advancedcustomfields.com/resources/options-page/
/*-----------------------------------------------------------------------------------*/


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Homepage Settings',
		'menu_title'	=> 'Homepage',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Hero Settings',
		'menu_title'	=> 'Hero',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Our Team Settings',
		'menu_title'	=> 'Our Team',
		'parent_slug'	=> 'theme-general-settings',
    ));
    

}


/*-----------------------------------------------------------------------------------*/
/* Menu Name
/* ref: https://gist.github.com/BronsonQuick/2706609
/*-----------------------------------------------------------------------------------*/



/* This function returns the menu name */
function wp_nav_menu_title( $theme_location ) {
	$title = '';
	if ( $theme_location && ( $locations = get_nav_menu_locations() ) && isset( $locations[ $theme_location ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $theme_location ] );
		if( $menu && $menu->name ) {
			$title = $menu->name;
		}
	}
	return apply_filters( 'wp_nav_menu_title', $title, $theme_location );
}
/* Then in your theme you'll want to echo it out. e.g. <h3><?php echo wp_nav_menu_title('document'); ?></h3>
*  The menu location is set in your register_nav_menu in functions.php
*/


/*-----------------------------------------------------------------------------------*/
/* Custom Walker Menu
/*-----------------------------------------------------------------------------------*/


class Description_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth, $args)
    {
        $classes = empty($item->classes) ? array () : (array) $item->classes;
        $class_names = join(' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        !empty ( $class_names ) and $class_names = ' class="'. esc_attr( $class_names ) . '"';
        $output .= "<span id='menu-item-$item->ID' $class_names>";
        $attributes  = '';
        !empty( $item->attr_title ) and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        !empty( $item->target ) and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        !empty( $item->xfn ) and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        !empty( $item->url ) and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $item_output = $args->before
        . "<a $attributes>"
        . $args->link_before
        . $title
        . '</a></span>'
        . $args->link_after
        . $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}




/*-----------------------------------------------------------------------------------*/
/* Custom Logo
/*-----------------------------------------------------------------------------------*/



// Filter custom logo with correct classes.
add_filter( 'get_custom_logo', 'understrap_change_logo_class' );

if ( ! function_exists( 'understrap_change_logo_class' ) ) {
	/**
	 * Replaces logo CSS class.
	 *
	 * @param string $html Markup.
	 *
	 * @return mixed
	 */
	function understrap_change_logo_class( $html ) {

		$html = str_replace( 'class="custom-logo"', 'class="img-fluid"', $html );
		$html = str_replace( 'class="custom-logo-link"', 'class="col-8 col-sm-4 col-md-3 col-lg-3 col-xl-2 navbar-brand custom-logo-link"', $html );
		$html = str_replace( 'alt=""', 'title="Home" alt="logo"', $html );

		return $html;
	}
}




/*-----------------------------------------------------------------------------------*/
/* Custom Pagination
/*-----------------------------------------------------------------------------------*/


if ( ! function_exists( 'understrap_pagination' ) ) {

	function understrap_pagination( $args = array(), $class = 'pagination' ) {

		if ( $GLOBALS['wp_query']->max_num_pages <= 1 ) {
			return;
		}

		$args = wp_parse_args(
			$args,
			array(
				'mid_size'           => 2,
				'prev_next'          => true,
				'prev_text'          => __( 'Previous', 'understrap' ),
				'next_text'          => __( 'Next', 'understrap' ),
				'screen_reader_text' => __( 'Posts tnavigation', 'understrap' ),
				'type'               => 'array',
				'current'            => max( 1, get_query_var( 'paged' ) ),
			)
		);

		$links = paginate_links( $args );

		?>

		<nav aria-label="<?php echo $args['screen_reader_text']; ?>">

			<ul class="pagination justify-content-between">

				<?php
				foreach ( $links as $key => $link ) {
					?>
					<li class="page-item <?php echo strpos( $link, 'current' ) ? 'active' : ''; ?>">
						<?php echo str_replace( 'page-numbers', 'btn page-link', $link ); ?>
					</li>
					<?php
				}
				?>

			</ul>

		</nav>

		<?php
	}
}


/*-----------------------------------------------------------------------------------*/
/* Archive Pages
/*-----------------------------------------------------------------------------------*/

// Remove the text 'Archive' from Meta Title

add_filter( 'get_the_archive_title', function ($title) {
    return '';
});






 /*-----------------------------------------------------------------------------------*/
/* Disable the emoji's
/*-----------------------------------------------------------------------------------*/

function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
   }
   add_action( 'init', 'disable_emojis' );
   
   /**
	* Filter function used to remove the tinymce emoji plugin.
	* 
	* @param array $plugins 
	* @return array Difference betwen the two arrays
	*/
   function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
	return array();
	}
   }
   
   /**
	* Remove emoji CDN hostname from DNS prefetching hints.
	*
	* @param array $urls URLs to print for resource hints.
	* @param string $relation_type The relation type the URLs are printed for.
	* @return array Difference betwen the two arrays.
	*/
   function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
	/** This filter is documented in wp-includes/formatting.php */
	$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
   
   $urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
   
   return $urls;
   }




