<?php
    function shopit_theme_styles() {
        wp_register_style('bootstrapcss', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', [], '5.2.3', 'all');

        wp_enqueue_style('bootstrapcss');

        wp_register_script('jsbootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', [], '5.2.3', false);
        wp_enqueue_script ('jsbootstrap');

        wp_enqueue_style('customcss',  get_template_directory_uri().'/custom/custom.css', [], '1.0.0', 'all');
 
    }

    add_action('wp_enqueue_scripts', 'shopit_theme_styles');

// ADDING MENUS - HEADER AND FOOTER

    function shopit_theme_setup(){
        add_theme_support('menus');
        register_nav_menu('primary', 'Primary Header');
        register_nav_menu('secondary', 'Footer Navigation');
    }
    add_action('init', 'shopit_theme_setup');

/**
 * THEME SUPPORT
 */

 add_theme_support('custom-background');
 add_theme_support('custom-header');
 add_theme_support('post-thumbnails');

 add_theme_support('post-formats',['aside', 'image', 'video']);


// ADDING NAVWALKER CLASS
    if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
        return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
    } else {
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
    

    // CUSTOM POST TYPE

function foods_post_type(){
    $labels = [
        'name'=> 'foods',
        'singular_name'=> 'food',
        'add_new'=> 'Add food Item',
        'all_items'=> 'All foods',
        'add_new_item'=> 'Add Item',
        'new_item'=> 'New Items',
        'view_item'=> 'View Item',
        'search_item'=> 'Search Foods',
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

add_action('init', 'foods_post_type');

// CUSTOM TAXONOMY
function protein_custom_taxonomy(){
    $labels = [
        'name'=> 'Proteins',
        'singular_name'=> 'Protein',
        'search_items'=> 'Search Proteins',
        'all_items'=>'All Protein',
        'parent_item'=> 'Parent Protein',
        'parent_item_colon'=> 'Parent Protein',
        'edit_item'=> 'Edit Protein',
        'update_item'=> 'Update Protein',
        'add_new_item'=> 'Add New Protein',
        'new_item_name'=> 'New Protein Name',
        'menu_name'=>'Proteins'
    ];

    $args = [
        'labels'=> $labels,
        'hierarchical'=>true,
        'show_ui'=>true,
        'show_admin_column'=>true,
        'query_var'=>true,
        'rewrite'=>[
            'slug'=>'Protein'
        ]
        ];

    register_taxonomy('Protein', ['food'], $args);

    // NON-HIERARCHICAL TAXONOMY
    register_taxonomy('Food-Type', ['food'], [
        'hierarchical'=> false,
        'label'=> 'Software',
        'show_ui'=>true,
        'show_admin_column'=>true,
        'query_var'=>true,
        'rewrite'=>[
            'slug'=> 'Organic'
        ]
    ]);
}

add_action('init', 'protein_custom_taxonomy');


//////////////////////////////////////////////////////////




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