<?php
    /**
     * Customizer assets - Appealing
	 * Header Background Color setting
	 *
	 * Uses a color wheel to configure the Header Background Color setting.
	 *
	 * https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
     *
     * Excerpt Length for Pullquote (page excerpt enabled in functions.php)
     * Uses 'appealing_teaser_length()' to callback on page output
*/

function appealing_register_theme_customizer($wp_customize)
{

    $wp_customize->add_section('appealing_custom_teaser_length_section', array(
            'title'             => __( 'Appealing Theme Controls', 'appealing' ),
            'priority'          => 45
        ));
    $wp_customize->add_setting(
		// $id
		'appealing_header_background_image_repeat_setting',
		// $args
		array(
			'default'			=> false,
			'sanitize_callback'	=> 'appealing_sanitize_checkbox',
			'transport'			=> 'refresh'
		)
    );
    $wp_customize->add_setting(
		// $id
		'appealing_header_background_image_size_setting',
		// $args
		array(
			'default'			=> true,
			'sanitize_callback'	=> 'appealing_sanitize_checkbox',
			'transport'			=> 'refresh'
		)
);
    /** (1)
     * WP_Customize_ /add_setting for header background color
    */
	$wp_customize->add_setting(	'appealing_header_background_color_setting', array(
            'type'              => 'theme_mod',
            'default'           => '#f7f7f7',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'			=> 'refresh'
		)
	);

    /** (2)
     * WP_Customize_ /add_setting for content background color
    */
	$wp_customize->add_setting(	'appealing_page_background_color_setting', array(
            'type'              => 'theme_mod',
            'default'           => '#ffffff',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'			=> 'refresh'
		)
	);

    /** (3)anchor links color
     * WP_Customize_ /add_setting for anchor link color
    */
	$wp_customize->add_setting(	'appealing_anchor_links_color_setting', array(
            'type'              => 'theme_mod',
            'default'           => '#33679d',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'			=> 'refresh'
		)
	);

	/** (3A)appealing_pullquote_text_color
     * WP_Customize_ /add_setting for anchor link color
    */
    $wp_customize->add_setting( 'appealing_pullquote_text_color_setting', array(
            'type'              => 'theme_mod',
            'default'           => '#356767',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh'
        )
    );

    /** (4)
     * WP_Customize_ /add_setting for pullquote teaser usage
    */
	$wp_customize->add_setting(	'appealing_custom_teaser_usage_setting', array(
            'type'              => 'theme_mod',
            'default'           => 'none',
			'sanitize_callback'	=> 'sanitize_text_field',
			'transport'			=> 'refresh'
		)
	);

    /** (5)
     * WP_Customize_ /add_setting for pullquote teaser width
    */
	$wp_customize->add_setting(	'appealing_custom_teaser_width_setting', array(
            'type'              => 'theme_mod',
            'default'           => 220,
			'sanitize_callback'	=> 'appealing_sanitize_number_absint',
			'transport'			=> 'refresh'
		)
	);

    /** (6)
     * WP_Customize_ /add_setting for post excerpt words
    */
	$wp_customize->add_setting(	'appealing_posts_excerpt_length_setting', array(
            'type'              => 'theme_mod',
            'default'           => 58,
			'sanitize_callback'	=> 'appealing_sanitize_number_absint',
			'transport'			=> 'refresh'
		)
	);

    /** (7)
     * WP_Customize_ /add_setting for title visibility
    */
	$wp_customize->add_setting(	'appealing_title_visible_setting', array(
            'type'              => 'theme_mod',
            'default'           => 'atvt1',
			'sanitize_callback'	=> 'sanitize_text_field',
			'transport'			=> 'refresh'
		)
	);

    /** (8)
     * WP_Customize_ /add_setting for post header link
    */
	$wp_customize->add_setting(	'appealing_titlelink_color_setting', array(
            'type'              => 'theme_mod',
            'default'           => 'linkico-gray',
			'sanitize_callback'	=> 'sanitize_text_field',
			'transport'			=> 'refresh'
		)
	);

    /** (9)
     * WP_Customize_ /add_setting for sidebar-top image
     * Raw image to output on advert box.
     * @since 1.0.7
    */
    $wp_customize->add_setting( 'appealing_topbox_image_setting', array(
            'type'              => 'theme_mod',
            'default'           => '',
            'capability'        => 'manage_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    /** (10)
     * WP_Customize_ /add_setting for border around sidebars
     * @since 1.0.7
    */
	$wp_customize->add_setting(	'appealing_sidebar_border_setting', array(
            'type'              => 'theme_mod',
            'default'           => 'none',
			'sanitize_callback'	=> 'sanitize_text_field',
			'transport'			=> 'refresh'
		)
	);
	
	/** (11)
     * WP_Customize_ /add_setting for offscreen sidebar button text
     * @since 1.0.7
    */
	$wp_customize->add_setting(	'appealing_sidebar_text_setting', array(
            'type'              => 'theme_mod',
            'default'           => ' + ',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
    /** (12)
     * WP_Customize_ /add_setting for readon text
     * @since 1.1.8
    */
	$wp_customize->add_setting(	'appealing_readon_text_setting', array(
            'type'              => 'theme_mod',
            'default'           => __( 'Read Article', 'appealing' ),
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	/** (13)
     * WP_Customize_ /add_setting for copyright text
     * @since 1.1.9
    */
	$wp_customize->add_setting(	'appealing_copyright_text_setting', array(
            'type'              => 'theme_mod',
            'default'           => '',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	/** (14)
     * WP_Customize_ /add_setting for use mobile nav or not
     * @since 1.1.0
    */
	$wp_customize->add_setting(	'appealing_nav_walker_mobi_setting', array(
            'type'              => 'theme_mod',
            'default'           => '0',
			'sanitize_callback'	=> 'appealing_sanitize_number_absint',
			'transport'			=> 'refresh'
		)
	);
	
    /** (15)
     * WP_Customize_ /add_setting for theme instructions
    */
	$wp_customize->add_setting(	'appealing_theme_instructions_setting', array(
            'type'              => 'option',
            'default'           => '',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

//-----------------Controls-----------------------------------
    $wp_customize->add_control(
		// $id
		'appealing_header_background_image_repeat',
		// $args
		array(
			'settings'		=> 'appealing_header_background_image_repeat_setting',
			'section'		=> 'header_image',
			'type'			=> 'checkbox',
			'label'			=> __( 'Background Repeat', 'appealing' ),
			'description'	=> __( 'Should the header background image repeat?', 'appealing' ),
		)
	);

    $wp_customize->add_control(
		// $id
		'appealing_header_background_image_size',
		// $args
		array(
			'settings'		=> 'appealing_header_background_image_size_setting',
			'section'		=> 'header_image',
			'type'			=> 'checkbox',
			'label'			=> __( 'Background Stretch', 'appealing' ),
            'description'	=> __( 'Should the header background image stretch in full? 
                                Uncheck if your Background Repeat is checked!', 'appealing' ),
		)
	);

    // (1) Header and Footer background color
    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'appealing_header_background_color', array(
				'settings'		=> 'appealing_header_background_color_setting',
				'section'		=> 'colors',
                'priority'          => 1,
				'label'			=> __( 'Header, Footer and Sidebars Background', 'appealing' ),
				'description'	=> __(
                    'Select the background color of the header area,
                    the footer and sidebars', 'appealing' ),
			)
		)
    );

    // (2) WP page background color
    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'appealing_page_background_color', array(
				'settings'		=> 'appealing_page_background_color_setting',
				'section'		=> 'colors',
				'label'			=> __( 'Content Background Color', 'appealing' ),
				'description'	=> __(
                    'Sets background color of Post and Page content', 'appealing' ),
			)
		)
    );

    // (3) Anchor links color
    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'appealing_anchor_links_color', array(
				'settings'		=> 'appealing_anchor_links_color_setting',
				'section'		=> 'colors',
                'priority'          => 1,
				'label'			=> __( 'Links Color', 'appealing' ),
				'description'	=> __(
                    'Select the color for hyperlinks. May not effect everything.', 'appealing' ),
			)
		)
    );

    // (3A) Pullquote word color
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'appealing_pullquote_text_color', array(
                'settings'      => 'appealing_pullquote_text_color_setting',
                'section'       => 'colors',
                'priority'          => 1,
                'label'         => __( 'PullQuote Text Color', 'appealing' ),
                'description'   => __(
                    'Select the color for pullquote excerpt on articles.', 'appealing' ),
            )
        )
    );

    /** (4) Teaser use or not use
     * @since 1.0.7 
     */
    $wp_customize->add_control(
        'appealing_custom_teaser_usage', array(
            'settings'          => 'appealing_custom_teaser_usage_setting',
            'section'           => 'appealing_custom_teaser_length_section',
            'label'             => __( 'PullQuote Replaces Excerpt', 'appealing' ),
            'type'              => 'select',
            'choices'   => array(
                'block' => __( 'Use Excerpt as Pullquote', 'appealing' ),
                'none'  => __( 'Use default excerpt', 'appealing' ),
            ),
        )
    );

    // (5) width of teaser
    $wp_customize->add_control(
        'appealing_custom_teaser_width', array(
            'settings'          => 'appealing_custom_teaser_width_setting',
            'type'              => 'number',
            'section'           => 'appealing_custom_teaser_length_section',
            'label'             => __( 'Set Pullquote Width', 'appealing' ),
            'description'       => __( 'This sets how wide the Teaser will be.', 'appealing' ),
            'input_attrs' => array(
                'min' => 0,
                'max' => 540,
            ),
        )
    );
    
    // (6) posts excerpt length control
    $wp_customize->add_control(
        'appealing_posts_excerpt_length', array(
            'settings'          => 'appealing_posts_excerpt_length_setting',
            'type'              => 'number',
            'section'           => 'appealing_custom_teaser_length_section',
            'label'             => __( 'Set POSTS ONLY Excerpt Length', 'appealing' ),
            'input_attrs' => array(
                'min' => 0,
                'max' => 385,
            ),
        )
    );

    // (7)
    $wp_customize->add_control(
        'appealing_title_visible_toposts', array(
        'settings'  => 'appealing_title_visible_setting',
        'label'     => __( 'Title Visible only on: ', 'appealing' ),
        'section'   => 'appealing_custom_teaser_length_section',
        'type'      => 'select',
        'choices'   => array(
            'atvt1' => __( 'Posts and Pages', 'appealing' ),
            'atvt2' => __( 'Posts Only - Not Pages', 'appealing' ),
        ),
    ));

    // (8)
    $wp_customize->add_control(
        'appealing_titlelink_color', array(
        'settings' => 'appealing_titlelink_color_setting',
        'label'    => __( 'Choose color for link icon: ', 'appealing' ),
        'section'  => 'appealing_custom_teaser_length_section',
        'type'     => 'select',
        'choices'   => array(
            'linkico' => __( 'Black Link Icon', 'appealing' ),
            'linkico-red'   => __( 'Red Link Icon', 'appealing' ),
            'linkico-blu'  => __( 'Blue Link Icon', 'appealing' ),
            'linkico-grn' => __( 'Green Link Icon', 'appealing' ),
            'linkico-gray'  => __( 'Gray Link Icon', 'appealing' ),
        ),
    ));

    // (9)
    $wp_customize->add_control(
    new WP_Customize_Image_Control(
    $wp_customize,
    'appealing_topbox_image', array(
            'settings'          => 'appealing_topbox_image_setting',
            'section'           => 'appealing_custom_teaser_length_section',
            'label'             => __( 'Upload Image to Top Advert Box', 'appealing' ),
            'description'       => __( 'Upload will override any widgets.', 'appealing' ),
        )
    ));

    // (10)
    $wp_customize->add_control(
        'appealing_sidebar_border', array(
        'settings' => 'appealing_sidebar_border_setting',
        'label'    => __( 'Choose border style on sidebars.', 'appealing' ),
        'section'  => 'appealing_custom_teaser_length_section',
        'type'     => 'select',
        'choices'  => array(
            'none' => __( 'No borders', 'appealing' ),
            'thin solid rgba( 240, 240, 240, .9)'   => __( 'Show borders', 'appealing' ),
            'thin solid rgba( 240, 240, 240, .9); box-shadow: 4px 2px 3px -2px rgba(0, 0, 0, .22)'
             => __('Show borders and Box-Shadow', 'appealing' ), 
        ),
    ));
    
    // (11)
    $wp_customize->add_control(
        'appealing_sidebar_text', array(
            'settings'          => 'appealing_sidebar_text_setting',
            'type'              => 'text',
            'section'           => 'appealing_custom_teaser_length_section',
            'label'       => __( 'Wording for View Sidebar button', 'appealing' ),
        )
    );
    
    // (12)
    $wp_customize->add_control(
        'appealing_readon_text', array(
            'settings'          => 'appealing_readon_text_setting',
            'type'              => 'text',
            'section'           => 'appealing_custom_teaser_length_section',
            'label'       => __( 'Wording for Read More button', 'appealing' ),
        )
    );
    
    // (12)
    $wp_customize->add_control(
        'appealing_copyright_text', array(
            'settings'          => 'appealing_copyright_text_setting',
            'type'              => 'text',
            'section'           => 'appealing_custom_teaser_length_section',
            'label'       => __( 'Replace Footer Copyright with Text', 'appealing' ),
        )
    );
    
    /** (13) Mobile Nav @use or not use
     * @since 1.0.7 
     */
    $wp_customize->add_control(
        'appealing_nav_walker_mobi', array(
            'settings'          => 'appealing_nav_walker_mobi_setting',
            'section'           => 'appealing_custom_teaser_length_section',
            'label'             => __( 'Mobile Navigation Preference', 'appealing' ),
            'type'              => 'select',
            'choices'   => array(
                '0' => __( 'Leave Top Menu Item Selectable', 'appealing' ),
                '1'  => __( 'Use Mobile Nav (top tap only)', 'appealing' ),
            ),
        )
    );
    
    // (14)
    $wp_customize->add_control(
        'appealing_theme_instructions', array(
            'settings'          => 'appealing_theme_instructions_setting',
            'type'              => 'hidden',
            'section'           => 'appealing_custom_teaser_length_section',
            'description'       => __( 'Instructions: <b>Appearance > Theme Options</b>', 'appealing' ),
        )
    );

}
add_action( 'customize_register', 'appealing_register_theme_customizer' );


//sanitizer for integer
function appealing_sanitize_number_absint( $number, $setting ) {
  // Ensure $number is an absolute integer (whole number, zero or greater).
  $number = absint( $number );

  // If the input is an absolute integer, return it; otherwise, return the default
  return ( $number ? $number : $setting->default );
}
//sanitize for checkbox
function appealing_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


/** (1), (2), (3), (5), (8 called from template directly)
 * Writes the Header Background Anchor Links and Width of Teaser related controls'
 * values outputed to the 'head' of the document
 * by reading the value(s) from the theme mod value in the options table.
 */
function appealing_customizer_css() {
    if ( get_theme_mods() )
    :
    echo '<style type="text/css">';
        
        if ( get_theme_mod( 'appealing_header_background_color_setting' ) ) :
             $appealingheader = get_theme_mod( 'appealing_header_background_color_setting');
             echo '.site-head, .footer-footer, #sidebar-right, #sidebar-left{background: ' . esc_attr( $appealingheader ) . ';} .commentlist, article.sticky .content-header{border-color: ' . esc_attr( $appealingheader ) . ';}';
        endif;
				     
        if ( get_theme_mod( 'appealing_page_background_color_setting' ) ) :
             $appealingpage = get_theme_mod( 'appealing_page_background_color_setting');
             echo '#content {background: ' . esc_attr( $appealingpage ) . ';}';
        endif;
        
        if ( get_theme_mod( 'appealing_anchor_links_color_setting' ) ) :
             $appealinglink = get_theme_mod( 'appealing_anchor_links_color_setting');
             echo 'a, a:link, #inner-footer a {color: ' . esc_attr( $appealinglink ) . ';}';
        endif;

        if ( get_theme_mod( 'appealing_pullquote_text_color_setting' ) ) :
             $appealingquote = get_theme_mod( 'appealing_pullquote_text_color_setting');
             echo '.pullquote aside {color: ' . esc_attr( $appealingquote ) . ';}';
        endif;

        if ( get_theme_mod( 'appealing_custom_teaser_width_setting' ) ) :
             $appealingwidth = get_theme_mod( 'appealing_custom_teaser_width_setting');
             echo '.pullquote {width: ' . esc_attr( $appealingwidth ).'px;}';
        endif;

        if ( get_theme_mod( 'appealing_topbox_image_setting' ) ) :
             $appealingtopbox = get_theme_mod( 'appealing_topbox_image_setting');
             echo '#topbox-banner { background: url( ' . esc_attr($appealingtopbox) . ' ); }';
        endif;
        
        if ( get_theme_mod( 'appealing_sidebar_border_setting' ) ) :
             $appealingsidebrd = get_theme_mod( 'appealing_sidebar_border_setting', 'none');
             echo '#sidebar-left, #sidebar-right { border: ' . esc_attr( $appealingsidebrd ) .'; }';
        endif; 
    
    echo '</style>';
    endif;
}
add_action( 'wp_head', 'appealing_customizer_css');


/** (6)
 * post excerpt length
 * @return excerpt_length
 * integer value
*/
function appealing_custom_posts_excerpt_length()
{ 
    if( !is_admin()) : 
    if ( get_theme_mods( ) ) {
        $length = get_theme_mod( 'appealing_posts_excerpt_length_setting', 60 );
        return esc_attr( $length );
    }
    endif;
}
add_filter( 'excerpt_length', 'appealing_custom_posts_excerpt_length' );
