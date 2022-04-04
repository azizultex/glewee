<?php
show_admin_bar(false);
require_once('wp_bootstrap_navwalker.php');

if ( ! function_exists( 'glewee_setup' ) ) {

	function glewee_setup() {
		/** Make theme available for translation. */
		load_theme_textdomain( 'glewee', get_template_directory() . '/languages' );

		/** Enable support for Post Thumbnails on posts and pages. */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'post_thumb', 330, 330, true );
		add_image_size( 'post_large', 690, 690, true );

		/*** Editor Style */
		add_editor_style(get_template_directory_uri() . '/css/content-editor.css');
		add_editor_style(get_template_directory_uri() . '/css/icon-fonts.css');

		/** This theme uses wp_nav_menu() in one location. */
		register_nav_menus( array(
		  	'menu-1' => esc_html__( 'Primary menu', 'glewee' ),
		  	'menu-2' => esc_html__( 'Secondary menu', 'glewee' ),
		  	'menu-3' => esc_html__( 'Footer menu 1', 'glewee' ),
		  	'menu-4' => esc_html__( 'Footer menu 2', 'glewee' ),
		  	'menu-5' => esc_html__( 'Privacy menu', 'glewee' ),
		) );

	}
}
add_action( 'after_setup_theme', 'glewee_setup' );

/*** Enqueue scripts and styles. */
function glewee_scripts() {

	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );

	/*** Enqueue styles. */
	wp_enqueue_style('adobe-typekit', 'https://use.typekit.net/fxi3piu.css', array(), false, 'all');
	wp_enqueue_style('plugins', get_template_directory_uri() . '/css/plugins.css', array(), date("ymd-Gis", filemtime( get_template_directory() . '/css/plugins.css' )), 'all');
	wp_enqueue_style( 'glewee-style', get_stylesheet_uri(), array(), date("ymd-Gis", filemtime( get_stylesheet_directory())));

	/*** Enqueue scripts. */
	wp_enqueue_script('jquery');
	wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/plugins.js' )), true);
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/scripts.js' )), true);
}
add_action( 'wp_enqueue_scripts', 'glewee_scripts' );

/*** Register and enqueue a custom stylesheet in the WordPress admin. */
function admin_scripts() {
	wp_enqueue_style('icon-fonts', get_template_directory_uri() . '/css/icon-fonts.css', array(), false, 'all');

	wp_enqueue_script('admin-js', get_template_directory_uri() . '/js/admin.js');
}
add_action( 'admin_enqueue_scripts', 'admin_scripts' );

/** Options Page Header Background */
function glewee_admin_dashboard_css() {
	echo '<style type="text/css">
		#acf-group_5a2badeb476ba .hndle { flex-grow: initial; }
		#acf-group_5a2badeb476ba .hndle img { max-width: 300px; margin-right: 15px; }
		#acf-group_5a2badeb476ba .hndle span { display: inline-flex; align-items: center; }
	</style>';
}
add_action('admin_head', 'glewee_admin_dashboard_css');

