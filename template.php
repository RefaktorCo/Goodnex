<?php 
/**
 * Define $root global variable.
 */
global $theme_root, $parent_root, $theme_path;
$theme_root = base_path() . path_to_theme();
$parent_root = base_path() . drupal_get_path('theme', 'goodnex');



function goodnex_html_head_alter(&$head_elements) {
	unset($head_elements['system_meta_generator']);
	foreach ($head_elements as $key => $element) {
		if (isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'canonical') {
		  unset($head_elements[$key]);
		}
		if (isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'shortlink') {
		  unset($head_elements[$key]);
		}
  }
}

/**
 * Assign theme hook suggestions for custom templates.
 */  
function goodnex_preprocess_page(&$vars, $hook) {
  if (isset($vars['node'])) {
    $suggest = "page__node__{$vars['node']->type}";
    $vars['theme_hook_suggestions'][] = $suggest;
  }
  
  $status = drupal_get_http_header("status");  
  if($status == "404 Not Found") {      
    $vars['theme_hook_suggestions'][] = 'page__404';
  }
  
  if (arg(0) == 'taxonomy' && arg(1) == 'term' ){
    $term = taxonomy_term_load(arg(2));
    $vars['theme_hook_suggestions'][] = 'page--taxonomy--vocabulary--' . $term->vid;
  }
}

/**
 * Define some variables for use in theme templates.
 */
function goodnex_process_page(&$variables) {	
  // Assign site name and slogan toggle theme settings to variables.
  $variables['disable_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['disable_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
   // Assign site name/slogan defaults if there is no value.
  if ($variables['disable_site_name']) {
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['disable_site_slogan']) {
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}	

/**
 * Preprocess variables for the username.
 */
function goodnex_preprocess_username(&$vars) {
  global $theme_key;
  $theme_name = $theme_key;
  
  // Add rel=author for SEO and supporting search engines
  if (isset($vars['link_path'])) {
    $vars['link_attributes']['rel'][] = 'author';
  }
  else {
    $vars['attributes_array']['rel'][] = 'author';
  }
}

function goodnex_menu_link(array $variables) {
  //unset all the classes
  unset($variables['element']['#attributes']['class']);
  $element = $variables['element'];
  $sub_menu = '';
  
  if($variables['element']['#attributes']) {
    $sub_menu = '';
  }

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  
  // if link class is active, make li class as active too
  if(strpos($output,"active")>0){
    $element['#attributes']['class'][] = "current-menu-item";
  }
  
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function goodnex_menu_tree(&$variables) {
  return '<ul>' . $variables['tree'] . '</ul>';
}

/**
 * Allow sub-menu items to be displayed.
 */
function goodnex_links($variables) {
  if (array_key_exists('id', $variables['attributes']) && $variables['attributes']['id'] == 'main-menu-links') {
  	$pid = variable_get('menu_main_links_source', 'main-menu');
	$tree = menu_tree($pid);
	return drupal_render($tree);
  }
  return theme_links($variables);
}


/**
 * Overrides theme_item_list().
 */
function goodnex_item_list($vars) {
  if (isset($vars['attributes']['class']) && in_array('pager', $vars['attributes']['class'])) {
    unset($vars['attributes']['class']);
    foreach ($vars['items'] as $i => &$item) {
      if (in_array('pager-current', $item['class'])) {
        $item['class'] = array('active');
        $item['data'] = '<a href="#">' . $item['data'] . '</a>';
      }
      elseif (in_array('pager-ellipsis', $item['class'])) {
        $item['class'] = array('disabled');
        $item['data'] = '<a href="#">' . $item['data'] . '</a>';
      }
    }
    return '<div class="pagination pagination-large pull-right">' . theme_item_list($vars) . '</div>';
  }
  return theme_item_list($vars);
}

/**
 * Add a comma delimiter between several field types.
 */
function goodnex_field($variables) {
 
  $output = '';
 
  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';  
  }
  
  elseif ($variables['element']['#field_name'] == 'field_tags') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }
         
  else {
    $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
    // Default rendering taken from theme_field().
    foreach ($variables['items'] as $delta => $item) {
      $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
      $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
    }
    $output .= '</div>';
    // Render the top-level DIV.
    $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';
  }
  
  // Render the top-level DIV.
  return $output;
}

/**
 * User CSS function. Separate from goodnex_preprocess_html so function can be called directly before </head> tag.
 */
function goodnex_user_css() {
  echo "<!-- User defined CSS -->";
  echo "<style type='text/css'>";
  echo theme_get_setting('user_css');
  echo "</style>";
  echo "<!-- End user defined CSS -->";	
}

/**
 * Add theme META tags and style sheets to the header.
 */
function goodnex_preprocess_html(&$vars){
  global $parent_root;
  
  $viewport = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' =>  'width=device-width, initial-scale=1, maximum-scale=1',
    )
  );
  
  drupal_add_html_head( $viewport, 'viewport');

}

?>