<?php

/**
 * Implements theme_links() targeting the main menu specifically
 * Outputs Foundation Nav bar http://foundation.zurb.com/docs/navigation.php
 * 
 */
function dgph_links__system_main_menu($vars) {
  // Get all the main menu links
  $menu_links = menu_tree_output(menu_tree_all_data('main-menu'));
  
  // Initialize some variables to prevent errors
  $output = '';
  $sub_menu = '';

  foreach ($menu_links as $key => $link) {
    // Add special class needed for Foundation dropdown menu to work
    !empty($link['#below']) ? $link['#attributes']['class'][] = 'has-flyout' : '';

    // Render top level and make sure we have an actual link
    if (!empty($link['#href'])) {
      $output .= '<li' . drupal_attributes($link['#attributes']) . '><span>' . l($link['#title'], $link['#href']);
      // Get sub navigation links if they exist
      foreach ($link['#below'] as $key => $sub_link) {
        if (!empty($sub_link['#href'])) {
          $sub_menu .= '<li><span>' . l($sub_link['#title'], $sub_link['#href']) . '</span></li>';
        }
        
      }
      $output .= !empty($link['#below']) ? '<a href="#" class="flyout-toggle"><span> </span></a><ul class="flyout">' . $sub_menu . '</ul>' : '';
      
      // Reset dropdown to prevent duplicates
      unset($sub_menu);
      $sub_menu = '';
      
      $output .=  '</span></li>';
    }
  }
  return '<ul class="nav-bar">' . $output . '</ul>';
}


/**
 * Implements hook_preprocess_block()
 */
function dgph_foundation_preprocess_block(&$vars) {
  // Convenience variable for block headers.
  $title_class = &$vars['title_attributes_array']['class'];

  // Generic block header class.
  $title_class[] = 'block-title';


  // Add a unique class for each block for styling.
  $vars['classes_array'][] = $vars['block_html_id'];

}

/**
 * Implements template_preprocess_html().
 * 
 */
function dgph_preprocess_html(&$vars) {
  $browser = getBrowser();
  $vars['classes_array'][] = $browser['name'];

    drupal_add_library('system', 'ui.accordion');
}


/**
 * Implements template_theme().
 */
function dgph_theme() {
    $items = array();
    // create custom user-login.tpl.php
    $items['user_login'] = array(
            'render element' => 'form',
            '#attributes' => array('class' => array('custom')),
            'path' => drupal_get_path('theme', 'dgph') . '/templates',
            'template' => 'user--login'
        );
    global $user;
    $account = user_load($user->uid);
    $vars = array(
            'elements' => array('#account' => $account)
        );
    $items['user_profile'] = array(
            'render element' => 'form',
            '#attributes' => array('class' => array('custom')),
            'path' => drupal_get_path('theme', 'dgph') . '/templates',
            'template' => 'user--profile',
            'variables' => $vars
        );
    return $items;
}


/**
 * Implements Remove css, and add css.
 */
function dgph_css_alter(&$css) {
  if(arg(0)=='blog'){
	  unset($css[drupal_get_path('theme','dgph').'/css/custom.css']);
	  unset($css[drupal_get_path('theme','dgph').'/css/foundation.min.css']);
  }
  //$css = array_diff_key($css);
}

/**
 * Implements template_preprocess_page
 *
 * Add convenience variables and template suggestions
 */
