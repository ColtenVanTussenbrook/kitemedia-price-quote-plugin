<?php

/**
*important functions to make price quote work properly
*each file should include this file in order to have access to necessary functions
**/

//enqueue bootstrap, jquery ui, and external css
function added_styles () {
  	wp_enqueue_style( 'my-bootstrap-min-css', plugin_dir_url(__FILE__) . 'Bootstrap/bootstrap.min.css');
    wp_enqueue_style( 'my-jquery-ui-css', plugin_dir_url(__FILE__) . 'jquery/jquery-ui.css');
    wp_enqueue_style( 'added-css', plugin_dir_url(__FILE__) . 'css/style.css');
  }

  add_filter( 'wp_enqueue_scripts', 'added_styles', 0 );

  function added_scripts () {
      wp_enqueue_script( 'added_jquery', plugin_dir_url( __FILE__ ) . 'js/added_jquery.js', array( 'jquery' ), '1.0', true );
      wp_enqueue_script( 'my-jquery-ui-js', plugin_dir_url(__FILE__) . 'jquery/jquery-ui.js');
    }

  add_action('wp_enqueue_scripts', 'added_scripts');

//declares $get_option_array to be able to use from admin screen
$get_option_array = get_option('option_name');

//use wp_localize_script so jquery can access data in PHP ArrayAccess
function data_to_js () {
  global $get_option_array;
    wp_localize_script( 'added_jquery', 'script_vars', array (
      'bedrooms_num' => __($get_option_array['bedroom']),
      'family_rooms_num' => __($get_option_array['family_room']),
      'living_rooms_num' => __($get_option_array['living_room']),
      'offices_num' => __($get_option_array['office']),
      'hallways_num' => __($get_option_array['hallway']),
      'stairs_num' => __($get_option_array['stair']),
      'landing_num' => __($get_option_array['landing']),
      'dining_rooms_num' => __($get_option_array['dining_room']),
      'kitchen_num' => __($get_option_array['kitchen']),
      'bathroom_num' => __($get_option_array['bathroom']),
      'sofa_3_num' => __($get_option_array['sofa_3']),
      'sofa_4_num' => __($get_option_array['sofa_4']),
      'sectional_num' => __($get_option_array['sectional']),
      'loveseat_num' => __($get_option_array['loveseat']),
      'ottoman_num' => __($get_option_array['ottoman']),
      'chaise_num' => __($get_option_array['chaise']),
      'recliner_num' => __($get_option_array['recliner']),
      'wing_back_num' => __($get_option_array['wing_back']),
      'dining_chairs_num' => __($get_option_array['dining_chair'])
    ) );
}

add_filter( 'wp_enqueue_scripts', 'data_to_js');