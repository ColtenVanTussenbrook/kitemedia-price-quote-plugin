<?php

/**
*this file contains the html output for the price quote submission
**/
include_once (plugin_dir_path(__FILE__ ) . '/helper-functions.php');

function price_quote_display() {
  global $get_option_array;

  //check if get_option_array is all 0s
  $tmp = array_filter($get_option_array);

if (empty($tmp))
 {
  echo "<h4>The franchise owner hasn't set any prices yet. Please check back later or visit the <a href='/'>Homepage</a> for contact info.</h4>";
}

else {
  echo '<form name="quote" id="price-quote" method="post" action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '">'
  ?>
  <div class="container" style="padding-top:0px;">
    <div id="tabs">
        <ul class="nav nav-tabs">
            <li v-bind:class="{ active: tab === 1}" v-on:click="tab = 1"><a>Carpet Cleaning</a></li>
            <li v-bind:class="{ active: tab === 2}" v-on:click="tab = 2"><a>Upholstery Cleaning</a></li>
            <li v-bind:class="{ active: tab === 3}" v-on:click="tab = 3"><a>Area Rug Cleaning</a></li>
            <li v-bind:class="{ active: tab === 4}" v-on:click="tab = 4"><a>Tile &amp; Grout Cleaning</a></li>
        </ul>
    <div class="tab-content">
       <div class="tab-pane" v-bind:class="{ active: tab === 1}">
         <?php
              if ($get_option_array['bedroom'] != 0) {
                ?><br><label class="control-label" for="bedrooms">Bedrooms</label><br>
                <select class="form-control-1" id="bedrooms" name ="bedrooms_selection">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                </select>
                <?php
              }

              if ($get_option_array['family_room'] != 0) {
                ?><br><label class="control-label" for="family_rooms">Family Rooms</label><br>
                <select class="form-control-1" id="family_rooms" name="family_room_selection">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                <?php
              }

              if ($get_option_array['living_room'] != 0) {
                ?><br><label class="control-label" for="living_rooms">Living Rooms</label><br>
                <select class="form-control-1" id="living_rooms" name="living_room_selection">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                <?php
              }

              if ($get_option_array['office'] != 0) {
              ?><br><label class="control-label" for="home_offices">Home Offices</label><br>
              <select class="form-control-1" id="home_offices" name="office_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
              <?php
            }

              if ($get_option_array['hallway'] != 0) {
              ?><br><label class="control-label" for="hallways">Hallways</label><br>
              <select class="form-control-1" id="hallways" name="hallway_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <?php
            }

              if ($get_option_array['stair'] != 0) {
              ?><br><label class="control-label" for="stairs">Stairs</label><br>
              <select class="form-control-1" id="stairs" name="stair_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
              </select>
              <?php
            }

              if ($get_option_array['landing'] != 0) {
              ?><br><label class="control-label" for="landings">Landings</label><br>
              <select class="form-control-1" id="landings" name="landing_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <?php
            }

              if ($get_option_array['dining_room'] != 0) {
              ?><br><label class="control-label" for="dining_rooms">Dining Rooms</label><br>
              <select class="form-control-1" id="dining_rooms" name="dining_room_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <?php
            }

              if ($get_option_array['kitchen'] != 0) {
              ?><br><label class="control-label" for="kitchens">Kitchens</label><br>
              <select class="form-control-1" id="kitchens" name="kitchen_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <?php
            }

              if ($get_option_array['bathroom'] != 0) {
              ?><br><label class="control-label" for="bathrooms">Bathrooms</label><br>
              <select class="form-control-1" id="bathrooms" name="bathroom_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <?php
            }
            ?>
       </div>
      <div class="tab-pane" v-bind:class="{ active: tab === 2}">
          <?php
            if ($get_option_array['sofa_3'] != 0) {
              ?><br><label class="control-label" for="sofa_3">Sofas (3 seats)</label><br>
              <select class="form-control-1" id="sofa_3" name ="sofa_3_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <?php
            }

            if ($get_option_array['sofa_4'] != 0) {
              ?><br><label class="control-label" for="sofa_4">Sofas (4 seats)</label><br>
              <select class="form-control-1" id="sofa_4" name ="sofa_4_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <?php
            }

            if ($get_option_array['sectional'] != 0) {
              ?><br><label class="control-label" for="sectional">Sectionals</label><br>
              <select class="form-control-1" id="sectional" name ="sectional_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <?php
            }

            if ($get_option_array['loveseat'] != 0) {
              ?><br><label class="control-label" for="loveseats">Loveseats</label><br>
              <select class="form-control-1" id="loveseats" name ="loveseat_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <?php
            }

            if ($get_option_array['ottoman'] != 0) {
              ?><br><label class="control-label" for="ottomans">Ottomans</label><br>
              <select class="form-control-1" id="ottomans" name ="ottoman_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <?php
            }

            if ($get_option_array['chaise'] != 0) {
              ?><br><label class="control-label" for="chaises">Chaises</label><br>
              <select class="form-control-1" id="chaises" name ="chaise_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <?php
            }

            if ($get_option_array['recliner'] != 0) {
              ?><br><label class="control-label" for="recliners">Recliners</label><br>
              <select class="form-control-1" id="recliners" name ="recliner_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <?php
            }

            if ($get_option_array['wing_back'] != 0) {
              ?><br><label class="control-label" for="wing_backs">Wing Back Chairs</label><br>
              <select class="form-control-1" id="wing_backs" name ="wing_back_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <?php
            }

            if ($get_option_array['dining_chair'] != 0) {
              ?><br><label class="control-label" for="dining_chairs">Dining Chairs</label><br>
              <select class="form-control-1" id="dining_chairs" name ="dining_chairs_selection">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
              </select>
              <?php
            }
            ?>
          </div>
        <div class="tab-pane" v-bind:class="{ active: tab === 3}">
            <br><input type="checkbox" name="area_rug" id="area_rug">
            <label for="num_input">Check the box if you'd like to know more about our area rug cleaning service</label>
        </div>
        <div class="tab-pane" v-bind:class="{ active: tab === 4}">
            <br><input type="checkbox" name="tile_grout" id="tile_grout">
            <label for="num_input">Check the box if you'd like to know more about our tile &amp; grout cleaning service</label>
        </div>

  <!--show calculated price from jquery-->
  <div class="total-price">
    <br><h2>Total Price: $<span id="output1" name="total_price"></span></h2>
  </div>

  <div class="price-check">
    <br><p>If this price looks good to you and you would like to request an appointment, complete the form below and we will contact you to confirm the details.</p>
  </div>
 </div>
</div>
  <?php
  //declare variables in order to sanitize input
    $first_name_input = "First Name*";
    $last_name_input = "Last Name*";
    $email_input = "Email*";
    $phone_input = "Phone Number*";
    $address_line_1_input = "Address Line 1";
    $address_line_2_input = "Address Line 2";
    $city_input = "City";
    $state_input = "State";
    //$zip_input = "Zip";
    $hear_about_input = "How did you hear about us?";
    $input_placeholder = "For example, you may have found our website on: Google, Yahoo, Bing, Email, Facebook, Yelp, Internet Ad, Referall from friend/family, etc.";
  ?>

  <!--contact form-->
  <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                 <label for="text_id" class="control-label"><?php echo esc_attr($first_name_input); ?></label>
                 <input type="text" class="form-control" id="text_id" name="first-name" value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>" pattern="[A-z ]+" maxlength="15" required="required" tabindex="1" />
                </div>
                <div class="form-group">
                  <label for="email_id" class="control-label"><?php echo esc_attr($email_input); ?></label>
                  <input type="email" class="form-control" id="email_id" name="email_address" value="<?php echo isset($_POST['email_address']) ? $_POST['email_address'] : '' ?>" required="required" tabindex="3" />
                </div>
                <div class="form-group">
                  <label for="text_id" class="control-label"><?php echo esc_attr($address_line_1_input); ?></label>
                  <input type="text" class="form-control" id="address_id" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" maxlength="30" tabindex="5" />
                </div>
                <div class="form-group">
                  <label for="text_id" class="control-label"><?php echo esc_attr($city_input); ?></label>
                  <input type="text" class="form-control" id="city_id" name="city" value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>" maxlength="30" tabindex="7" />
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                  <label for="text_id" class="control-label"><?php echo esc_attr($last_name_input); ?></label>
                  <input type="text" class="form-control" id="text_id" name="last-name" value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : '' ?>" pattern="[A-z ]+" maxlength="25" required="required" tabindex="2" />
                </div>
                <div class="form-group">
                 <label for="phone" class="control-label"><?php echo esc_attr($phone_input); ?> <span style="font-size:14px;">xxx-xxx-xxxx</span></label>
                 <input type="text" class="form-control" id="phone_id" value="xxx-xxx-xxxx" name="phone_number" value="<?php echo isset($_POST['phone_number']) ? $_POST['phone_number'] : '' ?>" pattern="[0-9]{3}[-][0-9]{3}[-][0-9]{4}" maxlength="12" required="required" tabindex="4" />
               </div>
               <div class="form-group">
                 <label for="text_id" class="control-label"><?php echo esc_attr($address_line_2_input); ?></label>
                 <input type="text" class="form-control" id="address_id_2" name="address_2" value="<?php echo isset($_POST['address_2']) ? $_POST['address_2'] : '' ?>" maxlength="10" tabindex="6" />
               </div>
               <div class="form-group">
                 <label for="text_id" class="control-label"><?php echo esc_attr($state_input); ?></label>
                 <input type="text" class="form-control" id="state_id" name="state" value="<?php echo isset($_POST['state']) ? $_POST['state'] : '' ?>" maxlength="15" tabindex="8" />
               </div>
          </div>
      </div>
    </div>

    <div class="container">
   		<div class="pick-date">
   			<!--datepicker jquery-->
   			<h3>Pick a Date: <input type="text" id="datepicker" name="preferred_date" /></h3>
        <p>**Please request a date at least 1-2 days in advance. We cannot guarantee availability on the date you select. We will contact you soon to confirm an available date and time for your cleaning.</p><br>
   		</div>

       <!--how did you hear about Chem-Dry-->
       <div class="form-group hear-about">
         <label for="text_id" class="control-label"><?php echo esc_attr($hear_about_input); ?></label>
         <textarea id="head_about_id" rows="5" cols="80" name="hear_about_us" placeholder="<?php echo esc_attr($input_placeholder); ?>" /></textarea>
       </div>

   	<!--free information submission-->
   		<div class="form-group">
      			<label for="checkbox" id="info_request" class="control-label" />Additional Information</label><br>
      			<input type="checkbox" name="request_pet_urine_analysis" value="yes" checked>I would like to receive a free pet urine analysis.<br>
      			<input type="checkbox" name="request_spot_removal" value="yes" checked>I would like to request a free spot removal analysis<br>
   		</div>

      <div class="human-verification">
        <p><label for="message_human">Human Verification: <span>*</span> <br><input type="text" style="width: 60px;" name="message_human" maxlength="1"> + 3 = 5</label></p>
        <br>
      </div>
   			<input type="submit" value="Submit" name="submit-clicked" class="quote-button">


  </form>
<!--end of form-->
  <?php
    if ($get_option_array['franchise_phone'] != 0) {
      echo '<div class="contact-blurb">Contact the franchise owner at ';
      echo $get_option_array[franchise_phone];
      echo ' if you have any questions on pricing.</div>';
    }
} ?>
</div>

<!--add vue for nav tabs instead of Bootstrap JS-->
<script src="https://unpkg.com/vue@2.1.10/dist/vue.js"></script>
<script>
    new Vue({
      el: '#tabs',
      data: {
        // Tab 1 is selected by default
        tab: 1
      }
      });
</script>
<?php } ?>