<?php
/**
*this file contains the function that will actually send the email
**/

include_once (plugin_dir_path(__FILE__ ) . '/helper-functions.php');
include_once (plugin_dir_path(__FILE__ ) . '/html-output.php');

function send_mail() {

  global $get_option_array;

  //personal info variables
  $first_name = isset($_POST['first-name']) ? $_POST['first-name'] : '';
  $last_name = isset($_POST['last-name']) ? $_POST['last-name'] : '';
  $email_address = isset($_POST['email_address']) ? $_POST['email_address'] : '';
  $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
  $address = isset($_POST['address']) ? $_POST['address'] : '';
  $address_2 = isset($_POST['address_2']) ? $_POST['address_2'] : '';
  $city = isset($_POST['city']) ? $_POST['city'] : '';
  $state = isset($_POST['state']) ? $_POST['state'] : '';

  //sanitize all input
  $first_name_sanitize = esc_attr($first_name);
  $last_name_sanitize = esc_attr($last_name);
  $email_address_sanitize = esc_attr($email_address);
  $phone_number_sanitize = esc_attr($phone_number);
  $address_sanitize = esc_attr($address);
  $address_2_sanitize = esc_attr($address_2);
  $city_sanitize = esc_attr($city);
  $state_sanitize = esc_attr($state);

  $check_human = isset($_POST['message_human']) ? $_POST['message_human'] : '';
  $check_human_clean = sanitize_text_field($check_human);

  //carpet cleaning variables
  $bedrooms_num = isset($_POST['bedrooms_selection']) ? $_POST['bedrooms_selection'] : '';
  $family_rooms_num = isset($_POST['family_room_selection']) ? $_POST['family_room_selection'] : '';
  $living_rooms_num = isset($_POST['living_room_selection']) ? $_POST['living_room_selection'] : '';
  $office_num = isset($_POST['office_selection']) ? $_POST['office_selection'] : '';
  $hallway_num = isset($_POST['hallway_selection']) ? $_POST['hallway_selection'] : '';
  $stairs_num = isset($_POST['stair_selection']) ? $_POST['stair_selection'] : '';
  $landings_num = isset($_POST['landing_selection']) ? $_POST['landing_selection'] : '';
  $dining_room_num = isset($_POST['dining_room_selection']) ? $_POST['dining_room_selection'] : '';
  $kitchen_num = isset($_POST['kitchen_selection']) ? $_POST['kitchen_selection'] : '';
  $bathroom_num = isset($_POST['bathroom_selection']) ? $_POST['bathroom_selection'] : '';

  //upholstery cleaning variables
  $sofa_3_num = isset($_POST['sofa_3_selection']) ? $_POST['sofa_3_selection'] : '';
  $sofa_4_num = isset($_POST['sofa_4_selection']) ? $_POST['sofa_4_selection'] : '';
  $sectional_num = isset($_POST['sectional_selection']) ? $_POST['sectional_selection'] : '';
  $loveseat_num = isset($_POST['loveseat_selection']) ? $_POST['loveseat_selection'] : '';
  $ottoman_num = isset($_POST['ottoman_selection']) ? $_POST['ottoman_selection'] : '';
  $chaise_num = isset($_POST['chaise_selection']) ? $_POST['chaise_selection'] : '';
  $recliner_num = isset($_POST['recliner_selection']) ? $_POST['recliner_selection'] : '';
  $wing_back_num = isset($_POST['wing_back_selection']) ? $_POST['wing_back_selection'] : '';
  $dining_chair_num = isset($_POST['dining_chairs_selection']) ? $_POST['dining_chairs_selection'] : '';

  //calculate prices for each input
  $bedrooms_price = $bedrooms_num * $get_option_array['bedroom'];
  $family_rooms_price = $family_rooms_num * $get_option_array['family_room'];
  $living_rooms_price = $living_rooms_num * $get_option_array['living_room'];
  $offices_price = $office_num * $get_option_array['office'];
  $hallways_price = $hallway_num * $get_option_array['hallway'];
  $stairs_price = $stairs_num * $get_option_array['stair'];
  $landings_price = $landings_num * $get_option_array['landing'];
  $dining_rooms_price = $dining_room_num * $get_option_array['dining_room'];
  $kitchens_price = $kitchen_num * $get_option_array['kitchen'];
  $bathrooms_price = $bathroom_num * $get_option_array['bathroom'];

  $sofa_3_price = $sofa_3_num * $get_option_array['sofa_3'];
  $sofa_4_price = $sofa_4_num * $get_option_array['sofa_4'];
  $sectional_price = $sectional_num * $get_option_array['sectional'];
  $loveseat_price = $loveseat_num * $get_option_array['loveseat'];
  $ottoman_price = $ottoman_num * $get_option_array['ottoman'];
  $chaise_price = $chaise_num * $get_option_array['chaise'];
  $recliner_price = $recliner_num * $get_option_array['recliner'];
  $wing_back_price = $wing_back_num * $get_option_array['wing_back'];
  $dining_chair_price = $dining_chair_num * $get_option_array['dining_chair'];

  //create array of services Selected
  $services = array();

  if (!empty($_POST['bedrooms_selection'])){
  	$services[]=' Bedrooms: '.$_POST['bedrooms_selection'];
  }
  if(!empty($_POST['family_room_selection'])){
  	$services[]=' Family Rooms: '.$_POST['family_room_selection'];
  }
  if(!empty($_POST['living_room_selection'])){
  	$services[]=' Living Rooms: '.$_POST['living_room_selection'];
  }
  if(!empty($_POST['office_selection'])){
  	$services[]=' Offices: '.$_POST['office_selection'];
  }
  if(!empty($_POST['hallway_selection'])){
  	$services[]=' Hallways: '.$_POST['hallway_selection'];
  }
  if(!empty($_POST['stair_selection'])){
  	$services[]=' Stairs: '.$_POST['stair_selection'];
  }
  if(!empty($_POST['landing_selection'])){
  	$services[]=' Stair Landings: '.$_POST['landing_selection'];
  }
  if(!empty($_POST['dining_room_selection'])){
  	$services[]=' Dining Rooms: '.$_POST['dining_room_selection'];
  }
  if(!empty($_POST['kitchen_selection'])){
  	$services[]=' Kitchens: '.$_POST['kitchen_selection'];
  }
  if(!empty($_POST['bathroom_selection'])){
  	$services[]=' Bathrooms: '.$_POST['bathroom_selection'];
  }

  if(!empty($_POST['sofa_3_selection'])){
  	$services[]=' Sofa (seats 3): '.$_POST['sofa_3_selection'];
  }
  if(!empty($_POST['sofa_4_selection'])){
  	$services[]=' Sofa (seats 4): '.$_POST['sofa_4_selection'];
  }
  if(!empty($_POST['sectional_selection'])){
  	$services[]=' Sectionals: '.$_POST['sectional_selection'];
  }
  if(!empty($_POST['loveseat_selection'])){
  	$services[]=' Loveseats: '.$_POST['loveseat_selection'];
  }
  if(!empty($_POST['ottoman_selection'])){
  	$services[]=' Ottomans: '.$_POST['ottoman_selection'];
  }
  if(!empty($_POST['chaise_selection'])){
  	$services[]=' Chaises: '.$_POST['chaise_selection'];
  }
  if(!empty($_POST['recliner_selection'])){
  	$services[]=' Recliners: '.$_POST['recliner_selection'];
  }
  if(!empty($_POST['wing_back_selection'])){
  	$services[]=' Wing Back Chairs: '.$_POST['wing_back_selection'];
  }
  if(!empty($_POST['dining_chairs_selection'])){
  	$services[]=' Dining Room Chairs: '.$_POST['dining_chairs_selection'];
  }

  //additional services
  $additionalServices = array();
  if(!empty($_POST['area_rug'])) {
  	$additionalServices[] = ' More information on area rug cleaning services requested';
  }
  if(!empty($_POST['tile_grout'])) {
  	$additionalServices[] = ' More information on tile and grout cleaning services requested';
  }
  if(!empty($_POST['request_pet_urine_analysis'])) {
  	$additionalServices[] = ' Pet urine analysis';
  }
  if(!empty($_POST['request_spot_removal'])) {
  	$additionalServices[] = ' Free spot removal analysis';
  }

  //other info from customer input
  $hear_about_us = isset($_POST['hear_about_us']) ? $_POST['hear_about_us'] : '';
  $hear_about_us_clean = sanitize_text_field($hear_about_us);

  $date_requested = isset($_POST['preferred_date']) ? $_POST['preferred_date'] : '';
  $date_requested_sanitize = esc_attr($date_requested);

  //calculate the total price
  $totalPrice = $bedrooms_price + $family_rooms_price + $living_rooms_price + $offices_price + $hallways_price + $stairs_price + $landings_price + $dining_rooms_price + $kitchens_price + $bathrooms_price;
  $totalPrice += $sofa_3_price + $sofa_4_price + $sectional_price + $loveseat_price + $ottoman_price + $chaise_price + $recliner_price + $wing_back_price + $dining_chair_price;

  //create email message
  $message = " Name: $first_name_sanitize $last_name_sanitize \n Email: $email_address_sanitize \n Phone Number 1: $phone_number_sanitize \n Address: $address_sanitize \n Address Line 2: $address_2_sanitize \n City: $city_sanitize \n State: $state_sanitize \n
Services Needed: \n" .implode("\n",$services) . "\n\n Additional Services Requested: \n" .implode("\n",$additionalServices) . "\n\n Date Requested: $date_requested_sanitize \n\n How did you hear about us?: $hear_about_us_clean \n\n Price Quoted: $$totalPrice";

  //create email array to send to multiple email addresses
  $email_array = array($get_option_array['franchise_email'], $email_address_sanitize, "colten@kitemedia.com");
  $subject = "Price Quote Submission";
  $to = $email_array;
      if (isset($_POST['submit-clicked'])) {
          if ($check_human_clean != 2) {
            echo '<div>';
            echo '<p class="error">Human verfication is incorrect. Please try again.</p>';
          }
          else {
            if (wp_mail($to, $subject, $message)) {
              echo '<div class="container">';
              echo '<p class="success">Thanks for submitting a price quote! The franchise owner will be in touch shortly. If you don\'t hear back, please call us at ';
              echo $get_option_array['franchise_phone'];
              echo '</p>';
              echo '</div>';
            }
            else {
              echo '<p class="error">An error occured while processing your price quote. Please contact the franchise owner at ';
              echo $get_option_array['franchise_phone'];
              echo '</p>';
            }
          }
        }
      }
    ?>