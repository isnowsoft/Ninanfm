<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	// 从样式表获取主题名称
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'theme-textdomain' ),
		'two' => __( 'Two', 'theme-textdomain' ),
		'three' => __( 'Three', 'theme-textdomain' ),
		'four' => __( 'Four', 'theme-textdomain' ),
		'five' => __( 'Five', 'theme-textdomain' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'theme-textdomain' ),
		'two' => __( 'Pancake', 'theme-textdomain' ),
		'three' => __( 'Omelette', 'theme-textdomain' ),
		'four' => __( 'Crepe', 'theme-textdomain' ),
		'five' => __( 'Waffle', 'theme-textdomain' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( '基础设置', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'LOGO', 'theme-textdomain' ),
		'desc' => __( '高度尺寸50px。', 'theme-textdomain' ),
		'id' => 'logo',
		'std' => '',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Input Text', 'theme-textdomain' ),
		'desc' => __( 'A text input field.', 'theme-textdomain' ),
		'id' => 'example_text',
		'std' => '',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Input with Placeholder', 'theme-textdomain' ),
		'desc' => __( 'A text input field with an HTML5 placeholder.', 'theme-textdomain' ),
		'id' => 'example_placeholder',
		'placeholder' => 'Placeholder',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Textarea', 'theme-textdomain' ),
		'desc' => __( 'Textarea description.', 'theme-textdomain' ),
		'id' => 'example_textarea',
		'std' => 'Default Text',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'Input Select Small', 'theme-textdomain' ),
		'desc' => __( 'Small Select Box.', 'theme-textdomain' ),
		'id' => 'example_select',
		'std' => 'three',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array
	);

	$options[] = array(
		'name' => __( 'Input Select Wide', 'theme-textdomain' ),
		'desc' => __( 'A wider select box.', 'theme-textdomain' ),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $test_array
	);

	if ( $options_categories ) {
		$options[] = array(
			'name' => __( 'Select a Category', 'theme-textdomain' ),
			'desc' => __( 'Passed an array of categories with cat_ID and cat_name', 'theme-textdomain' ),
			'id' => 'example_select_categories',
			'type' => 'select',
			'options' => $options_categories
		);
	}

	if ( $options_tags ) {
		$options[] = array(
			'name' => __( 'Select a Tag', 'options_check' ),
			'desc' => __( 'Passed an array of tags with term_id and term_name', 'options_check' ),
			'id' => 'example_select_tags',
			'type' => 'select',
			'options' => $options_tags
		);
	}

	$options[] = array(
		'name' => __( 'Select a Page', 'theme-textdomain' ),
		'desc' => __( 'Passed an pages with ID and post_title', 'theme-textdomain' ),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages
	);

	$options[] = array(
		'name' => __( 'Input Radio (one)', 'theme-textdomain' ),
		'desc' => __( 'Radio select with default options "one".', 'theme-textdomain' ),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $test_array
	);

	$options[] = array(
		'name' => __( 'Example Info', 'theme-textdomain' ),
		'desc' => __( 'This is just some example information you can put in the panel.', 'theme-textdomain' ),
		'type' => 'info'
	);

	$options[] = array(
		'name' => __( 'Input Checkbox', 'theme-textdomain' ),
		'desc' => __( 'Example checkbox, defaults to true.', 'theme-textdomain' ),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( '顶部图片管理', 'theme-textdomain' ),
		'type' => 'heading'
	);

		$options[] = array(
		'name' => __('轮播图一', 'theme-textdomain'),
		'desc' => __('尺寸660px*350px', 'theme-textdomain'),
		'id' => 'imagebox1',
		'std' => '',
		'type' => 'upload');

		$options[] = array(
			'name' => __('轮播图一标题', 'theme-textdomain'),
			'desc' => __('轮播图一标题', 'theme-textdomain'),
			'id' => 'titlebox1',
			'std' => '',
			'type' => 'text');	
			
		$options[] = array(
			'name' => __('轮播图一链接', 'theme-textdomain'),
			'desc' => __('轮播图一链接', 'theme-textdomain'),
			'id' => 'linkbox1',
			'std' => '#',
			'type' => 'text');		
	
		$options[] = array(
			'name' => __('轮播图二', 'theme-textdomain'),
			'desc' => __('尺寸660px*350px', 'theme-textdomain'),
			'id' => 'imagebox2',
			'std' => '',
			'type' => 'upload');

		$options[] = array(
			'name' => __('轮播图二标题', 'theme-textdomain'),
			'desc' => __('轮播图二标题', 'theme-textdomain'),
			'id' => 'titlebox2',
			'std' => '',
			'type' => 'text');	
			
		$options[] = array(
			'name' => __('轮播图二链接', 'theme-textdomain'),
			'desc' => __('轮播图二链接', 'theme-textdomain'),
			'id' => 'linkbox2',
			'std' => '#',
			'type' => 'text');
			
		$options[] = array(
			'name' => __('轮播图三', 'theme-textdomain'),
			'desc' => __('尺寸660px*350px', 'theme-textdomain'),
			'id' => 'imagebox3',
			'std' => '',
			'type' => 'upload');

		$options[] = array(
			'name' => __('轮播图三标题', 'theme-textdomain'),
			'desc' => __('轮播图三标题', 'theme-textdomain'),
			'id' => 'titlebox3',
			'std' => '',
			'type' => 'text');	
			
		$options[] = array(
			'name' => __('轮播图三链接', 'theme-textdomain'),
			'desc' => __('轮播图三链接', 'theme-textdomain'),
			'id' => 'linkbox3',
			'std' => '#',
			'type' => 'text');	
			
		$options[] = array(
			'name' => __('轮播图四', 'theme-textdomain'),
			'desc' => __('尺寸660px*350px', 'theme-textdomain'),
			'id' => 'imagebox4',
			'std' => '',
			'type' => 'upload');

		$options[] = array(
			'name' => __('轮播图四标题', 'theme-textdomain'),
			'desc' => __('轮播图四标题', 'theme-textdomain'),
			'id' => 'titlebox4',
			'std' => '',
			'type' => 'text');	
			
		$options[] = array(
			'name' => __('轮播图四链接', 'theme-textdomain'),
			'desc' => __('轮播图四链接', 'theme-textdomain'),
			'id' => 'linkbox4',
			'std' => '#',
			'type' => 'text');
			
		$options[] = array(
			'name' => __('轮播图五', 'theme-textdomain'),
			'desc' => __('尺寸660px*350px', 'theme-textdomain'),
			'id' => 'imagebox5',
			'std' => '',
			'type' => 'upload');

		$options[] = array(
			'name' => __('轮播图五标题', 'theme-textdomain'),
			'desc' => __('轮播图五标题', 'theme-textdomain'),
			'id' => 'titlebox5',
			'std' => '',
			'type' => 'text');	
			
		$options[] = array(
			'name' => __('轮播图五链接', 'theme-textdomain'),
			'desc' => __('轮播图五链接', 'theme-textdomain'),
			'id' => 'linkbox5',
			'std' => '#',
			'type' => 'text');
	
		$options[] = array(
			'name' => __('聚焦一', 'theme-textdomain'),
			'desc' => __('尺寸280px*170px', 'theme-textdomain'),
			'id' => 'image_feature1',
			'std' => '',
			'type' => 'upload');

		$options[] = array(
			'name' => __('聚焦一标题', 'theme-textdomain'),
			'desc' => __('聚焦一标题', 'theme-textdomain'),
			'id' => 'title_feature1',
			'std' => '',
			'type' => 'text');	
			 
		$options[] = array(
			'name' => __('聚焦一链接', 'theme-textdomain'),
			'desc' => __('聚焦一链接', 'theme-textdomain'),
			'id' => 'link_feature1',
			'std' => '#',
			'type' => 'text');
	
		$options[] = array(
			'name' => __('聚焦二', 'theme-textdomain'),
			'desc' => __('尺寸280px*170px', 'theme-textdomain'),
			'id' => 'image_feature2',
			'std' => '',
			'type' => 'upload');

		$options[] = array(
			'name' => __('聚焦二标题', 'theme-textdomain'),
			'desc' => __('聚焦二标题', 'theme-textdomain'),
			'id' => 'title_feature2',
			'std' => '',
			'type' => 'text');	
			 
		$options[] = array(
			'name' => __('聚焦二链接', 'theme-textdomain'),
			'desc' => __('聚焦二链接', 'theme-textdomain'),
			'id' => 'link_feature2',
			'std' => '#',
			'type' => 'text');
	
	
		$options[] = array(
		'name' => __( 'Text Editor', 'theme-textdomain' ),
		'type' => 'heading'
	);

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => __( 'Default Text Editor', 'theme-textdomain' ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'theme-textdomain' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	return $options;
}