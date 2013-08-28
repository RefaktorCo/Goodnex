<?php
/**
 * Implements hook_form_system_theme_settings_alter()
 */
function goodnex_form_system_theme_settings_alter(&$form, &$form_state) {
  
  // Main settings wrapper
  $form['options'] = array(
    '#type' => 'vertical_tabs',
    '#default_tab' => 'defaults',
    '#weight' => '-10',
    '#attached' => array(
      'css' => array(drupal_get_path('theme', 'porto') . '/css/theme-settings.css'),
    ),
  );
  
  // General
  $form['options']['general'] = array(
    '#type' => 'fieldset',
    '#title' => t('General'),
  );
                
    // Sticky Header
    $form['options']['general']['sticky_header'] = array(
      '#type' => 'checkbox',
      '#title' => t('Sticky Header'),
      '#default_value' => theme_get_setting('sticky_header'),
    );
    
  // Color
  $form['options']['color'] = array(
    '#type' => 'fieldset',
    '#title' => t('Color'),
  );  
  
    // Color Scheme
      $form['options']['color']['color_scheme'] = array(
        '#type' => 'select',
        '#title' => 'Color Scheme',
        '#default_value' => theme_get_setting('color_scheme'),
        '#options' => array(
          'color-1' => t('Light Green (default)'),
          'color-2' => t('Light Blue'),
          'color-3' => t('Purple'),
          'color-4' => t('Dark Blue'),
          'color-5' => t('Dark Green'),
          'color-6' => t('Teal'),
          'color-7' => t('Yellow'),
          'color-8' => t('Light Orange'),
          'color-9' => t('Dark Orange'),
          'color-10' => t('Pink'),
          'color-11' => t('Maroon'),
          'color-12' => t('Brown'),
          'color-13' => t('Taupe'),
          'color-14' => t('Grey'),
          'color-15' => t('Red'),
          'color-16' => t('Navy Blue'),
          'custom' => t('Custom'),
        ),
      );
      
      // Custom Color
      $form['options']['color']['custom_color'] = array(
		    '#type' => 'jquery_colorpicker',
		    '#title' => t('Color'),
		    '#default_value' => theme_get_setting('custom_color'),
		    '#states' => array (
          'visible' => array(
            'select[name=color_scheme]' => array('value' => 'custom')
          )
        )
      ); 
    
  // Layout
  $form['options']['layout'] = array(
    '#type' => 'fieldset',
    '#title' => t('Layout'),
  );  
  
    // Site Layout
    $form['options']['layout']['site_layout'] = array(
      '#type' => 'select',
      '#title' => t('Body Layout'),
      '#default_value' => theme_get_setting('site_layout'),
      '#options' => array(
        'wide' => t('Wide (default)'),
        'boxed' => t('Boxed'),
      ),
    );
    
  //Background
    $form['options']['layout']['background'] = array(
      '#type' => 'fieldset',
      '#title' => '<h3 class="options_heading">Background</h3>',
      '#states' => array (
          'visible' => array(
            'select[name=site_layout]' => array('value' => 'boxed')
          )
        )
    );
    
    // Body Background 
    $form['options']['layout']['background']['body_background'] = array(
      '#type' => 'select',
      '#title' => t('Body Background'),
      '#default_value' => theme_get_setting('body_background'),
      '#options' => array(
        'porto_backgrounds' => t('Background Image (default)'),
        'custom_background_color' => t('Background Color'),
      ),
    );
    
    // Porto Background Choices
    $form['options']['layout']['background']['background_select'] = array(
      '#type' => 'radios',
      '#title' => t('Select a background pattern:'),
      '#default_value' => theme_get_setting('background_select'),
      '#options' => array(
        'az_subtle' => 'item',
        'blizzard' => 'item',
        'bright_squares' => 'item',
        'denim' => 'item',
        'fancy_deboss' => 'item',
        'gray_jean' => 'item',
        'honey_im_subtle' => 'item',
        'linen' => 'item',
        'pw_maze_white' => 'item',
        'random_grey_variations' => 'item',
        'skin_side_up' => 'item',
        'stitched_wool' => 'item',
        'straws' => 'item',
        'subtle_grunge' => 'item',
        'textured_stripes' => 'item',
        'wild_oliva' => 'item',
        'worn_dots' => 'item',
      ),
      '#states' => array (
          'visible' => array(
            'select[name=body_background]' => array('value' => 'porto_backgrounds')
          )
        )
      );  
    
      // Custom Background Color
      $form['options']['layout']['background']['body_background_color'] =array(
        '#type' => 'jquery_colorpicker',
		    '#title' => t('Body Background Color'),
		    '#default_value' => theme_get_setting('body_background_color'),
	      '#states' => array (
	        'visible' => array(
	          'select[name=body_background]' => array('value' => 'custom_background_color')
	        )
        )
      );   
      
      // Portfolio Columns
      $form['options']['layout']['portfolio_columns'] = array(
        '#type' => 'select',
        '#title' => t('Portfolio Columns'),
        '#default_value' => theme_get_setting('portfolio_columns'),
        '#options' => array(
          'span6' => 'Two',
          'span4' => 'Three',
          'span3' => 'Four (default)',
        ),
      ); 
    
  // CSS
  $form['options']['css'] = array(
    '#type' => 'fieldset',
    '#title' => t('CSS'),
  );
  
    // User CSS
      $form['options']['css']['user_css'] = array(
        '#type' => 'textarea',
        '#title' => t('Add your own CSS'),
        '#default_value' => theme_get_setting('user_css'),
      );     
}
?>