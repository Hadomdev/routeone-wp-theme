<?php

if (function_exists('acf_register_block_type')) {
	add_action('acf/init', 'register_acf_block_types');
}

function register_acf_block_types() {

    $dir_path = '/template-parts/blocks/';

	acf_register_block_type(
		array(
			'name' => 'Large Slider Of Cars Images Section', 
			'title' => __('Large Slider Of Cars Images Section'),
			'render_template' => 'template-parts/blocks/large-slider-of-cars-images-section.php',
			'icon' => 'block-default',
			'keywords' => array('Large Slider Of Cars Images Section'),
	  	)
	);
    acf_register_block_type(
		array(
			'name' => 'Services Cards Section', 
			'title' => __('Services Cards Section'),
			'render_template' => 'template-parts/blocks/services-cards-section.php',
			'icon' => 'block-default',
			'keywords' => array('Services Cards Section'),
	  	)
	);
    acf_register_block_type(
		array(
			'name' => 'Benefits Section', 
			'title' => __('Benefits Section'),
			'render_template' => 'template-parts/blocks/benefits-section.php',
			'icon' => 'block-default',
			'keywords' => array('Benefits Section'),
	  	)
	);
    acf_register_block_type(
		array(
			'name' => 'Text, Button and Image Banner Section', 
			'title' => __('Text, Button and Image Banner Section'),
			'render_template' => 'template-parts/blocks/text-button-and-image-section.php',
			'icon' => 'block-default',
			'keywords' => array('Text, Button and Image Banner Section'),
	  	)
	);
    acf_register_block_type(
		array(
			'name' => 'Cars Slider Section', 
			'title' => __('Cars Slider Section'),
			'render_template' => 'template-parts/blocks/cars-slider-section.php',
			'icon' => 'block-default',
			'keywords' => array('Cars Slider Section'),
	  	)
	);
    acf_register_block_type(
		array(
			'name' => 'Services Texts Section', 
			'title' => __('Services Texts Section'),
			'render_template' => 'template-parts/blocks/services-texts-section.php',
			'icon' => 'block-default',
			'keywords' => array('Services Texts Section'),
	  	)
	);
    acf_register_block_type(
		array(
			'name' => 'Latest Posts Section', 
			'title' => __('Latest Posts Section'),
			'render_template' => 'template-parts/blocks/latest-posts-section.php',
			'icon' => 'block-default',
			'keywords' => array('Latest Posts Section'),
	  	)
	);
    acf_register_block_type(
		array(
			'name' => 'Contact Us Section', 
			'title' => __('Contact Us Section'),
			'render_template' => 'template-parts/blocks/contact-us-section.php',
			'icon' => 'block-default',
			'keywords' => array('Contact Us Section'),
	  	)
	);
    acf_register_block_type(
		array(
			'name' => 'Get a Quote Section', 
			'title' => __('Get a Quote Section'),
			'render_template' => 'template-parts/blocks/get-a-quote-section.php',
			'icon' => 'block-default',
			'keywords' => array('Get a Quote Section'),
	  	)
	);
	acf_register_block_type(
		array(
			'name' => 'FAQ section', 
			'title' => __('FAQ section'),
			'render_template' => $dir_path . 'faq-section/faq-section.php',
			'icon' => 'block-default',
            'render_callback' => 'block_render',
			'keywords' => array('FAQ'),
            'example'         => array(
                'attributes' => array(
                    'mode' => 'preview', // Important!
                    'data' => array(
                        'is_preview' => true,
                        'image' => '',
                    ),
                ),
            ),
	  	)
	);
	acf_register_block_type(
		array(
			'name' => 'Our contacts', 
			'title' => __('Our contacts'),
			'render_template' => 'template-parts/blocks/our-contacts-section.php',
			'icon' => 'block-default',
			'keywords' => array('Our contacts'),
	  	)
	);
	acf_register_block_type(
		array(
			'name' => 'Single title', 
			'title' => __('Single title'),
			'render_template' => 'template-parts/blocks/single-title-section.php',
			'icon' => 'block-default',
			'keywords' => array('Single title'),
	  	)
	);
	acf_register_block_type(
		array(
			'name' => 'How we work', 
			'title' => __('How we work'),
			'render_template' => 'template-parts/blocks/workflow-section.php',
			'icon' => 'block-default',
			'keywords' => array('How we work'),
	  	)
	);
	acf_register_block_type(
		array(
			'name' => 'Team', 
			'title' => __('Team'),
			'render_template' => 'template-parts/blocks/our-team-section.php',
			'icon' => 'block-default',
			'keywords' => array('Team'),
	  	)
	);
	acf_register_block_type(
		array(
			'name' => 'About us', 
			'title' => __('About us'),
			'render_template' => 'template-parts/blocks/abouts-section.php',
			'icon' => 'block-default',
			'keywords' => array('About us'),
	  	)
	);
    acf_register_block_type(
        array(
            'name' => 'Services',
            'title' => __('Services'),
            'render_template' => 'template-parts/blocks/services-section.php',
            'icon' => 'block-default',
            'keywords' => array('Services'),
        )
    );

    acf_register_block_type( array(
        'name'            => 'text-content-image',
        'title'           => __( 'Text, content and image' ),
        'description'     => __( 'Section with text, content left and image right' ),
        'category'        => 'blocks-category',
        'render_callback' => 'block_render',
        'render_template' => $dir_path . 'text-content-image/text-content-image.php',
        'icon'            => 'align-right',
        'example'         => array(
            'attributes' => array(
                'mode' => 'preview', // Important!
                'data' => array(
                    'is_preview' => true,
                    'image' => '',
                ),
            ),
        ),
    ) );

    acf_register_block_type( array(
        'name'            => 'price-section',
        'title'           => __( 'Price' ),
        'description'     => __( 'Section with price' ),
        'category'        => 'blocks-category',
        'render_callback' => 'block_render',
        'render_template' => $dir_path . 'price-section/price-section.php',
        'icon'            => 'align-right',
        'example'         => array(
            'attributes' => array(
                'mode' => 'preview', // Important!
                'data' => array(
                    'is_preview' => true,
                    'image' => '',
                ),
            ),
        ),
    ) );

    acf_register_block_type( array(
        'name'            => 'methods-section',
        'title'           => __( 'Payment Methods' ),
        'description'     => __( 'Section with payment methods' ),
        'category'        => 'blocks-category',
        'render_callback' => 'block_render',
        'render_template' => $dir_path . 'methods-section/methods-section.php',
        'icon'            => 'align-right',
        'example'         => array(
            'attributes' => array(
                'mode' => 'preview', // Important!
                'data' => array(
                    'is_preview' => true,
                    'image' => '',
                ),
            ),
        ),
    ) );

    acf_register_block_type( array(
        'name'            => 'small-cars-slider',
        'title'           => __( 'Small car slider' ),
        'description'     => __( 'Section with small car slider' ),
        'category'        => 'blocks-category',
        'render_callback' => 'block_render',
        'render_template' => $dir_path . 'small-cars-slider/small-cars-slider.php',
        'icon'            => 'align-right',
        'example'         => array(
            'attributes' => array(
                'mode' => 'preview', // Important!
                'data' => array(
                    'is_preview' => true,
                    'image' => '',
                ),
            ),
        ),
    ) );

    acf_register_block_type( array(
        'name'            => 'transfer-section',
        'title'           => __( 'Transfer section' ),
        'description'     => __( 'Section with transfers' ),
        'category'        => 'blocks-category',
        'render_callback' => 'block_render',
        'render_template' => $dir_path . 'transfer-section/transfer-section.php',
        'icon'            => 'align-right',
        'example'         => array(
            'attributes' => array(
                'mode' => 'preview', // Important!
                'data' => array(
                    'is_preview' => true,
                    'image' => '',
                ),
            ),
        ),
    ) );

    acf_register_block_type( array(
        'name'            => 'testimonials-slider',
        'title'           => __( 'Testimonials slider' ),
        'description'     => __( 'Section with testimonials slider' ),
        'category'        => 'blocks-category',
        'render_callback' => 'block_render',
        'render_template' => $dir_path . 'testimonials-slider/testimonials-slider.php',
        'icon'            => 'align-right',
        'example'         => array(
            'attributes' => array(
                'mode' => 'preview', // Important!
                'data' => array(
                    'is_preview' => true,
                    'image' => '',
                ),
            ),
        ),
    ) );

    acf_register_block_type( array(
        'name'            => 'other-services-section',
        'title'           => __( 'Other services' ),
        'description'     => __( 'Section with other services' ),
        'category'        => 'blocks-category',
        'render_callback' => 'block_render',
        'render_template' => $dir_path . 'other-services-section/other-services-section.php',
        'icon'            => 'align-right',
        'example'         => array(
            'attributes' => array(
                'mode' => 'preview', // Important!
                'data' => array(
                    'is_preview' => true,
                    'image' => '',
                ),
            ),
        ),
    ) );

    acf_register_block_type( array(
        'name'            => 'form-image-block',
        'title'           => __( 'Form - image' ),
        'description'     => __( 'Section with form on the left and image on the right' ),
        'category'        => 'blocks-category',
        'render_callback' => 'block_render',
        'render_template' => $dir_path . 'form-image-block/form-image-block.php',
        'icon'            => 'align-right',
        'example'         => array(
            'attributes' => array(
                'mode' => 'preview', // Important!
                'data' => array(
                    'is_preview' => true,
                    'image' => '',
                ),
            ),
        ),
    ) );

    acf_register_block_type( array(
        'name'            => 'transfer-overview',
        'title'           => __( 'Transfer overview' ),
        'description'     => __( 'Section with Transfer overview table' ),
        'category'        => 'blocks-category',
        'render_callback' => 'block_render',
        'render_template' => $dir_path . 'transfer-overview/transfer-overview.php',
        'icon'            => 'align-right',
        'example'         => array(
            'attributes' => array(
                'mode' => 'preview', // Important!
                'data' => array(
                    'is_preview' => true,
                    'image' => '',
                ),
            ),
        ),
    ) );

    acf_register_block_type( array(
        'name'            => 'services-hero',
        'title'           => __( 'Services Hero' ),
        'description'     => __( 'Section with banner, breadcrumbs, title and excerpt' ),
        'category'        => 'blocks-category',
        'render_callback' => 'block_render',
        'render_template' => $dir_path . 'services-hero/services-hero.php',
        'icon'            => 'align-right',
        'example'         => array(
            'attributes' => array(
                'mode' => 'preview', // Important!
                'data' => array(
                    'is_preview' => true,
                    'image' => '',
                ),
            ),
        ),
    ) );

    acf_register_block_type( array(
        'name'            => 'image-block',
        'title'           => __( 'Image block' ),
        'description'     => __( 'Section with image' ),
        'category'        => 'blocks-category',
        'render_callback' => 'block_render',
        'render_template' => $dir_path . 'image-block/image-block.php',
        'icon'            => 'align-right',
        'example'         => array(
            'attributes' => array(
                'mode' => 'preview', // Important!
                'data' => array(
                    'is_preview' => true,
                    'image' => '',
                ),
            ),
        ),
    ) );

    acf_register_block_type( array(
        'name'            => 'transfer-form',
        'title'           => __( 'Transfer from' ),
        'description'     => __( 'Section with form and route' ),
        'category'        => 'blocks-category',
        'render_callback' => 'block_render',
        'render_template' => $dir_path . 'transfer-form/transfer-form.php',
        'icon'            => 'align-right',
        'example'         => array(
            'attributes' => array(
                'mode' => 'preview', // Important!
                'data' => array(
                    'is_preview' => true,
                    'image' => '',
                ),
            ),
        ),
    ) );

}

// Showing preview image
function block_render( $block ) {

    if ( get_field( 'is_preview' ) ) {
        echo $block['data']['image'];

        return;
    }

    require get_template_directory() . $block['render_template'];

}

?>