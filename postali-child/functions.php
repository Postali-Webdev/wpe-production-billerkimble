<?php
/**
 * Theme functions.
 *
 * @package Postali Child
 * @author Postali LLC
 */
	require_once dirname( __FILE__ ) . '/includes/admin.php';
	require_once dirname( __FILE__ ) . '/includes/utility.php';
	require_once dirname( __FILE__ ) . '/includes/case-results-cpt.php'; // Custom Post Type Case Results
	require_once dirname( __FILE__ ) . '/includes/testimonials-cpt.php'; // Custom Post Type Testimonials
	require_once dirname( __FILE__ ) . '/includes/attorneys-cpt.php'; // Custom Post Type Attorneys
	require_once dirname( __FILE__ ) . '/includes/active-cases-cpt.php'; // Active Cases (different from Case Results)


	add_action('wp_enqueue_scripts', 'postali_parent');
	function postali_parent() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/css/styles.css' ); // Enqueue parent theme styles
	
	}  

	add_action('wp_enqueue_scripts', 'postali_child');
	function postali_child() {

		wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style.css' ); // Enqueue Child theme style sheet (theme info)
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css'); // Enqueue child theme styles.css

		wp_register_style( 'icomoon-font', 'https://cdn.icomoon.io/152819/BillerandKimble/style-cf.css?lb1u8c" rel="stylesheet', array() );
		wp_enqueue_style('icomoon-font');


		// Compiled .js using Grunt.js
		wp_register_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), null, true); 
		wp_enqueue_script('custom-scripts');
		
		//Add lity library
		wp_register_script('lity-scripts', get_stylesheet_directory_uri() . '/assets/js/lity.js',array('jquery'), null, true); 
		wp_enqueue_script('lity-scripts');
		

		if ( is_page_template( 'front-page.php' ) ) {

		// enque jquery UI
		wp_register_script('jquery-ui', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('jquery'));
		wp_enqueue_script('jquery-ui');

		// Home Page Javascript
		wp_register_script('home-js', get_stylesheet_directory_uri() . '/assets/js/home.min.js', array('jquery'));
		wp_enqueue_script('home-js');		
		}

		wp_register_script('slick-min', get_stylesheet_directory_uri() . '/assets/js/slick.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-min');
		wp_register_script('slick-custom-min', get_stylesheet_directory_uri() . '/assets/js/slick-custom.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-custom-min');	
		wp_register_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css', array() ); // Enqueue child theme styles.css	
		wp_enqueue_style( 'slick-css' );

		if ( is_page_template( 'page-active-cases.php' ) ) {
			// enque jquery UI
			wp_register_script('jquery-ui', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('jquery'));
			wp_enqueue_script('jquery-ui');

			// Home Page Javascript
			wp_register_script('active-cases-js', get_stylesheet_directory_uri() . '/assets/js/active-cases.min.js', array('jquery'));
			wp_enqueue_script('active-cases-js');		
		}

		// These scripts should be conditionally enqueued only on page templates where they are needed

		// Smooth Scroll
		// wp_register_script('smooth-scroll', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll.min.js', array('jquery'));
		// wp_enqueue_script('smooth-scroll');
		// wp_register_script('smooth-scroll-settings', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll-settings.min.js', array('jquery'));
		// wp_enqueue_script('smooth-scroll-settings');

		// Featherlight JS Call 
		// wp_register_script('featherlight-js', get_stylesheet_directory_uri() . '/assets/js/featherlight.min.js', array('jquery'));
		// wp_enqueue_script('featherlight-js');

	}

    // defer recaptcha 
    add_filter( 'clean_url', function( $url )
    {
        if ( FALSE === strpos( $url, 'https://www.gstatic.com/recaptcha/releases/4rwLQsl5N_ccppoTAwwwMrEN/recaptcha__en.js' ) )
        { // not our file
            return $url;
        }
        // Must be a ', not "!
        return "$url' defer='defer";
    }, 11, 1 );

	// Register Site Navigations
	function postali_child_register_nav_menus() {
		register_nav_menus(
			array(
				'header-nav' => __( 'Header Navigation', 'postali' ),
				'footer-pages' => __( 'Footer Pages', 'postali' ),
				'footer-practice-areas' => __( 'Footer Practice Areas', 'postali' ),
				'footer-locations' => __( 'Footer Locations', 'postali' ),
			)
		);
	}
	add_action( 'init', 'postali_child_register_nav_menus' );

	// Add Custom Logo Support
	add_theme_support( 'custom-logo' );

	function postali_custom_logo_setup() {
		$defaults = array(
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}
	add_action( 'after_setup_theme', 'postali_custom_logo_setup' );

	// ACF Options Pages
	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title'    => 'Instructions',
			'menu_title'    => 'Instructions',
			'menu_slug'     => 'theme-instructions',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-smiley', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Customizations',
			'menu_title'    => 'Customizations',
			'menu_slug'     => 'customizations',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-admin-customizer', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Awards',
			'menu_title'    => 'Awards',
			'menu_slug'     => 'awards',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-awards', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Global Schema',
			'menu_title'    => 'Global Schema',
			'menu_slug'     => 'global_schema',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-media-code',
			'redirect'      => false
		));
	}

	// Save newly created fields to child theme
	add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
	function my_acf_json_save_point( $path ) {
		
		// update path
		$path = get_stylesheet_directory() . '/acf-json';
		
		// return
		return $path;
	
	}
	
	// Add ability to add SVG to Wordpress Media Library
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	
	//add SVG to allowed file uploads
	function add_file_types_to_uploads($file_types){

		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$file_types = array_merge($file_types, $new_filetypes );

		return $file_types;
	}
	add_action('upload_mimes', 'add_file_types_to_uploads');


	// Widget Logic Conditionals
	function is_child($parent) {
		global $post;
			return $post->post_parent == $parent;
		}
		
		// Widget Logic Conditionals (ancestor) 
		function is_tree( $pid ) {
		global $post;
		
		if ( is_page($pid) )
		return true;
		
		$anc = get_post_ancestors( $post->ID );
		foreach ( $anc as $ancestor ) {
			if( is_page() && $ancestor == $pid ) {
				return true;
				}
		}
		return false;
	}

	// Display Current Year as shortcode - [year]
	function year_shortcode () {
		$year = date_i18n ('Y');
		return $year;
		}
	add_shortcode ('year', 'year_shortcode');
	
	// WP Backend Menu area taller
	add_action('admin_head', 'taller_menus');

	function taller_menus() {
	echo '<style>
		.posttypediv div.tabs-panel {
			max-height:500px !important;
		}
	</style>';
	}

	// Customize the logo on the wp-login.php page
	function my_login_logo() { ?>
		<style type="text/css">
			#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png);
			height:45px;
			width:204px;
			background-size: 204px 45px;
			background-repeat: no-repeat;
			padding-bottom: 30px;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
	// Contact Form 7 Submission Page Redirect
	add_action( 'wp_footer', 'mycustom_wp_footer' );
	
	function mycustom_wp_footer() {
	?>
	<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		location = '/form-success/';
	}, false );
	</script>
	<?php
	}

	// Add Author Taxonomy to Blog Posts
	function create_author_taxonomy() {
		$labels = array(
			'name' => _x( 'Authors', 'taxonomy general name' ),
			'singular_name' => _x( 'Author', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Authors' ),
			'all_items' => __( 'All Authors' ),
			'edit_item' => __( 'Edit Author' ), 
			'update_item' => __( 'Update Author' ),
			'add_new_item' => __( 'Add New Author' ),
			'new_item_name' => __( 'New Author Name' ),
			'menu_name' => __( 'Authors' ),
		);    
		
		// Now register the taxonomy
		register_taxonomy('authors', 'post', array(
			'hierarchical' => false,
			'labels' => $labels,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'author' ),
		));
	}
	add_action( 'init', 'create_author_taxonomy', 0 );

    function retrieve_latest_gform_submissions() {
    $site_url = get_site_url();
    $search_criteria = [
        'status' => 'active'
    ];
    $form_ids = 2; //search all forms
    $sorting = [
        'key' => 'date_created',
        'direction' => 'DESC'
    ];
    $paging = [
        'offset' => 0,
        'page_size' => 5
    ];
    
    $submissions = GFAPI::get_entries($form_ids, null, $sorting, $paging);
    $start_date = date('Y-m-d H:i:s', strtotime('-5 day'));
    $end_date = date('Y-m-d H:i:s');
    $entry_in_last_5_days = false;
    
    foreach ($submissions as $submission) {
        if( $submission['date_created'] > $start_date  && $submission['date_created'] <= $end_date ) {
            $entry_in_last_5_days = true;
        } 
    }
    if( !$entry_in_last_5_days ) {
        wp_mail('webdev@postali.com', 'Submission Status', "No submissions in last 5 days on $site_url");
    }
}
add_action('check_form_entries', 'retrieve_latest_gform_submissions');
?>