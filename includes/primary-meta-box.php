<?php

class meta_box_init {

    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'meta_box_setup' ) );
    }

    public function meta_box_setup() {

        $post_types = get_post_types();

        foreach ($post_types as $post_type) {
            if ( $post_type == 'page' ) {
                continue;
            }

            add_meta_box(
                'primary_category',
                'Primary Category',
                array( $this, 'primary_meta_box_content' ),
                $post_type,
                'side',
                'core'
            );
        }
    }

    public function primary_meta_box_content() {

        global $post;
        $primary_category = null;

        $selected_category = get_post_meta( $post->ID, 'primary_category', true );

        if ( $selected_category != null ) {
            $primary_category = $selected_category;
        }

        $post_categories = get_the_category(); ?>


        <select name="primary-category" class="primary-category">
            <?php foreach ($post_categories as $category) : ?>
                <option
                    value="<?php echo $category->name ?>"
                    <?php selected( $primary_category, $category->name, false ) ?> >
                    <?php echo $category->name; ?>
                </option>
            <?php endforeach; ?>
        </select>


    <?php }

    public function primary_field_data() {

    }

}
