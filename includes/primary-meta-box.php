<?php

class meta_box_init {

    // Constructor
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'meta_box_setup' ) );
        add_action( 'save_post', array( $this, 'meta_box_meta' ) );
    }

    public function meta_box_setup() {

        // Get all post types
        $post_types = get_post_types();

        foreach ( $post_types as $post_type ) {

            if ( $post_type == 'page' ) {
                continue;
            }

            add_meta_box(
                'primary_category',
                'Choose Primary Category',
                array( $this, 'meta_box_content' ),
                $post_type,
                'side',
                'core'
            );
        }
    }

    public function meta_box_content() {

        global $post;

        $primary_category = null;

        $selected_category = get_post_meta( $post->ID, 'primary_category', true );

        // Set primary_category value
        if ( $selected_category != null ) {
            $primary_category = $selected_category;
        }

    	$post_categories = get_the_category();

    	$html = '<select name="primary_category" id="primary_category">';

    	foreach( $post_categories as $category ) {
    		$html .= '<option value="' . $category->name . '" '  . $category->name;
            $html .= selected( $primary_category, $category->name, false ) . '>';
            $html .= $category->name . '</option>';
    	}

    	$html .= '</select>';

        // Check if categories are present
        if($post_categories) {
            echo $html;
        } else {
            echo 'Categories are not assigned to this post.';
        }

    }

    public function meta_box_meta() {

        global $post;

        // Check if the current user has permission to edit the post and sanitize
        $new_meta_value = ( isset( $_POST['primary_category'] ) ? sanitize_text_field( $_POST['primary_category'] ) : '' );

        // Set meta_key value
        $meta_key = 'primary_category';

        $meta_value = get_post_meta( $post->ID, $meta_key, true );

        // Update meta key is new value doesn't match previous
        if ( $new_meta_value && $new_meta_value != $meta_value )
            update_post_meta( $post->ID, $meta_key, $new_meta_value );

    }

}
