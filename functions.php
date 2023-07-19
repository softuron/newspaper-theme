<?php 
function banijjo_defult_function(){
	add_theme_support('title-tag');
	add_theme_support("post-thumbnails");
	add_theme_support('post-formats', array('video', 'gallery' ) );
	
	load_theme_textdomain('ban', get_template_directory_uri().'/language');
	
	if(function_exists('register_nav_menu')){
		register_nav_menu('main-menu', __('Main Menu', 'ban'));
	}
function read_more($word_count){
		$post_content = explode (" ", get_the_content());

		$number_convert_content = array_slice($post_content, 0, $word_count);

		echo implode(" ", $number_convert_content);
	}
	//End Read more Function
}
add_action('after_setup_theme','banijjo_defult_function');


function wp_example_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'wp_example_excerpt_length');
function new_excerpt_more($more) {
    global $post;
    return '... <a href="'. get_permalink($post->ID) . '">বিস্তারিত</a>.';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Start Image Size
add_image_size('frontbig',510,350,array('top','center'));
add_image_size('tempside',120,85,array('top','center'));

add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );
// This will remove the default image sizes medium and large. 
function prefix_remove_default_images( $sizes ) {
 unset( $sizes['small']); // 150px
 unset( $sizes['medium']); // 300px
 return $sizes;
}


// START linkup Houqe
function banijjo_css_and_js(){
	wp_register_style('bootstrap_bost',   get_template_directory_uri().'/bootstrap/css/bootstrap.min.css');
	wp_register_style('bootstrap_gr',   get_template_directory_uri().'/bootstrap/css/bootstrap-grid.min.css');
	wp_register_style('awesome',   get_template_directory_uri().'/css/font-awesome.min.css');
	wp_register_style('aria',   get_template_directory_uri().'/css/aria-tabs.css');
	wp_register_style('carouseller',   get_template_directory_uri().'/css/carouseller.css');
	wp_register_style('owl',   get_template_directory_uri().'/css/owl.carousel.min.css');
	wp_register_style('owltheme',   get_template_directory_uri().'/css/owl.theme.default.min.css');
	wp_register_style('magnific',   get_template_directory_uri().'/css/magnific-popup.css');
	wp_register_style('main',   get_template_directory_uri().'/css/main.css');
	wp_register_style('responsive',   get_template_directory_uri().'/css/responsive.css');
	wp_register_style('themestyle',   get_template_directory_uri().'/style.css');
	
	wp_enqueue_style('bootstrap_bost');
	wp_enqueue_style('bootstrap_gr');
	wp_enqueue_style('awesome');
	wp_enqueue_style('aria');
	wp_enqueue_style('carouseller');
	wp_enqueue_style('owl');
	wp_enqueue_style('owltheme');
	wp_enqueue_style('magnific');
	wp_enqueue_style('main');
	wp_enqueue_style('responsive');
	wp_enqueue_style('themestyle');
	//End All css fill
}
add_action('wp_enqueue_scripts','banijjo_css_and_js');

