<?php
/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function pia_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' › ', $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * Override or insert variables into the maintenance page template.
 */
function pia_preprocess_maintenance_page(&$vars) {
  // While markup for normal pages is split into page.tpl.php and html.tpl.php,
  // the markup for the maintenance page is all in the single
  // maintenance-page.tpl.php template. So, to have what's done in
  // phptemplate_preprocess_html() also happen on the maintenance page, it has to be
  // called here.
  pia_preprocess_html($vars);
}

function pia_preprocess_html(&$vars) {
	$term_names = '';
  // Add conditional CSS for IE6.
  drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 8', '!IE' => FALSE), 'preprocess' => FALSE));
   if ($node = menu_get_object()) {
	if(isset($node->field_category_ow["und"])){
		$term_names = get_terms_names_arr($node->field_category_ow["und"]);
	}elseif(isset($node->field_category_news["und"])){
		$term_names = get_terms_names_arr($node->field_category_news["und"]);
	}elseif(isset($node->field_category_events["und"])){
		$term_names = get_terms_names_arr($node->field_category_events["und"]);
	}
	if(is_array($term_names)){
		foreach($term_names as $term_name){
			$vars['classes_array'][] = drupal_html_class('node-taxonomy-' . $term_name);
		}
	}
   }
}

function get_terms_names_arr($terms){
	$terms_names_arr = array();
	if(is_array($terms)){
		foreach($terms as $nterm_id){
			$nterm = taxonomy_term_load($nterm_id["tid"]);
			$terms_names_arr[] = $nterm->name;
		}
	}
	return $terms_names_arr;
}

/**
 * Override or insert variables into the page template.
 */
