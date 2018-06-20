<?php
/**
*this file contains the function that will actually send the email
**/

include_once (plugin_dir_path(__FILE__ ) . '/helper-functions.php');
include_once (plugin_dir_path(__FILE__ ) . '/html-output.php');


function send_mail() {

  global $get_option_array;

  //personal info variables
  $full_name = isset($_POST['full-name']) ? $_POST['full-name'] : '';
  $email_address = isset($_POST['email_address']) ? $_POST['email_address'] : '';
  $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
  $address = isset($_POST['address']) ? $_POST['address'] : '';
  $city = isset($_POST['city']) ? $_POST['city'] : '';
  $state = isset($_POST['state']) ? $_POST['state'] : '';

  //sanitize all input
  $full_name_sanitize = esc_attr($full_name);
  $email_address_sanitize = esc_attr($email_address);
  $phone_number_sanitize = esc_attr($phone_number);
  $address_sanitize = esc_attr($address);
  $city_sanitize = esc_attr($city);
  $state_sanitize = esc_attr($state);

  $check_human = isset($_POST['message_human']) ? $_POST['message_human'] : '';
  $check_human_clean = sanitize_text_field($check_human);

  //carpet cleaning variables
  $bedrooms_num = isset($_POST['bedrooms_selection']) ? $_POST['bedrooms_selection'] : '';
  $hallway_num = isset($_POST['hallway_selection']) ? $_POST['hallway_selection'] : '';
  $stairs_num = isset($_POST['stair_selection']) ? $_POST['stair_selection'] : '';

  //upholstery cleaning variables
  $upholstery_num = isset($_POST['upholstery_selection']) ? $_POST['upholstery_selection'] : '';

  //tile & grout cleaning variables
  $tile_grout_num = isset($_POST['tile_grout_selection']) ? $_POST['tile_grout_selection'] : '';

  //area rug cleaning variables
  $area_rug_num = isset($_POST['area_rug_selection']) ? $_POST['area_rug_selection'] : '';

  //commerical & purt checkboxes
  $additionalServices = array();
  if(!empty($_POST['commercial_cleaning'])) {
    $additionalServices[] = ' Commercial cleaning quote requested';
  }
  if(!empty($_POST['purt'])) {
    $additionalServices[] = ' Free pet urine analysis requested';
  }

  //calculate prices for each input
  $bedrooms_price = $bedrooms_num * $get_option_array['bedroom'];
  $hallways_price = $hallway_num * $get_option_array['hallway'];
  $stairs_price = $stairs_num * $get_option_array['stair'];

  $upholstery_price = $upholstery_num * $get_option_array['upholstery'];

  $tile_grout_price = $tile_grout_num * $get_option_array['tile_grout'];

  $area_rug_price = $area_rug_num * $get_option_array['area_rug'];

  //create array of services Selected
  $services = array();

  if (!empty($_POST['bedrooms_selection'])){
  	$services[]=' Rooms: '.$_POST['bedrooms_selection'];
  }
  if(!empty($_POST['hallway_selection'])){
  	$services[]=' Hallways: '.$_POST['hallway_selection'];
  }
  if(!empty($_POST['stair_selection'])){
  	$services[]=' Stairs: '.$_POST['stair_selection'];
  }
  if(!empty($_POST['upholstery_selection'])){
  	$services[]=' Upholstery Sq Ft: '.$_POST['upholstery_selection'];
  }
  if(!empty($_POST['tile_grout_selection'])){
  	$services[]=' Tile/Grout Rooms: '.$_POST['tile_grout_selection'];
  }
  if(!empty($_POST['area_rug_selection'])){
  	$services[]=' Area Rug Sq Ft: '.$_POST['area_rug_selection'];
  }

  //other info from customer input
  $hear_about_us = isset($_POST['hear_about_us']) ? $_POST['hear_about_us'] : '';
  $hear_about_us_clean = sanitize_text_field($hear_about_us);

  $date_requested = isset($_POST['preferred_date']) ? $_POST['preferred_date'] : '';
  $date_requested_sanitize = esc_attr($date_requested);

  //calculate the total price
  $totalPrice = $bedrooms_price + $hallways_price + $stairs_price;
  $totalPrice += $upholstery_price + $tile_grout_price + $area_rug_price;

  //create email message
  $message = " Name: $full_name_sanitize <br> Email: $email_address_sanitize <br> Phone Number: $phone_number_sanitize <br> Street Address: $address_sanitize <br> City: $city_sanitize <br> State: $state_sanitize <br><br>
Services Needed: <br>" .implode("<br>",$services) . "<br><br> Additional Services Requested: <br>" .implode("<br>",$additionalServices) . "<br><br> Date Requested: $date_requested_sanitize <br><br> How did you hear about us?: $hear_about_us_clean <br><br> Price Quoted: $$totalPrice";

  //create email array to send to multiple email addresses
  $email_array = array($get_option_array['franchise_email'], $email_address_sanitize, "colten@kitemedia.com");
  $subject = "Price Quote Submission";
  $to = $email_array;
  $redirect_url = "https://www.gschemdryuplandrancho.com/price-quote-thank-you";
      if (isset($_POST['submit-clicked'])) {
          if ($check_human_clean != 2) {
            echo '<div>';
            echo '<p class="error">Human verfication is incorrect. Please try again.</p>';
            echo '</div>';
          }
          else {
            if (wp_mail($to, $subject, $message)) {
              // echo '<div id="dialog" title="Price Quote Submitted">';
              // echo '<div id="popmake-233">';
              echo '<div>';
              echo '<p>Your price quote has been sent successfuly. We\'ll be in touch shortly. If you don\'t hear from us, please give us a call directly at (909) 982-9999. Thank you!</p>';
              echo '</div>';
              // ob_start();
              //   wp_redirect($redirect_url);
              //   die();
            }
            else {
              echo '<p class="error">An error occured while processing your price quote. Please contact the franchise owner at ';
              echo $get_option_array['franchise_phone'];
              echo '</p>';
            }
          }
        }
      }
