<?php
/*
Plugin Name: Kite Media Price Quote Plugin
Plugin URI:  kitemedia.com/plugins
Description: Price quote feature that sends accurate quote to user and business owner.
Version:     1.0
Author:      Colten Van Tussenbrook
Author URI:  coltenv.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wporg
Domain Path: /languages
*/

//add admin settings page and mail.php
include_once (plugin_dir_path(__FILE__ ) . '/admin/price-quote-admin-settings.php');
include_once (plugin_dir_path(__FILE__ ) . '/send-mail.php');


function form_shortcode() {
  ob_start();
  send_mail();
  price_quote_display();

  return ob_get_clean();
}

  //creates shortcode
  add_shortcode('price-quote','form_shortcode');

?>