function crunchify_create_the_ad_posttype() {
	$labels = array(
		'name'                => _x( 'Ad', 'Post Type General Name', 'ban' ),
		'singular_name'       => _x( 'Ad', 'Post Type Singular Name', 'ban' ),
		'menu_name'           => esc_html__( 'Ad', 'ban' ),
		'parent_item_colon'   => esc_html__( 'Parent Ad', 'ban' ),
		'all_items'           => esc_html__( 'All Ad', 'ban' ),
		'view_item'           => esc_html__( 'View Ad', 'ban' ),
		'add_new_item'        => esc_html__( 'Add New Ad', 'ban' ),
		'add_new'             => esc_html__( 'Add New', 'ban' ),
		'edit_item'           => esc_html__( 'Edit Ad', 'ban' ),
		'update_item'         => esc_html__( 'Update Ad', 'ban' ),
		'search_items'        => esc_html__( 'Search Ad', 'ban' ),
		'not_found'           => esc_html__( 'Not Found', 'ban' ),
		'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'ban' ),
	);	
	$args = array(
		'label'               => esc_html__( 'Ad', 'ban' ),
		'description'         => esc_html__( 'Ad', 'ban' ),
		'labels'              => $labels,
		'supports'            => array( 'title','thumbnail'),
		'taxonomies'          => array( 'genres' ),
	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 100,
		'can_export'          => true,
		'has_archive'         => __( 'Ad' ),
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var' 		  => true,
		'show_admin_column'   => true,
		'capability_type'     => 'post',
        'rewrite' => array('slug' => 'ad/%ads%'),
	);
	register_post_type( 'Ad', $args );
	
	$labelsim = array(
		'name'                => _x( 'Image', 'Post Type General Name', 'ban' ),
		'singular_name'       => _x( 'Image', 'Post Type Singular Name', 'ban' ),
		'menu_name'           => esc_html__( 'Image', 'ban' ),
		'parent_item_colon'   => esc_html__( 'Parent Image', 'ban' ),
		'all_items'           => esc_html__( 'All Image', 'ban' ),
		'view_item'           => esc_html__( 'View Image', 'ban' ),
		'add_new_item'        => esc_html__( 'Add New Image', 'ban' ),
		'add_new'             => esc_html__( 'Add New', 'ban' ),
		'edit_item'           => esc_html__( 'Edit Image', 'ban' ),
		'update_item'         => esc_html__( 'Update Image', 'ban' ),
		'search_items'        => esc_html__( 'Search Image', 'ban' ),
		'not_found'           => esc_html__( 'Not Found', 'ban' ),
		'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'ban' ),
	);	
	$argsim = array(
		'label'               => esc_html__( 'Image', 'ban' ),
		'description'         => esc_html__( 'Image', 'ban' ),
		'labels'              => $labelsim,
		'supports'            => array( 'title','thumbnail'),
		'taxonomies'          => array( 'genres' ),
	
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 4,
		'can_export'          => true,
		'has_archive'         => __( 'Image' ),
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var' 		  => true,
		'show_admin_column'   => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'image', $argsim );
	
	$labelsvi = array(
		'name'                => _x( 'Video', 'Post Type General Name', 'ban' ),
		'singular_name'       => _x( 'Video', 'Post Type Singular Name', 'ban' ),
		'menu_name'           => esc_html__( 'Video', 'ban' ),
		'parent_item_colon'   => esc_html__( 'Parent Video', 'ban' ),
		'all_items'           => esc_html__( 'All Video', 'ban' ),
		'view_item'           => esc_html__( 'View Video', 'ban' ),
		'add_new_item'        => esc_html__( 'Add New Video', 'ban' ),
		'add_new'             => esc_html__( 'Add New', 'ban' ),
		'edit_item'           => esc_html__( 'Edit Video', 'ban' ),
		'update_item'         => esc_html__( 'Update Video', 'ban' ),
		'search_items'        => esc_html__( 'Search Video', 'ban' ),
		'not_found'           => esc_html__( 'Not Found', 'ban' ),
		'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'ban' ),
	);	
	$argsvi = array(
		'label'               => esc_html__( 'Video', 'ban' ),
		'description'         => esc_html__( 'Video', 'ban' ),
		'labels'              => $labelsvi,
		'supports'            => array( 'title','thumbnail'),
	
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => __( 'Video' ),
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var' 		  => true,
		'show_admin_column'   => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'video', $argsvi );
}
add_action( 'init', 'crunchify_create_the_ad_posttype', 0 );
// ================================= Custom Post Type Taxonomies =================================
function crunchify_create_the_ad_taxonomy() {  
    register_taxonomy(  
        'ads',  					// This is a name of the taxonomy. Make sure it's not a capital letter and no space in between
        'ad',        			//post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Ad Type',  	//Display name
            'query_var' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'ad')
        )  
    );  
    register_taxonomy(  
        'videos',  					// This is a name of the taxonomy. Make sure it's not a capital letter and no space in between
        'video',        			//post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Video type',  	//Display name
            'query_var' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'video')
        )  
    );  
}  
add_action( 'init', 'crunchify_create_the_ad_taxonomy');