function pia_preprocess_page(&$vars) {
	$tmp_arr = '';
  if (isset($vars['node'])) {
  // If the node type is "blog" the template suggestion will be "page--blog.tpl.php".
  $tmp_arr = $vars['theme_hook_suggestions'];
  array_splice($tmp_arr, 2, count($tmp_arr), array_merge(array('page__'. $vars['node']->type), array_slice($tmp_arr, 2))); 
   $vars['theme_hook_suggestions'] = $tmp_arr;
  }
  // Move secondary tabs into a separate variable.
  $vars['tabs2'] = array(
    '#theme' => 'menu_local_tasks',
    '#secondary' => $vars['tabs']['#secondary'],
  );
  unset($vars['tabs']['#secondary']);

  if (isset($vars['main_menu'])) {
    $vars['primary_nav'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'inline', 'main-menu'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['primary_nav'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_nav'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'inline', 'secondary-menu'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['secondary_nav'] = FALSE;
  }

  // Prepare header.
  $site_fields = array();
  if (!empty($vars['site_name'])) {
    $site_fields[] = $vars['site_name'];
  }
  if (!empty($vars['site_slogan'])) {
    $site_fields[] = $vars['site_slogan'];
  }
  $vars['site_title'] = implode(' ', $site_fields);
  if (!empty($site_fields)) {
    $site_fields[0] = '<span>' . $site_fields[0] . '</span>';
  }
  $vars['site_html'] = implode(' ', $site_fields);

  // Set a variable for the site name title and logo alt attributes text.
  $slogan_text = $vars['site_slogan'];
  $site_name_text = $vars['site_name'];
  $vars['site_name_and_slogan'] = $site_name_text . ' ' . $slogan_text;
}

/**
 * Override or insert variables into the node template.
 */
function pia_preprocess_node(&$vars) {
	$tmp_arr = '';
	if(arg(1) == 'term' && $vars["type"] == 'events'){
		$_term = taxonomy_term_load(arg(2));
		if($_term){
			$vars['theme_hook_suggestions'] = array('node__'.$vars["type"].'__'. drupal_html_class($_term->name));
		}
	}
  $vars['submitted'] = $vars['date'] . ' — ' . $vars['name'];
  $vars['content']['links'] = FALSE;
}

/**
 * Override or insert variables into the comment template.
 */
function pia_preprocess_comment(&$vars) {
  $vars['submitted'] = $vars['created'] . ' — ' . $vars['author'];
}

/**
 * Override or insert variables into the block template.
 */
function pia_preprocess_block(&$vars) {
	if($vars["block"]->region == 'home_content' || $vars["block"]->region == 'social'){
		$vars['classes_array'][] = 'box';
	}
}

/**
 * Override or insert variables into the region template.
 */
function pia_preprocess_region(&$vars) {
  if ($vars['region'] == 'content' && isset($vars['classes_array'])) {
    $vars['classes_array'] = array();
  }
}

/**
 * Styles the menu for a Menu Block module. This function is called inside templates/menu-block-wrapper.tpl.php
 */
function menu_block_links($variables=array(), $level=1) {
  $links = $variables['links'];
	if(isset($variables['open_close'])){
		$open_close = true;
	}else{
		$open_close = false;
	}
	global $language_url;
	$output = '';
  if (is_array($links) && count($links) > 0) {
	$attributes = $variables['attributes'];
	array_pop($links);
	array_pop($links);
    $output .= '<ul' . drupal_attributes($attributes) . '>';
    $num_links = count($links);
    foreach ($links as $link) {
		$children_count = false;
		$children = $link['#below'];
		if(!empty($children))
			$children_count = true;
      $class = $link['#attributes']['class'];
	  if($level == '1' && $open_close){
		$class[] = 'alt';
	  }elseif($children_count && $level == '1'){
		$class[] = 'drop';
	  }
      if(count($class)){
		if(!array_search("active", $class)) $class = str_replace("active-trail", "active", $class);
        $class = ' class="'.implode(' ', $class).'"';
      }
      else{
        $class = '';
      }
      $output .= '<li' . $class . '>';
      if (isset($link['#href'])) {
		if($level == '1' && $open_close && $children_count){
			$output .= 	'<em>
					<span class="opener">&#160;</span>
					'.l($link['#title'], $link['#href'], $link).'
				</em>';
		}elseif($level == '1' && $open_close){
			$output .= 	'<em class="default">
					'.l($link['#title'], $link['#href'], $link).'
				</em>';
		}elseif($level == '1' && !$open_close){
			$output .= l2($link['#title'], $link['#href'], $link);
		}else{
			$output .= l($link['#title'], $link['#href'], $link);
		}
      }
      if($children_count){
          $level++;
          $vars = array();
          $vars['links'] = $children;
          $vars['attributes'] = array('class' => 'level-'.$level);
		  $vars['open_close'] = $open_close;
		  if($open_close){
			$output .= menu_block_links($vars, $level);
		  }else{
			$output .= '<div class="drop-block"><div class="holder"><div>'.menu_block_links($vars, $level).'</div></div></div>';
		  }
		  $level--;
      }
      $output .= "</li>\n";
    }
    $output .= '</ul>';
  }
  return $output;
}

function l2($text, $path, $options = array()) {
  global $language;

  // Merge in defaults.
  $options += array(
      'attributes' => array(),
      'html' => FALSE,
    );

  // Append active class.
  if (($path == $_GET['q'] || ($path == '<front>' && drupal_is_front_page())) &&
      (empty($options['language']) || $options['language']->language == $language->language)) {
    if (isset($options['attributes']['class'])) {
      $options['attributes']['class'] .= ' active';
    }
    else {
      $options['attributes']['class'] = 'active';
    }
  }

  // Remove all HTML and PHP tags from a tooltip. For best performance, we act only
  // if a quick strpos() pre-check gave a suspicion (because strip_tags() is expensive).
  if (isset($options['attributes']['title']) && strpos($options['attributes']['title'], '<') !== FALSE) {
    $options['attributes']['title'] = strip_tags($options['attributes']['title']);
  }

  return '<span><a href="'. check_url(url($path, $options)) .'"'. drupal_attributes($options['attributes']) .'>'. ($options['html'] ? $text : check_plain($text)) .'</a></span>';
}