/*** ACF OPTIONS PAGE */
if(function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

/*** ACF Color Palette */
add_action( 'acf/input/admin_footer', function() {
	?><script type="text/javascript">
	(function($) {
	     acf.add_filter('color_picker_args', function( args, $field ){
	          // add the hexadecimal codes here for the colors you want to appear as swatches
	          args.palettes = ['#000000', '#FFFFFF', '#EF4136', '#08215D', '#1C45A8', '#2097EF', '#CFD7DD']
	          // return colors
	          return args;
	     });
	})(jQuery);
	</script><?php
});

/*** Reorder dashboard menu */
function reorder_admin_menu( $__return_true ) {
	return array(
		'index.php',                 // Dashboard
		'separator1',                // --Space--
		'acf-options',               // ACF Theme Settings
		'edit.php',   				// Pages 
		'edit.php?post_type=page',   // Pages 
		'edit.php?post_type=team',   // Pages 
		'edit.php?post_type=vizapp',   // Pages 
		'edit.php?post_type=demo',   // Pages 
		'gf_edit_forms',             // Gravity Forms
		'upload.php',                // Media
		'wpseo_dashboard',           // Yoasta
		'gadash_settings',           // Google Analytics
		'themes.php',                // Appearance
		'edit-comments.php',         // Comments 
		'users.php',                 // Users
		'tools.php',                 // Tools
		'options-general.php',       // Settings
		'plugins.php',               // Plugins
	);
}
add_filter( 'custom_menu_order', 'reorder_admin_menu' );
add_filter( 'menu_order', 'reorder_admin_menu' );

/*** Remove dashboard menu */
function remove_admin_menus() {
	//remove_menu_page( 'edit.php' );              // Comments
	remove_menu_page( 'edit-comments.php' );              // Comments
	//remove_menu_page( 'tools.php' );                      // Tools
	//remove_menu_page( 'plugins.php' );                    // Plugings
	remove_menu_page( 'sharethis-general' );          // share this
	//remove_menu_page( 'edit.php?post_type=acf-field-group' ); // Custom Field 
	//remove_menu_page( 'pods' );                         // Pods Custom post type
}
add_action( 'admin_menu', 'remove_admin_menus', 999);

/*** GC Color Theme */
function additional_admin_color_schemes() {
	//Get the theme directory
	$theme_dir = get_template_directory_uri();

	//GoingClear
	wp_admin_css_color(
		'goingclear', __('GoingClear'),
		admin_url("css/colors/goingclear/colors.css"),
		array('#8ec652', '#008cc6', '#e5e5e5', '#999'),
		array( 'base' => '#e5f8ff', 'focus' => '#fff', 'current' => '#fff' )
	);
}
add_action('admin_init', 'additional_admin_color_schemes');

/*** Reset GC Color Theme as Default for New Users */
function set_default_admin_color($user_id) {
	$args = array(
		'ID' => $user_id,
		'admin_color' => 'goingclear'
	);
	wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');

/*** Remove Login Wiggle */
function remove_login_shake() {
	// remove the wp_shake JavaScript
	remove_action( 'login_head', 'wp_shake_js', 12 );
}
add_action( 'login_head', 'remove_login_shake' );

function custom_header() { 
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '../../../../wp-admin/admin/login.css" />'; 
	echo '<script type="text/javascript" src="' . get_bloginfo('template_directory') . '../../../../wp-admin/admin/jquery-3.2.1.min.js"></script>';
	echo '<script type="text/javascript" src="' . get_bloginfo('template_directory') . '../../../../wp-admin/admin/login.js"></script>';
   
}
add_action('login_head', 'custom_header');

/*** Gravity form user role */
function gforms_editor_access() {
	$role = get_role( 'editor' );
	$role->add_cap( 'gform_full_access' );
}
add_action( 'after_switch_theme', 'gforms_editor_access' );

/*** Gravity form anchor */
add_filter( 'gform_confirmation_anchor', '__return_false' );

function form_submit_button($button, $form) {
	return "<button class='btn btn-blue sm text-uppercase' id='gform_submit_button_{$form["id"]}'>{$form['button']['text']}</button>";
}
add_filter("gform_submit_button", "form_submit_button", 10, 2);

function form_submit_button_demo($button, $form) {
	return "<button class='btn btn-primary sm text-uppercase' id='gform_submit_button_{$form["id"]}'>{$form['button']['text']}</button>";
}
add_filter("gform_submit_button_2", "form_submit_button_demo", 10, 2);

/*** Get all page id */ 
function getPageID() {
	global $post;
	$postid = $post->ID;
	if(is_home() && get_option('page_for_posts')) {
		$postid = get_option('page_for_posts');
	}else {
		$postid = get_post_type('service');
	}
	return $postid;
}

/*** Limit blog text */
function Limit_Text($text, $limit=30) {
	$array = explode( "\n", wordwrap( $text, $limit));
	return $array['0'];
}

/*** get permalink by template name */
function get_template_link($temp){
	$link = null;
	$pages = get_pages(
		array(
			'meta_key' => '_wp_page_template',
			'meta_value' => $temp
		)
	);
	if(isset($pages[0])){
		$link = get_page_link($pages[0]->ID);
	}
	return $link;
}

/*** get permalink by template name */
function get_template_id($temp){
    $link = null;
    $pages = get_posts(
        array(
        	'post_type' => 'page',
        	'nopaging' => true,
            'meta_key' => '_wp_page_template',
            'meta_value' => $temp
        )
    );

    if(isset($pages[0])){
        $id = $pages[0]->ID;
    }
    return $id;
}

/*** Clean */
function clean($string) {
	$string = str_replace(' ', '-', implode(' ', array_slice(explode( "\n", wordwrap( $string, 3)), 0, 3)));
	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
	return preg_replace('/-+/', '-', strtolower($string));
}

/*** ACF Button Function */
if ( class_exists( 'acf' ) ) 
{ 
	function acfButton( $field, $style = null, $attribute = null ) 
	{
		if ( $field['button']['text']) 
		{
			if ( $field['button']['type'] == 'internal' ) 
			{
				printf( '<a href="%s" class="btn %s" %s>%s</a>', esc_url( $field['button']['internal_url'] ), $style, $attribute, $field['button']['text'] );
			}
			elseif ( $field['button']['type'] == 'external' )
			{
				$target = $field['button']['target'] ? '_self' : '_blank';

				printf( '<a href="%s" class="btn %s" target="%s" %s>%s</a>', esc_url($field['button']['external_url']), $style, $target, $attribute, $field['button']['text'] );
			}
			elseif ( $field['button']['type'] == 'file' )
			{
				$target = $field['button']['target'] ? '_self' : '_blank';

				printf( '<a href="%s" class="btn %s" target="%s" %s>%s</a>', esc_url( $field['button']['file']['url'] ), $style, $target, $attribute, $field['button']['text'] );
			}
			elseif ( $field['button']['type'] == 'popup' )
			{
				printf( '<a href="%s" class="btn demo-popup-btn %s" target="_self" %s>%s</a>', $field['button']['popup'], $style, $attribute, $field['button']['text'] );
			}
		}
	}
}

/*** Customized header title */
function customizedtitle( $title )
{
	if ( is_category() || is_author() )
	{
		return get_the_archive_title();
	} 
	else if ( is_search() )
	{
		return sprintf( esc_html__( 'Search Results for: %s', 'glewee' ), '<strong>' . get_search_query() . '</strong>' ); 
	}
	return $title;
}

/*** Return an alternate title, without prefix, for every type used in the get_the_archive_title(). */
add_filter('get_the_archive_title', function ($title)
{
    if ( is_category() || is_tag() || is_tax( 'productivity_category' ) || is_tax( 'productivity_tag' ) ) 
    {
        $title = single_tag_title( '', false );
    }
    elseif ( is_author() ) 
    {
        $title = get_the_author();
    }

    return $title;
});

/*** Featured Image Title Change */
function blogFeaturedImageTitle() 
{
	// Blog
	remove_meta_box( 'postimagediv', 'post', 'side' );
	add_meta_box( 'postimagediv', __( 'Featured Image 1920px by 1080px', 'glewee' ), 'post_thumbnail_meta_box', 'post', 'side' );
}
add_action('do_meta_boxes', 'blogFeaturedImageTitle' );


/*** add SVG to allowed file uploads */
function glewee_custom_mime_types( $mimes ) {
	// New allowed mime types.
	$mimes['svg'] = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	$mimes['doc'] = 'application/msword';
	 
	// Optional. Remove a mime type.
	unset( $mimes['exe'] );
	 
	return $mimes;
}
add_filter( 'upload_mimes', 'glewee_custom_mime_types' );

/*** Gravity form field */
class acf_field_gravity_forms extends acf_field 
{
	/*
	*  __construct
	*  This function will setup the field type data
	*/
	function __construct() {
		// vars
		$this->name = 'gravity_forms_field';
		$this->label = __('Gravity Forms');
		$this->category = __("Relational",'glewee'); // Basic, Content, Choice, etc
		$this->defaults = array(
		'allow_multiple' => 0,
		'allow_null' => 0
		);
		// do not delete!
		parent::__construct();
	}
  
	/*
	*  render_field_settings()
	*  Create extra settings for your field. These are visible when editing a field
	*/
	function render_field_settings( $field ) {
		
		/*
		*  acf_render_field_setting
		*/
		acf_render_field_setting( $field, 
			array(
				'label' => 'Allow Null?',
				'type'  =>  'radio',
				'name'  =>  'allow_null',
				'choices' =>  array(
				1 =>  __("Yes",'glewee'),
				0 =>  __("No",'glewee'),
				),
				'layout'  =>  'horizontal'
			)
		);

		acf_render_field_setting( $field, 
			array(
				'label' => 'Allow Multiple?',
				'type'  =>  'radio',
				'name'  =>  'allow_multiple',
				'choices' =>  array(
					1 =>  __("Yes",'glewee'),
					0 =>  __("No",'glewee'),
				),
				'layout'  =>  'horizontal'
			)
		);
	}
  
	/*
	*  render_field()
	*  Create the HTML interface for your field
	*  @param $field (array) the $field being rendered
	*/
	  
	function render_field( $field ) {

		/*
		*  Review the data of $field.
		*  This will show what data is available
		*/
		$field = array_merge($this->defaults, $field);
		$choices = array();

		//Show notice if Gravity Forms is not activated
		if (class_exists('RGFormsModel')) 
		{
			$forms = RGFormsModel::get_forms(1);
		}   
		else 
		{
			echo "<font style='color:red;font-weight:bold;'>Warning: Gravity Forms is not installed or activated. This field does not function without Gravity Forms!</font>";
		}
		
		//Prevent undefined variable notice
		if(isset($forms)){
		  foreach( $forms as $form ){
			$choices[ intval($form->id) ] = ucfirst($form->title);
		  }
		}
		// override field settings and render
		$field['choices'] = $choices;
		$field['type']    = 'select';
			if ( $field['allow_multiple'] ) {
				$multiple = 'multiple="multiple" data-multiple="1"';
				echo "<input type=\"hidden\" name=\"{$field['name']}\">";
			}
			else $multiple = '';
		?>
		<select id="<?php echo str_replace(array('[',']'), array('-',''), $field['name']);?>" name="<?php echo $field['name']; if( $field['allow_multiple'] ) echo "[]"; ?>"<?php echo $multiple; ?>>
			<?php
			if ( $field['allow_null'] ) 
				echo '<option value="">- Select -</option>';
				
			foreach ($field['choices'] as $key => $value){
				$selected = '';
				if ( (is_array($field['value']) && in_array($key, $field['value'])) || $field['value'] == $key )
					$selected = ' selected="selected"';
			?>
				<option value="<?php echo $key; ?>"<?php echo $selected;?>><?php echo $value; ?></option>
			<?php } ?>
		</select>
		<?php
	}

	/*
	*  format_value()
	*  This filter is applied to the $value after it is loaded from the db and before it is returned to the template
	*/
	function format_value( $value, $post_id, $field ) {
			
		//Return false if value is false, null or empty
		if( !$value || empty($value) ){
			return false;
		}
			
		//If there are multiple forms, construct and return an array of form objects
		if( is_array($value) && !empty($value) ) 
		{
			$form_objects = array();
			foreach($value as $k => $v)
			{
				$form = GFAPI::get_form( $v );
				//Add it if it's not an error object
				if( !is_wp_error($form) )
				{
					$form_objects[$k] = $form;
				}
			}

			//Return false if the array is empty
			if( !empty($form_objects) )
			{
				return $form_objects;   
			}
			else
			{
				return false;
			}
		}
		else
		{
			$form = GFAPI::get_form(intval($value));
			//Return the form object if it's not an error object. Otherwise return false. 
			if( !is_wp_error($form) )
			{
				return $form;   
			}
			else
			{
				return false;
			}
		}
	}
}

// create field
new acf_field_gravity_forms();

/*** Gravity form field */
class acf_field_post_type extends acf_field {
	/*
	*  __construct
	*  This function will setup the field type data
	*/
	function __construct() {
		// vars
		$this->name = 'post_type_field';
		$this->label = __('Post Type');
		$this->category = __("Relational", 'glewee'); // Basic, Content, Choice, etc
		$this->defaults = array(
		'allow_null' => 0
		);
		// do not delete!
		parent::__construct();
	}
  
	/*
	*  render_field_settings()
	*  Create extra settings for your field. These are visible when editing a field
	*/
	function render_field_settings( $field ) {
		
		/*
		*  acf_render_field_setting
		*/
		acf_render_field_setting( $field, 
			array(
				'label' => 'Allow Null?',
				'type'  =>  'radio',
				'name'  =>  'allow_null',
				'choices' =>  array(
				1 =>  __("Yes",'glewee'),
				0 =>  __("No",'glewee'),
				),
				'layout'  =>  'horizontal'
			)
		);
	}
  
	/*
	*  render_field()
	*  Create the HTML interface for your field
	*  @param $field (array) the $field being rendered
	*/
	  
	function render_field( $field ) {

		/*
		*  Review the data of $field.
		*  This will show what data is available
		*/
		$field = array_merge($this->defaults, $field);

		//Show notice if Gravity Forms is not activated
		$args=array(
			'public'                => true,
			// 'exclude_from_search'   => true,
			'_builtin'              => false
		); 

		$output = 'objects'; // names or objects, note names is the default
		$operator = 'and'; // 'and' or 'or'
		$post_types = get_post_types($args,$output,$operator);

		$posttypes_array = wp_list_pluck( $post_types, 'label', 'name');

		// override field settings and render
		$field['choices'] = $posttypes_array;
		?>
		<select id="<?php echo str_replace(array('[',']'), array('-',''), $field['name']);?>" name="<?php echo $field['name']; ?>">
			<?php
			if ( $field['allow_null'] ) 
				echo '<option value="">- Select Post Type -</option>';
				
			foreach ($field['choices'] as $key => $value){
				$selected = '';
				if ( (is_array($field['value']) && in_array($key, $field['value'])) || $field['value'] == $key )
					$selected = ' selected="selected"';
			?>
				<option value="<?php echo $key; ?>"<?php echo $selected;?>><?php echo $value; ?></option>
			<?php } ?>
		</select>
		<?php
	}
}

// create field
new acf_field_post_type();

/*** acf_field_menu Class */
class acf_field_menu extends acf_field {

	/**
	 * Sets up some default values and delegats work to the parent constructor.
	 * This function shows nav menu field into the acf field type.
	 */
	function __construct() {
		$this->name     = 'nav_menu';
		$this->label    = esc_html__( 'Select Menu', 'glewee' );
		$this->category = 'choice';
		$this->defaults = array(
			'save_format' => 'menu',
			'allow_null'  => 0,
			'container'   => 'div',
		);
		parent::__construct();
	}

	/**
	 * Renders the ACF Nav Menu Field options seen when editing a Nav Menu Field.
	 *
	 * @param array $field The array representation of the current Nav Menu Field.
	 */
	function render_field_settings( $field ) {
		// Register the Return Value format setting
		acf_render_field_setting( $field, array(
			'label'        => esc_html__( 'Return Value', 'glewee' ),
			'instructions' => esc_html__( 'Specify the returned value on front end', 'glewee' ),
			'type'         => 'radio',
			'name'         => 'save_format',
			'layout'       => 'horizontal',
			'choices'      => array(
				'menu'   => esc_html__( 'Nav Menu HTML', 'glewee' ),
				'object' => esc_html__( 'Nav Menu Object', 'glewee' ),
				'id'     => esc_html__( 'Nav Menu ID', 'glewee' ),
			),
		) );

		// Register the Menu Container setting
		acf_render_field_setting( $field, array(
			'label'        => esc_html__( 'Menu Container', 'glewee' ),
			'instructions' => esc_html__( "What to wrap the Menu's ul with (when returning HTML only)", 'glewee' ),
			'type'         => 'select',
			'name'         => 'container',
			'choices'      => $this->get_allowed_nav_container_tags(),
		) );

		// Register the Allow Null setting
		acf_render_field_setting( $field, array(
			'label'        => esc_html__( 'Allow Null?', 'glewee' ),
			'type'         => 'radio',
			'name'         => 'allow_null',
			'layout'       => 'horizontal',
			'choices'      => array(
				1 => esc_html__( 'Yes', 'glewee' ),
				0 => esc_html__( 'No', 'glewee' ),
			),
		) );
	}

	/**
	 * Get the allowed wrapper tags for use with wp_nav_menu().
	 *
	 * @return array An array of allowed wrapper tags.
	 */
	function get_allowed_nav_container_tags() {
		$tags           = apply_filters( 'wp_nav_menu_container_allowedtags', array( 'div', 'nav' ) );
		$formatted_tags = array(
			'0' => 'None',
		);
		foreach ( $tags as $tag ) {
			$formatted_tags[$tag] = ucfirst( $tag );
		}
		return $formatted_tags;
	}

	/**
	 * Renders the ACF Nav Menu Field.
	 *
	 * @param array $field The array representation of the current Nav Menu Field.
	 */
	function render_field( $field ) {
		$allow_null = $field['allow_null'];
		$nav_menus  = $this->get_nav_menus( $allow_null );
		if ( empty( $nav_menus ) ) {
			return;
		}
		?>
		<div class="custom-acf-nav-menu">
			<select id="<?php esc_attr( $field['id'] ); ?>" class="<?php echo esc_attr( $field['class'] ); ?>" name="<?php echo esc_attr( $field['name'] ); ?>">
			<?php foreach( $nav_menus as $nav_menu_id => $nav_menu_name ) : ?>
				<option value="<?php echo esc_attr( $nav_menu_id ); ?>" <?php selected( $field['value'], $nav_menu_id ); ?>>
					<?php echo esc_html( $nav_menu_name ); ?>
				</option>
			<?php endforeach; ?>
			</select>
		</div>
		<?php
	}
	/**
	 * Gets a list of ACF Nav Menus indexed by their Nav Menu IDs.
	 *
	 * @param bool $allow_null If true, prepends the null option.
	 *
	 * @return array An array of Nav Menus indexed by their Nav Menu IDs.
	 */
	function get_nav_menus( $allow_null = false ) {
		$navs = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
		$nav_menus = array();
		if ( $allow_null ) {
			$nav_menus[''] = esc_html__( '- Select -','glewee' );
		}
		foreach ( $navs as $nav ) {
			$nav_menus[ $nav->term_id ] = $nav->name;
		}
		return $nav_menus;
	}

	/**
	 * Renders the ACF Nav Menu Field.
	 *
	 * @param int   $value   The Nav Menu ID selected for this Nav Menu Field.
	 * @param int   $post_id The Post ID this $value is associated with.
	 * @param array $field   The array representation of the current Nav Menu Field.
	 *
	 * @return mixed The Nav Menu ID, or the Nav Menu HTML, or the Nav Menu Object, or false.
	 */
	function format_value( $value, $post_id, $field ) {
		// bail early if no value
		if ( empty( $value ) ) {
			return false;
		}
		// check format
		if ( 'object' == $field['save_format'] ) {
			$wp_menu_object = wp_get_nav_menu_object( $value );

			if( empty( $wp_menu_object ) ) {
				return false;
			}
			$menu_object = new stdClass;
			$menu_object->ID    = $wp_menu_object->term_id;
			$menu_object->name  = $wp_menu_object->name;
			$menu_object->slug  = $wp_menu_object->slug;
			$menu_object->count = $wp_menu_object->count;
			return $menu_object;
		} 
		elseif ( 'menu' == $field['save_format'] ) {
			ob_start();
			wp_nav_menu( array(
				'menu' => $value,
				'container' => 'div',
       			'container_class' => 'acf-nav-menu',
				'container' => $field['container'],
				'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			) );
			return ob_get_clean();
		}

		// Just return the Nav Menu ID
		return $value;
	}

	function load_value( $value, $post_id, $field ) {
		return $value;
	}
}
new acf_field_menu();

/*** Flex Basic */
function basic_content( $group_data ){    
	echo '<div class="basic-content-wrapper">';
	echo preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $group_data['contnet']);
	echo '</div>';

	$add_button = $group_data['add_button'];
	if( $add_button ):
	$button_setting   = $group_data['button_setting'];
	$external_button  = $button_setting['external_button'];
	$link = '';
	if( $external_button )
	{ 
		$link = $button_setting['url']; 
	} 
	else 
	{ 
		$link = $button_setting['page_link']; 
	}
	?>
	<a href="<?php echo $link; ?>" target="<?php echo ( $external_button )?'_blank':''; ?>" class="btn"><?php echo $button_setting['title']; ?></a>

	<?php
	endif; // button setting

	//check Form
	$add_form  = $group_data['add_form'];
	echo '<div class="basic-form">';
	if( $add_form )
	{
		$form_title = $group_data['form_title'];
		$form_id  = $group_data['select_form'];
		echo ( $form_title )?'<h3>'.$form_title.'</h3>':'';
		echo do_shortcode('[gravityform id='.$form_id.' title=false description=false ajax=true tabindex=49]');
	}
	echo '</div>';
}

function basic_flex_assets() {

	wp_enqueue_style(
		'basic-flex',
		get_template_directory_uri().'/css/basic-flex.css',
		false, null
	);

	$inline_css = '';

	$all_layouts = get_field('all_layout');

	// Section styles
	if ( $all_layouts ) {
		$section_id = 1;
		while ( have_rows('all_layout') ) {
			the_row();

			$styles = get_sub_field( 'section_styles' );

			// element id
			$inline_css .= "#content-section-{$section_id} {";

			// set background
			if ( !empty( $styles['margin_top'] ) ) {
				$inline_css .= "margin-top: {$styles['margin_top']};";
			}

			if ( !empty( $styles['margin_right'] ) ) {
				$inline_css .= "margin-right: {$styles['margin_right']};";
			}

			if ( !empty( $styles['margin_bottom'] ) ) {
				$inline_css .= "margin-bottom: {$styles['margin_bottom']};";
			}

			if ( !empty( $styles['margin_left'] ) ) {
				$inline_css .= "margin-left: {$styles['margin_left']};";
			}

			if ( !empty( $styles['padding_top'] ) ) {
				$inline_css .= "padding-top: {$styles['padding_top']};";
			}

			if ( !empty( $styles['padding_right'] ) ) {
				$inline_css .= "padding-right: {$styles['padding_right']};";
			}

			if ( !empty( $styles['padding_bottom'] ) ) {
				$inline_css .= "padding-bottom: {$styles['padding_bottom']};";
			}

			if ( !empty( $styles['padding_left'] ) ) {
				$inline_css .= "padding-left: {$styles['padding_left']};";
			}

			if ( !empty( $styles['border_style'] ) ) {
				$inline_css .= "border-style: {$styles['border_style']};";
			}

			if ( !empty( $styles['border_width'] ) ) {
				$inline_css .= "border-width: {$styles['border_width']};";
			}

			if ( !empty( $styles['border_color'] ) ) {
				$inline_css .= "border-color: {$styles['border_color']};";
			}

			if ( !empty( $styles['background_image'] ) ) {
				$inline_css .= "background-image: url({$styles['background_image']['url']});";
			}

			if ( !empty( $styles['background_color'] ) ) {
				$inline_css .= "background-color: {$styles['background_color']};";
			}

			if ( !empty( $styles['background_image'] ) && !empty( $styles['background_style'] == 'cover' ) || !empty( $styles['background_image'] ) && !empty( $styles['background_style'] == 'contain' ) ) {
				$inline_css .= "background-size: {$styles['background_style']};";
			}

			if ( !empty( $styles['background_image'] ) && !empty( $styles['background_style'] == 'no-repeat' ) || !empty( $styles['background_image'] ) && !empty( $styles['background_style'] == 'repeat' ) || !empty( $styles['background_image'] ) && !empty( $styles['background_style'] == 'repeat-x' ) || !empty( $styles['background_image'] ) && !empty( $styles['background_style'] == 'repeat-y' ) ) {
				$inline_css .= "background-repeat: {$styles['background_style']};";
			}

			if ( !empty( $styles['background_image'] ) && !empty( $styles['background_position'] ) ) {
				$inline_css .= "background-position: {$styles['background_position']};";
			}

			// set other styles
			$inline_css .= "}";

			$section_id++;
		}
	}

	wp_add_inline_style( 'basic-flex', $inline_css );
}
add_action('wp_enqueue_scripts', 'basic_flex_assets');

/*** Post Class Filter */
function glewee_filter_post_classes( $classes ) {
	global $post;

	if ( has_post_thumbnail( $post->ID ) ) 
	{
		$classes[] = "has-thumbnail";
	}
	else
	{
		$classes[] = "has-not-thumbnail";
	}

	return $classes;
}
add_filter( 'post_class', 'glewee_filter_post_classes' );

/*** Popular Posts */
function glewee_count_post_visits() {
	if ( is_single() ) 
	{
		global $post;

		$views = get_post_meta( $post->ID, 'my_post_viewed', true );

		if ( $views == '' ) 
		{
			update_post_meta( $post->ID, 'my_post_viewed', '1' );	
		} 
		else 
		{
			$views_no = intval( $views );
			
			update_post_meta( $post->ID, 'my_post_viewed', ++$views_no );
		}
	}
}
add_action( 'wp_head', 'glewee_count_post_visits' );