<?php
// should not have a closing php tag !!
// only thing that has a closing tag is the footer.php
// MUST BE <?php at the beginning, dont even have a space
// put comments AFTER the php tag, like these

function fwd_register_custom_post_types() {
    
    // Register Works
    $labels = array(
        'name'                  => _x( 'Works', 'post type general name' ),
        'singular_name'         => _x( 'Work', 'post type singular name'),
        'menu_name'             => _x( 'Works', 'admin menu' ),
        'name_admin_bar'        => _x( 'Work', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'work' ),
        'add_new_item'          => __( 'Add New Work' ),
        'new_item'              => __( 'New Work' ),
        'edit_item'             => __( 'Edit Work' ),
        'view_item'             => __( 'View Work' ),
        'all_items'             => __( 'All Works' ),
        'search_items'          => __( 'Search Works' ),
        'parent_item_colon'     => __( 'Parent Works:' ),
        'not_found'             => __( 'No works found.' ),
        'not_found_in_trash'    => __( 'No works found in Trash.' ),
        'archives'              => __( 'Work Archives'),
        'insert_into_item'      => __( 'Insert into work'),
        'uploaded_to_this_item' => __( 'Uploaded to this work'),
        'filter_item_list'      => __( 'Filter works list'),
        'items_list_navigation' => __( 'Works list navigation'),
        'items_list'            => __( 'Works list'),
        'featured_image'        => __( 'Work featured image'),
        'set_featured_image'    => __( 'Set work featured image'),
        'remove_featured_image' => __( 'Remove work featured image'),
        'use_featured_image'    => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'works' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
    );

    // calls on args which calls the labels array
    // only thing we care about as developers is the fwd-work
    // everything above is just for the back end
    register_post_type( 'fwd-work', $args );


    // Testimonial CPT
    $labels = array(
        'name'               => _x( 'Testimonials', 'post type general name'  ),
        'singular_name'      => _x( 'Testimonial', 'post type singular name'  ),
        'menu_name'          => _x( 'Testimonials', 'admin menu'  ),
        'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'testimonial' ),
        'add_new_item'       => __( 'Add New Testimonial' ),
        'new_item'           => __( 'New Testimonial' ),
        'edit_item'          => __( 'Edit Testimonial' ),
        'view_item'          => __( 'View Testimonial'  ),
        'all_items'          => __( 'All Testimonials' ),
        'search_items'       => __( 'Search Testimonials' ),
        'parent_item_colon'  => __( 'Parent Testimonials:' ),
        'not_found'          => __( 'No testimonials found.' ),
        'not_found_in_trash' => __( 'No testimonials found in Trash.' ),
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        // ngl dont really need this because we dont link directly to a testimonials page but alas
        'rewrite'            => array( 'slug' => 'testimonials' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array( 'title', 'editor' ),
        'template'           => array( array( 'core/quote' ) ),
        'template_lock'      => 'all',
    );
    
    register_post_type( 'fwd-testimonial', $args );


    // Services CPT



    
    // Job Postings CPT
    $labels = array(
        'name'                  => _x( 'Job Postings', 'post type general name' ),
        'singular_name'         => _x( 'Job Posting', 'post type singular name' ),
        'menu_name'             => _x( 'Job Postings', 'admin menu' ),
        'name_admin_bar'        => _x( 'Job Posting', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'service'  ),
        'add_new_item'          => __( 'Add New Job Posting'  ),
        'new_item'              => __( 'New Job Posting' ),
        'edit_item'             => __( 'Edit Job Posting' ),
        'view_item'             => __( 'View Job Posting' ),
        'all_items'             => __( 'All Job Postings'  ),
        'search_items'          => __( 'Search Job Postings' ),
        'parent_item_colon'     => __( 'Parent Job Postings:' ),
        'not_found'             => __( 'No Job Postings found.' ),
        'not_found_in_trash'    => __( 'No Job Postings found in Trash.' ),
        'insert_into_item'      => __( 'Insert into Job Posting'),
        'uploaded_to_this_item' => __( 'Uploaded to this Job Posting'),
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'careers' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-megaphone',
        'supports'           => array( 'title', 'editor' ),
        'template'           => array(
            array( 'core/heading', array( 'level' => '3', 'content' => 'Role', ) ),
            array( 'core/paragraph', array( 'placeholder' => 'Describe the role...' ) ),
            array( 'core/heading', array( 'level' => '3', 'content' => 'Requirements' ) ),
            array( 'core/list' ),
            array( 'core/heading', array( 'level' => '3', 'content' => 'Location' ) ),
            array( 'core/paragraph' ),
            array( 'core/heading', array( 'level' => '3', 'content' => 'How to Apply' ) ),
            array( 'core/paragraph' ),
        ),
        'template_lock' => 'all',
    );
    register_post_type( 'fwd-job-posting', $args );
}
add_action( 'init', 'fwd_register_custom_post_types' );


function fwd_rewrite_flush() {
    // after themes are saved, the rules are automatically saved then flushed (gotten rid of whats not used)
    fwd_register_custom_post_types();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'fwd_rewrite_flush' );
