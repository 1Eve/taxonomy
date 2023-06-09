<?php

function c13theme_script_enqueue(){
    wp_enqueue_style('customstyle', get_template_directory_uri().'/custom/custom.css', [], '3.1.1', 'all');
    wp_enqueue_script('customjs', get_template_directory_uri(). '/custom/custom.js',[], '1.0.0', true);

    // Using bootstrap
    wp_register_style('bootstrapcss', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', [], '5.2.3', 'all');

    wp_enqueue_style('bootstrapcss');

    wp_register_script('jsbootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', [], '5.2.3', false);
    wp_enqueue_script ('jsbootstrap');
}

add_action('wp_enqueue_scripts', 'c13theme_script_enqueue');

// ADDING MENUS - HEADER AND FOOTER

function c13theme_setup(){
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header');
    register_nav_menu('secondary', 'Footer Navigation');
}
// ADDING NAVWALKER CLASS
if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('init','c13theme_setup');


/**
 * THEME SUPPORT
 */

 add_theme_support('custom-background');
 add_theme_support('custom-header');
 add_theme_support('post-thumbnails');

 add_theme_support('post-formats',['aside', 'image', 'video']);

function c13theme_sidebar_Setup(){
    register_sidebar([
        'name'=> 'Sidebar',
        'id'=>'sidebar-1',
        'class'=>'custom',
        'description'=> 'Standard Sidebar',
        'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'   => "</aside>\n",
		'before_title'   => '<h2 class="widgettitle">',
		'after_title'    => "</h2>\n",
        'show_in_rest'   => false
    ]);
}

add_action('widgets_init', 'c13theme_sidebar_Setup');

// Converting HTML TO HTML5 FOR  SEARCH FORM
add_theme_support('html5', ['search-form']);

// CUSTOM POST TYPE

function food_post_type(){
    $labels = [
        'name'=> 'Foods',
        'singular_name'=> 'Food',
        'add_new'=> 'Add Food Item',
        'all_items'=> 'All Foods',
        'add_new_item'=> 'Edit Item',
        'new_item'=> 'New Items',
        'view_item'=> 'View Item',
        'search_item'=> 'Search Food',
        'not_found'=> 'No Items found',
        'not_found_in_trash'=> 'No Items found in trash',
        'parent_item_colon'=> 'Parent Item'
    ];

    $args = [
        'labels'=> $labels,
        'public'=> true,
        'has_archive'=> true,
        'publicly_queryable'=> true,
        'query_var'=> true,
        'rewrite'=>true,
        'capability'=> 'post',
        'hierarchical' => false,
        'supports'=>[
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
        ],
        'taxonomies'=>[
            'category',
            'post_tag',
            'menu_position'=> 5,
            'exclude_from_search'=> false
        ]
    ];

    register_post_type('food', $args);
}

add_action('init', 'food_post_type');

// CUSTOM TAXONOMY
function Nutrient_custom_taxonomy(){
    $labels = [
        'name'=> 'Nutrients',
        'singular_name'=> 'Nutrient',
        'search_items'=> 'Search Nutrient',
        'all_items'=>'All Nutrient',
        'parent_item'=> 'Parent Nutrient',
        'parent_item_colon'=> 'Parent Nutrient',
        'edit_item'=> 'Edit Nutrient',
        'update_item'=> 'Update Nutrient',
        'add_new_item'=> 'Add New Nutrient',
        'new_item_name'=> 'New Nutrient Name',
        'menu_name'=>'Nutrient'
    ];

    $args = [
        'labels'=> $labels,
        'hierarchical'=>true,
        'show_ui'=>true,
        'show_admin_column'=>true,
        'query_var'=>true,
        'rewrite'=>[
            'slug'=>'nutrient'
        ]
        ];

    register_taxonomy('nutrient', ['food'], $args);

    // NON-HIERARCHICAL TAXONOMY
    register_taxonomy('Description', ['food'], [
        'hierarchical'=> false,
        'label'=> 'Description',
        'show_ui'=>true,
        'show_admin_column'=>true,
        'query_var'=>true,
        'rewrite'=>[
            'slug'=> 'Description'
        ]
    ]);
}

add_action('init', 'Nutrient_custom_taxonomy');

// CUSTOM TERM FUNCTION

function customterm_get_terms($postID, $term){
    $termslist = wp_get_post_terms($postID, $term);

    $i = 0;

    $output = '';

    foreach ($termslist as $term){
        $i++;

        if ($i > 1){
            $output .= ', ';
        }

        // $output .= $term->name;
        // $output .= get_term_link($term);
        $output .= '<a href="'.get_term_link($term).'" >' .$term->name. '</a>';

    }

    return $output;
}