function crunchify_create_post_link( $post_link, $id = 0 ){
    $post = get_post($id);  
    if ( is_object( $post ) ){
        $terms = wp_get_object_terms( $post->ID, 'ads' );
        if( $terms ){
            return str_replace( '%ads%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
    $post = get_post($id);  
    if ( is_object( $post ) ){
        $terms = wp_get_object_terms( $post->ID, 'videos' );
        if( $terms ){
            return str_replace( '%videos%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;  
}
add_filter( 'post_type_link', 'crunchify_create_post_link', 1, 3 );

//End Link UP
function banijjo_customizer($wp_customize){
    $wp_customize->get_setting( 'blogname' )->transport = 'refresh';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';
	
	//Start Genaral Section
    $wp_customize -> add_section('genaral',array(
        'title'=>'Genaral Settings',
        'priority'=> 1
        ));
    $wp_customize -> add_setting('logo_text_big',array(
        'default'=>'নিউজ পোর্টাল',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('logo_text_big',array(
        'section'=>'genaral',
        'label'=>'Logo Text',
        'type'=>'text'
        ));
    $wp_customize -> add_setting('logo_image',array(
        'default'=>'',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control(
        new WP_Customize_Image_Control($wp_customize,'logo_image',array(
            'label'=>'Logo Image',
            'section'=>'genaral',
            'setting'=>'logo_image'
            ))
        );
    $wp_customize -> add_setting('breacking',array(
        'default'=>'সর্বশেষ',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('breacking',array(
        'section'=>'genaral',
        'label'=>'Change breaking title',
        'type'=>'text'
        ));
        
    $wp_customize -> add_setting('photoname',array(
        'default'=>'ছবি',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('photoname',array(
            'label'=>'Picture section name',
            'section'=>'genaral',
            'setting'=>'photoname',
            'type'=>'text'
            ));
        
    $wp_customize -> add_setting('videoname',array(
        'default'=>'ভিডিও',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('videoname',array(
            'label'=>'videoname section name',
            'section'=>'genaral',
            'setting'=>'videoname',
            'type'=>'text'
            ));
    $wp_customize -> add_setting('facebook',array(
        'default'=>'shohorabban',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('facebook',array(
            'label'=>'Facebook Id',
            'section'=>'genaral',
            'setting'=>'facebook',
            'type'=>'text'
            ));
    $wp_customize -> add_setting('twitter',array(
        'default'=>'shohorabho',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('twitter',array(
            'label'=>'Twitter Id',
            'section'=>'genaral',
            'setting'=>'twitter',
            'type'=>'text'
            ));
    $wp_customize -> add_setting('linkedin',array(
        'default'=>'shohorabho',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('linkedin',array(
            'label'=>'Linkedin Id',
            'section'=>'genaral',
            'setting'=>'linkedin',
            'type'=>'text'
            ));
    $wp_customize -> add_setting('github',array(
        'default'=>'shohorabho',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('github',array(
            'label'=>'Github Id',
            'section'=>'genaral',
            'setting'=>'github',
            'type'=>'text'
            ));
    $wp_customize -> add_setting('googleplus',array(
        'default'=>'shohorabho',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('googleplus',array(
            'label'=>'Google Plus Id',
            'section'=>'genaral',
            'setting'=>'googleplus',
            'type'=>'text'
            ));
    $wp_customize -> add_setting('insta',array(
        'default'=>'',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('insta',array(
            'label'=>'Instagram ID',
            'section'=>'genaral',
            'setting'=>'insta',
            'type'=>'text'
            ));
    /*==============Start Front Section===========*/
    $wp_customize -> add_section('front',array(
        'title'=>'Front Page Settings',
        'priority'=> 2
        ));
    $wp_customize -> add_setting('show_top_section',array(
        'default'=>true,
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('show_top_section',array(
            'label'=>'Show top section',
            'section'=>'front',
            'setting'=>'show_top_section',
            'type'=>'checkbox'
            ));
    $wp_customize -> add_setting('show_second_section',array(
        'default'=>true,
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('show_second_section',array(
            'label'=>'Show second section',
            'section'=>'front',
            'setting'=>'show_second_section',
            'type'=>'checkbox'
            ));
    $wp_customize -> add_setting('show_fistcat_section',array(
        'default'=>true,
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('show_fistcat_section',array(
            'label'=>'Show first category section',
            'section'=>'front',
            'setting'=>'show_fistcat_section',
            'type'=>'checkbox'
            ));
    $wp_customize -> add_setting('show_secondcat_section',array(
        'default'=>true,
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('show_secondcat_section',array(
            'label'=>'Show second category section',
            'section'=>'front',
            'setting'=>'show_secondcat_section',
            'type'=>'checkbox'
            ));
    $wp_customize -> add_setting('show_thirdcat_section',array(
        'default'=>true,
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('show_thirdcat_section',array(
            'label'=>'Show third category section',
            'section'=>'front',
            'setting'=>'show_thirdcat_section',
            'type'=>'checkbox'
            ));
    $wp_customize -> add_setting('show_focat_section',array(
        'default'=>true,
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('show_focat_section',array(
            'label'=>'Show fourth category section',
            'section'=>'front',
            'setting'=>'show_focat_section',
            'type'=>'checkbox'
            ));
    $wp_customize -> add_setting('show_firstsideber_section',array(
        'default'=>true,
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('show_firstsideber_section',array(
            'label'=>'Show first sidebar section',
            'section'=>'front',
            'setting'=>'show_firstsideber_section',
            'type'=>'checkbox'
            ));
    $wp_customize -> add_setting('show_secondsideber_section',array(
        'default'=>true,
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('show_secondsideber_section',array(
            'label'=>'Show second sidebar section',
            'section'=>'front',
            'setting'=>'show_secondsideber_section',
            'type'=>'checkbox'
            ));
    $wp_customize -> add_setting('show_thirdsideber_section',array(
        'default'=>true,
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('show_thirdsideber_section',array(
            'label'=>'Show third sidebar section',
            'section'=>'front',
            'setting'=>'show_thirdsideber_section',
            'type'=>'checkbox'
            ));
    $wp_customize -> add_setting('show_fourthsideber_section',array(
        'default'=>true,
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('show_fourthsideber_section',array(
            'label'=>'Show fourth sidebar section',
            'section'=>'front',
            'setting'=>'show_fourthsideber_section',
            'type'=>'checkbox'
            ));
    $wp_customize -> add_setting('show_fifthsideber_section',array(
        'default'=>true,
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('show_fifthsideber_section',array(
            'label'=>'Show fifth sidebar section',
            'section'=>'front',
            'setting'=>'show_fifthsideber_section',
            'type'=>'checkbox'
            ));
    //Add category for first lead
        $categorieslead = get_categories();
        $catslead = array();
        $i = 0;
        foreach($categorieslead as $categorylead){
            if($i==0){
                $defaultlead = $categorylead->slug;
                $i++;
            }
            $catslead[$categorylead->slug] = $categorylead->name;
        }
        $wp_customize->add_setting('firstleadcat', array(
            'default'        => $defaultlead
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'firstleadcat', array(
            'label' => 'Select first lead category',
            'description' => 'Select for first lead category from here',
            'section' => 'front',
            'settings' => 'firstleadcat',
            'type'    => 'select',
            'choices' => $catslead
        )));
    //Add category for Second lead
        $categorieslead2 = get_categories();
        $catslead2 = array();
        $i = 0;
        foreach($categorieslead2 as $categorylead2){
            if($i==0){
                $defaultlead2 = $categorylead2->slug;
                $i++;
            }
            $catslead2[$categorylead2->slug] = $categorylead2->name;
        }
        $wp_customize->add_setting('secondleadcat', array(
            'default'        => $defaultlead2
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'secondleadcat', array(
            'label' => 'Select second lead category',
            'description' => 'Select for second lead category from here',
            'section' => 'front',
            'settings' => 'secondleadcat',
            'type'    => 'select',
            'choices' => $catslead2
        )));
    //Add category for Slider
        $categoriesslider = get_categories();
        $catsslider = array();
        $i = 0;
        foreach($categoriesslider as $categoryslider){
            if($i==0){
                $defaultslider = $categoryslider->slug;
                $i++;
            }
            $catsslider[$categoryslider->slug] = $categoryslider->name;
        }
        $wp_customize->add_setting('slidercat', array(
            'default'        => $defaultslider
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'slidercat', array(
            'label' => 'Select slider category',
            'description' => 'Select for slider category from here',
            'section' => 'front',
            'settings' => 'slidercat',
            'type'    => 'select',
            'choices' => $catsslider
        )));
        
    $wp_customize -> add_setting('firstcatname',array(
        'default'=>'পুঁজিবাজার',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('firstcatname',array(
            'label'=>'First category name',
            'section'=>'front',
            'setting'=>'firstcatname',
            'type'=>'text'
            ));
    //Add category
        $categories = get_categories();
        $cats = array();
        $i = 0;
        foreach($categories as $category){
            if($i==0){
                $default = $category->slug;
                $i++;
            }
            $cats[$category->slug] = $category->name;
        }
        $wp_customize->add_setting('firstcat', array(
            'default'        => $default
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'firstcat', array(
            'label' => 'Select first category',
            'description' => 'Select for first category from here',
            'section' => 'front',
            'settings' => 'firstcat',
            'type'    => 'select',
            'choices' => $cats
        )));
        
    $wp_customize -> add_setting('secondcatname',array(
        'default'=>'জাতীয়',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('secondcatname',array(
            'label'=>'Second category name',
            'section'=>'front',
            'setting'=>'secondcatname',
            'type'=>'text'
            ));
    //Add category
        $categoriesfs = get_categories();
        $catsfs = array();
        $i = 0;
        foreach($categoriesfs as $categoryfs){
            if($i==0){
                $defaults = $categoryfs->slug;
                $i++;
            }
            $catsfs[$categoryfs->slug] = $categoryfs->name;
        }
        $wp_customize->add_setting('secondcat', array(
            'default'        => $defaults
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'secondcat', array(
            'label' => 'Select second category',
            'description' => 'Select for second category from here',
            'section' => 'front',
            'settings' => 'secondcat',
            'type'    => 'select',
            'choices' => $catsfs
        )));
    $wp_customize -> add_setting('thirdcatname',array(
        'default'=>'অর্থ-বাণিজ্য',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('thirdcatname',array(
            'label'=>'Third category name',
            'section'=>'front',
            'setting'=>'thirdcatname',
            'type'=>'text'
            ));
    //Add category
        $categoriesft = get_categories();
        $catsft = array();
        $i = 0;
        foreach($categoriesft as $categoryft){
            if($i==0){
                $defaultt = $categoryft->slug;
                $i++;
            }
            $catsft[$categoryft->slug] = $categoryft->name;
        }
        $wp_customize->add_setting('thirdcat', array(
            'default'        => $defaultt
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'thirdcat', array(
            'label' => 'Select third category',
            'description' => 'Select for third category from here',
            'section' => 'front',
            'settings' => 'thirdcat',
            'type'    => 'select',
            'choices' => $catsft
        )));
    $wp_customize -> add_setting('fourthcatname',array(
        'default'=>'সারাদেশ',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('fourthcatname',array(
            'label'=>'Fourth category name',
            'section'=>'front',
            'setting'=>'fourthcatname',
            'type'=>'text'
            ));
    //Add category
        $categoriesff = get_categories();
        $catsff = array();
        $i = 0;
        foreach($categoriesff as $categoryff){
            if($i==0){
                $defaultf = $categoryff->slug;
                $i++;
            }
            $catsff[$categoryff->slug] = $categoryff->name;
        }
        $wp_customize->add_setting('fourthcat', array(
            'default'        => $defaultf
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'fourthcat', array(
            'label' => 'Select fourth category',
            'description' => 'Select for fourth category from here',
            'section' => 'front',
            'settings' => 'fourthcat',
            'type'    => 'select',
            'choices' => $catsff
        )));
    $wp_customize -> add_setting('fivecatname',array(
        'default'=>'ব্যাংক',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('fivecatname',array(
            'label'=>'Fifth category name',
            'section'=>'front',
            'setting'=>'fivecatname',
            'type'=>'text'
            ));
    //Add category
        $categoriesffi = get_categories();
        $catsffi = array();
        $i = 0;
        foreach($categoriesffi as $categoryffi){
            if($i==0){
                $defaultfi = $categoryffi->slug;
                $i++;
            }
            $catsffi[$categoryffi->slug] = $categoryffi->name;
        }
        $wp_customize->add_setting('fifthcat', array(
            'default'        => $defaultfi
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'fifthcat', array(
            'label' => 'Select fifth category',
            'description' => 'Select for fifth category from here',
            'section' => 'front',
            'settings' => 'fifthcat',
            'type'    => 'select',
            'choices' => $catsffi
        )));
    $wp_customize -> add_setting('sixcatname',array(
        'default'=>'বীমা',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('sixcatname',array(
            'label'=>'Sixth category name',
            'section'=>'front',
            'setting'=>'sixcatname',
            'type'=>'text'
            ));
    //Add category
        $categoriesfsi = get_categories();
        $catsfsi = array();
        $i = 0;
        foreach($categoriesfsi as $categoryfsi){
            if($i==0){
                $defaultsi = $categoryfsi->slug;
                $i++;
            }
            $catsfsi[$categoryfsi->slug] = $categoryfsi->name;
        }
        $wp_customize->add_setting('sixcat', array(
            'default'        => $defaultsi
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'sixcat', array(
            'label' => 'Select sixth category',
            'description' => 'Select for sixth category from here',
            'section' => 'front',
            'settings' => 'sixcat',
            'type'    => 'select',
            'choices' => $catsfsi
        )));
    $wp_customize -> add_setting('agcatname',array(
        'default'=>'কৃষি বাণিজ্য',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('agcatname',array(
            'label'=>'agriculture category name',
            'section'=>'front',
            'setting'=>'agcatname',
            'type'=>'text'
            ));
    //Add category
        $categoriesag = get_categories();
        $catsag = array();
        $i = 0;
        foreach($categoriesag as $categoryag){
            if($i==0){
                $defaultag = $categoryag->slug;
                $i++;
            }
            $catsag[$categoryag->slug] = $categoryag->name;
        }
        $wp_customize->add_setting('agcat', array(
            'default'        => $defaultag
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'agcat', array(
            'label' => 'Select Agriculture category',
            'description' => 'Select for Agriculture category from here',
            'section' => 'front',
            'settings' => 'agcat',
            'type'    => 'select',
            'choices' => $catsag
        )));
    $wp_customize -> add_setting('seventhname',array(
        'default'=>'স্পোর্টস',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('seventhname',array(
            'label'=>'Seventh category name',
            'section'=>'front',
            'setting'=>'seventhname',
            'type'=>'text'
            ));
    //Add category
        $categoriesfsev = get_categories();
        $catsfsev = array();
        $i = 0;
        foreach($categoriesfsev as $categoryfsev){
            if($i==0){
                $defaultsev = $categoryfsev->slug;
                $i++;
            }
            $catsfsev[$categoryfsev->slug] = $categoryfsev->name;
        }
        $wp_customize->add_setting('sevencat', array(
            'default'        => $defaultsev
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'sevencat', array(
            'label' => 'Select seventh category',
            'description' => 'Select for seventh category from here',
            'section' => 'front',
            'settings' => 'sevencat',
            'type'    => 'select',
            'choices' => $catsfsev
        )));
    $wp_customize -> add_setting('eighthcatname',array(
        'default'=>'কর্পোরেটস',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('eighthcatname',array(
            'label'=>'Eighth category name',
            'section'=>'front',
            'setting'=>'eighthcatname',
            'type'=>'text'
            ));
    //Add category
        $categoriesfe = get_categories();
        $catsfe = array();
        $i = 0;
        foreach($categoriesfe as $categoryfe){
            if($i==0){
                $defaulte = $categoryfe->slug;
                $i++;
            }
            $catsfe[$categoryfe->slug] = $categoryfe->name;
        }
        $wp_customize->add_setting('eightcat', array(
            'default'        => $defaulte
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'eightcat', array(
            'label' => 'Select eighth category',
            'description' => 'Select for eighth category from here',
            'section' => 'front',
            'settings' => 'eightcat',
            'type'    => 'select',
            'choices' => $catsfe
        )));
    $wp_customize -> add_setting('ninthcatneme',array(
        'default'=>'আন্তর্জাতিক',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('ninthcatneme',array(
            'label'=>'Ninth category name',
            'section'=>'front',
            'setting'=>'ninthcatneme',
            'type'=>'text'
            ));
    //Add category
        $categoriesfn = get_categories();
        $catsfn = array();
        $i = 0;
        foreach($categoriesfn as $categoryfn){
            if($i==0){
                $defaultn = $categoryfn->slug;
                $i++;
            }
            $catsfn[$categoryfn->slug] = $categoryfn->name;
        }
        $wp_customize->add_setting('ninthcat', array(
            'default'        => $defaultn
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ninthcat', array(
            'label' => 'Select ninth category',
            'description' => 'Select for ninth category from here',
            'section' => 'front',
            'settings' => 'ninthcat',
            'type'    => 'select',
            'choices' => $catsfn
        )));
    $wp_customize -> add_setting('tenthcatname',array(
        'default'=>'বিনোদন',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('tenthcatname',array(
            'label'=>'Tenth category name',
            'section'=>'front',
            'setting'=>'tenthcatname',
            'type'=>'text'
            ));
    //Add category
        $categoriesfte = get_categories();
        $catsfte = array();
        $i = 0;
        foreach($categoriesfte as $categoryfte){
            if($i==0){
                $defaultte = $categoryfte->slug;
                $i++;
            }
            $catsfte[$categoryfte->slug] = $categoryfte->name;
        }
        $wp_customize->add_setting('tenthcat', array(
            'default'        => $defaultte
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tenthcat', array(
            'label' => 'Select tenth category',
            'description' => 'Select for tenth category from here',
            'section' => 'front',
            'settings' => 'tenthcat',
            'type'    => 'select',
            'choices' => $catsfte
        )));
    $wp_customize -> add_setting('elaventhcatname',array(
        'default'=>'লাইফ স্টাইল',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('elaventhcatname',array(
            'label'=>'Elaventh category name',
            'section'=>'front',
            'setting'=>'elaventhcatname',
            'type'=>'text'
            ));
    //Add category
        $categoriesfel = get_categories();
        $catsfel = array();
        $i = 0;
        foreach($categoriesfel as $categoryfel){
            if($i==0){
                $defaultel = $categoryfel->slug;
                $i++;
            }
            $catsel[$categoryfel->slug] = $categoryfel->name;
        }
        $wp_customize->add_setting('eleventhcat', array(
            'default'        => $defaultel
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'eleventhcat', array(
            'label' => 'Select eleventh category',
            'description' => 'Select for eleventh category from here',
            'section' => 'front',
            'settings' => 'eleventhcat',
            'type'    => 'select',
            'choices' => $catsel
        )));
    $wp_customize -> add_setting('twlvecatname',array(
        'default'=>'মতামত',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('twlvecatname',array(
            'label'=>'Twelveth category name',
            'section'=>'front',
            'setting'=>'twlvecatname',
            'type'=>'text'
            ));
    //Add category
        $categoriesftw = get_categories();
        $catsftw = array();
        $i = 0;
        foreach($categoriesftw as $categoryftw){
            if($i==0){
                $defaulttw = $categoryftw->slug;
                $i++;
            }
            $catstw[$categoryftw->slug] = $categoryftw->name;
        }
        $wp_customize->add_setting('twelvethcat', array(
            'default'        => $defaulttw
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'twelvethcat', array(
            'label' => 'Select twelveth category',
            'description' => 'Select for twelveth category from here',
            'section' => 'front',
            'settings' => 'twelvethcat',
            'type'    => 'select',
            'choices' => $catstw
        )));
    $wp_customize -> add_setting('side2catname',array(
        'default'=>'তথ্য-প্রযুক্তি',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('side2catname',array(
            'label'=>'Sidebar 2 category name',
            'section'=>'front',
            'setting'=>'side2catname',
            'type'=>'text'
            ));
    //Add category
        $categoriesfsd2 = get_categories();
        $catsfsd2 = array();
        $i = 0;
        foreach($categoriesfsd2 as $categoryfsd2){
            if($i==0){
                $defaultsd2 = $categoryfsd2->slug;
                $i++;
            }
            $catssd2[$categoryfsd2->slug] = $categoryfsd2->name;
        }
        $wp_customize->add_setting('sidecatname', array(
            'default'        => $defaultsd2
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'sidecatname', array(
            'label' => 'Select Sidebar 2 category',
            'description' => 'Select for Sidebar category from here',
            'section' => 'front',
            'settings' => 'sidecatname',
            'type'    => 'select',
            'choices' => $catssd2
        )));
    $wp_customize -> add_setting('side3catname',array(
        'default'=>'সম্পাদকীয়',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('side3catname',array(
            'label'=>'Sidebar 3 category name',
            'section'=>'front',
            'setting'=>'side3catname',
            'type'=>'text'
            ));
    //Add category
        $categoriesfsd3 = get_categories();
        $catsfsd3 = array();
        $i = 0;
        foreach($categoriesfsd3 as $categoryfsd3){
            if($i==0){
                $defaultsd3 = $categoryfsd3->slug;
                $i++;
            }
            $catssd3[$categoryfsd3->slug] = $categoryfsd3->name;
        }
        $wp_customize->add_setting('side3cat', array(
            'default'        => $defaultsd3
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'side3cat', array(
            'label' => 'Select Sidebar 3 category',
            'description' => 'Select for Sidebar category from here',
            'section' => 'front',
            'settings' => 'side3cat',
            'type'    => 'select',
            'choices' => $catssd3
        )));
    $wp_customize -> add_setting('side4catname',array(
        'default'=>'রাজনীতি',
        'transport'=>'refresh'
        ));
    $wp_customize -> add_control('side4catname',array(
            'label'=>'Sidebar 4 category name',
            'section'=>'front',
            'setting'=>'side4catname',
            'type'=>'text'
            ));
    //Add category
        $categoriesfsd4 = get_categories();
        $catsfsd4 = array();
        $i = 0;
        foreach($categoriesfsd4 as $categoryfsd4){
            if($i==0){
                $defaultsd4 = $categoryfsd4->slug;
                $i++;
            }
            $catssd4[$categoryfsd4->slug] = $categoryfsd4->name;
        }
        $wp_customize->add_setting('side4cat', array(
            'default'        => $defaultsd4
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'side4cat', array(
            'label' => 'Select Sidebar 4 category',
            'description' => 'Select for Sidebar category from here',
            'section' => 'front',
            'settings' => 'side4cat',
            'type'    => 'select',
            'choices' => $catssd4
        )));
}
add_action('customize_register','banijjo_customizer');
//End Customizer API

function banijjo_sidebar(){
register_sidebar(array(
			'name' => __('Footer','ban'),
			'description'=> __('Add Your Footer Widgets Here','ban'),
			'id' => 'footer_widget',
			'before_widget'=>'<div class="col-xl-6 col-md-6 col-sm-12 col-12 W-item">',
			'after_widget'=>'</div>',
		));
}
add_action('widgets_init','banijjo_sidebar');
if ( ! function_exists( 'download_url' ) ) {
    require_once ABSPATH . 'wp-admin/includes/file.php';
}
function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}
require_once('meta/init.php');
require_once('meta/functions.php');