function dgph_preprocess_page(&$variables) {

if(arg(0)=='blog'){
	drupal_add_css(drupal_get_path('theme', 'dgph') . '/css/dgph.css');
	drupal_add_css(drupal_get_path('theme', 'dgph') . '/css/style.css');
	drupal_add_css(drupal_get_path('theme', 'dgph') . '/css/dgph_responsive.css');
}
  // Add page--node_type.tpl.php suggestions
  if (!empty($variables['node'])) {
    $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;

	if($variables['node']->type=='blog'){
		drupal_set_title('News');
		drupal_add_css(drupal_get_path('theme', 'dgph') . '/css/dgph.css');
		drupal_add_css(drupal_get_path('theme', 'dgph') . '/css/style.css');
		drupal_add_css(drupal_get_path('theme', 'dgph') . '/css/dgph_responsive.css');
	}

  }

  $variables['logo_img'] = '';
  if (!empty($variables['logo'])) {
    $variables['logo_img'] = theme('image', array(
      'path'  => $variables['logo'],
      'alt'   => strip_tags($variables['site_name']) . ' ' . t('logo'),
      'title' => strip_tags($variables['site_name']) . ' ' . t('Home'),
            'attributes' => array(
        'class' => array('logo'),
      ),
    ));
  }

  $variables['linked_logo']  = '';
  if (!empty($variables['logo_img'])) {
    $variables['linked_logo'] = l($variables['logo_img'], '<front>', array(
      'attributes' => array(
        'rel'   => 'home',
        'title' => strip_tags($variables['site_name']) . ' ' . t('Home'),
      ),
      'html' => TRUE,
    ));
  }

  $variables['linked_site_name'] = '';
  if (!empty($variables['site_name'])) {
    $variables['linked_site_name'] = l($variables['site_name'], '<front>', array(
      'attributes' => array(
        'rel'   => 'home',
        'title' => strip_tags($variables['site_name']) . ' ' . t('Home'),
      ),
    ));
  }

  // Site navigation links.
  $variables['main_menu_links'] = '';
  if (isset($variables['main_menu'])) {
    $variables['main_menu_links'] = theme('links__system_main_menu', array(
      'links' => $variables['main_menu'],
      'attributes' => array(
        'id' => 'main-menu',
        'class' => array('main-nav'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      ),
    ));
  }

  $variables['secondary_menu_links'] = '';
  if (isset($variables['secondary_menu'])) {
    $variables['secondary_menu_links'] = theme('links__system_secondary_menu', array(
      'links' => $variables['secondary_menu'],
      'attributes' => array(
        'id'    => 'secondary-menu',
        'class' => array('secondary', 'link-list'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      ),
    ));
  }

  // Convenience variables
  $left = $variables['page']['sidebar_first'];
  $right = $variables['page']['sidebar_second'];

  // Dynamic sidebars
  if (!empty($left) && !empty($right)) {
    $variables['main_grid'] = 'six push-three';
    $variables['sidebar_first_grid'] = 'three pull-six';
    $variables['sidebar_sec_grid'] = 'three';
  } elseif (empty($left) && !empty($right)) {
    $variables['main_grid'] = 'nine';
    $variables['sidebar_first_grid'] = '';
    $variables['sidebar_sec_grid'] = 'three';
  } elseif (!empty($left) && empty($right)) {
    $variables['main_grid'] = 'nine push-three';
    $variables['sidebar_first_grid'] = 'three pull-nine';
    $variables['sidebar_sec_grid'] = '';
  } else {
    $variables['main_grid'] = 'twelve';
    $variables['sidebar_first_grid'] = '';
    $variables['sidebar_sec_grid'] = '';
  }
}


/**
 * Implements hook_form_alter()
 * Example of using foundation sexy buttons
 */
function dgph_form_alter(&$form, &$form_state, $form_id) {
    // custom forms
    if ($form_id == 'user_login') {
        $form['#attributes'] = array('class' => 'custom');
    }
}


/**
* Add unique class (mlid) to all menu items.
*/
function dgph_menu_link(array $variables) {

  $element = $variables['element'];
  
  $sub_menu = $element['#below'] ? drupal_render($element['#below']) : '';

  $output = l("<span>".$element['#title']."</span>", $element['#href'], array('html'=>'true'));

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}


/**
* Alter the search form.
*/
function dgph_form_search_block_form_alter(&$form){
    $form['search_block_form']['#title_display'] = 'before';
} 


/**
* Alter the search form.
*/
function login_profile() {
global $user;
$result = '';
	if ($user->uid) {
		$result = '<h2 class="my-account"><a href="/user">MY ACCOUNT</a></h2>';
	} else {
		$result = '<h2 class="login"><a href="/user">LOGIN</a></h2>';
		$result.= '<p>No Account yet?<br /><a href="/user/register"><b>Sign up</b></a> here!</p>';
	}
	return $result;
}


/**
* Add browser class in body.
*/
function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
   
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'ie';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'netscape';
        $ub = "Netscape";
    }
   
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
   
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
   
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
   
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
} // enf function.




