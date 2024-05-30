<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('active_link'))
{
     function activate_menu($controller)
     {
          // Get CI instance
          $CI = get_instance();
          // Fetch class name.
          $class = $CI->router->fetch_class();
          // Return class active as a string.
          return ($class == $controller) ? 'active' : '';
     }
}