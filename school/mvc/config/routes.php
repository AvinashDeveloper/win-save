<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    /*function __autoload( $classname )
    {
        if ( strpos($classname, 'CI_') !== 0 ) {
            $file = APPPATH . 'libraries/' . $classname . '.php';
            if ( file_exists($file) && is_file($file) ) 
            {
                @include_once( $file );
            }
        }
    }*/

    $route['version']            = 'app/version';
    $route['default_controller'] = 'signin/index';
   // $route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
