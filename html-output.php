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
            <li v-bind:class="{ active: tab === 3}" v-on:click="tab = 3"><a>Tile &amp; Grout Cleaning</a></li>
            <li v-bind:class="{ active: tab === 4}" v-on:click="tab = 4"><a>Area Rug Cleaning</a></li>
            <li v-bind:class="{ active: tab === 5}" v-on:click="tab = 5"><a>Commercial Cleaning</a></li>
            <li v-bind:class="{ active: tab === 6}" v-on:click="tab = 6"><a>Pet Urine Removal</a></li>

        </ul>
    <div class="tab-content">
       <div class="tab-pane" v-bind:class="{ active: tab === 1}">
         <?php
              if ($get_option_array['bedroom'] != 0) {
                ?><br><label class="control-label" for="bedrooms">Rooms</label><br>
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
              ?><br><label class="control-label" for="stairs">Stairs (# of steps in staircase)</label><br>
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
          ?>
       </div>
      <div class="tab-pane" v-bind:class="{ active: tab === 2}">
          <?php
            if ($get_option_array['upholstery'] != 0) {
              ?><br><label class="control-label" for="upholstery">Upholstery</label><br>
              <select class="form-control-1" id="upholstery" name="upholstery_selection">
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
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
              </select>
              <span>Sq Ft</span>
              <?php
             }
            ?>
          </div>
        <div class="tab-pane" v-bind:class="{ active: tab === 3}">
          <?php
            if ($get_option_array['tile_grout'] != 0) {
              ?><br><label class="control-label" for="tile_grout">Rooms</label><br>
              <select class="form-control-1" id="tile_grout" name ="tile_grout_selection">
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
        ?>
        </div>
        <div class="tab-pane" v-bind:class="{ active: tab === 4}">
          <?php
            if ($get_option_array['area_rug'] != 0) {
              ?><br><label class="control-label" for="area_rug">Area Rug Cleaning</label><br>
              <select class="form-control-1" id="area_rug" name ="area_rug_selection">
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
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
              </select>
              <span>Sq Ft</span>
            <?php
          }
        ?>
        </div>
        <div class="tab-pane" v-bind:class="{ active: tab === 5}">
          <div class="added-info" style="background-color: #fff; padding: 25px;">
            <h3 class="added-info-header" style="color: #005daa">Commercial Cleaning</h3>
            <p>Golden State Chem-Dry offers professional commercial carpet and upholstery cleaning. Our commercial cleaning service is geared towards creating a healthy
               office or other work environment, while also maintaining a professional image. Check the box and fill out your information below for a free price quote, or give
               us a call at <a href="tel:9099829999">(909) 982-9999</a> to get a quote over the phone.</p>
               <br><input type="checkbox" name="commercial_cleaning" id="commercial_cleaning">
         </div>
       </div>
         <div class="tab-pane" v-bind:class="{ active: tab === 6}">
           <div class="added-info" style="background-color: #fff; padding: 25px;">
             <h3 class="added-info-header" style="color: #005daa">P.U.R.T.</h3>
             <p>Chem-Dry's proprietary Pet Urine Removal Treatment, or P.U.R.T., is designed to find and eliminate pet urine stains and odors in your home. Instead of just
                masking the odor like many companies do, Chem-Dry removes the source of the stain and odor by going deep into the carpet. Our amazing odor removal product will completely eliminate
                any trace of pet urine in your home. Give Golden State Chem-Dry a call at <a href="tel:9099829999">(909) 982-9999</a> to set up a free pet urine removal analysis, or select the
                checkbox and fill out your information below and we'll get in touch!</p>
                <br><input type="checkbox" name="purt" id="purt">
          </div>

        </div>

  <!--show calculated price from jquery-->
  <div class="total-price">
    <br><h2>Total Price: $<span id="output1" name="total_price"></span></h2>
  </div>

  <div class="price-check">
    <br><p>If this price looks good to you and you would like to request an appointment, complete the form below and we will contact you to confirm the details.</p>
    <br><p>*Note: There is a $120 minimum charge for all services.</p>
  </div>
 </div>
</div>
</div>
  <?php
  //declare variables in order to sanitize input
    $full_name_input = "Name (first &amp; last)*";
    $email_input = "Email*";
    $phone_input = "Phone Number*";
    $street_address_input = "Street address";
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
                 <label for="text_id" class="control-label"><?php echo esc_attr($full_name_input); ?></label>
                 <input type="text" class="form-control" id="text_id" name="full-name" value="<?php echo isset($_POST['full-name']) ? $_POST['full-name'] : '' ?>" pattern="[A-z ]+" maxlength="23" required="required" tabindex="5" />
                </div>
                <div class="form-group">
                 <label for="phone" class="control-label"><?php echo esc_attr($phone_input); ?> <span style="font-size:14px;">xxx-xxx-xxxx</span></label>
                 <input type="text" class="form-control" id="phone_id" value="xxx-xxx-xxxx" name="phone_number" value="<?php echo isset($_POST['phone_number']) ? $_POST['phone_number'] : '' ?>" maxlength="15" required="required" tabindex="7" />
               </div>
                <div class="form-group">
                  <label for="text_id" class="control-label"><?php echo esc_attr($city_input); ?></label>
                  <input type="text" class="form-control" id="city_id" name="city" value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>" maxlength="30" tabindex="9" />
                </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="email_id" class="control-label"><?php echo esc_attr($email_input); ?></label>
                <input type="email" class="form-control" id="email_id" name="email_address" value="<?php echo isset($_POST['email_address']) ? $_POST['email_address'] : '' ?>" required="required" tabindex="6" />
              </div>
              <div class="form-group">
                <label for="text_id" class="control-label"><?php echo esc_attr($street_address_input); ?></label>
                <input type="text" class="form-control" id="address_id" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" maxlength="30" tabindex="8" />
              </div>
               <div class="form-group">
                 <label for="text_id" class="control-label"><?php echo esc_attr($state_input); ?></label>
                 <input type="text" class="form-control" id="state_id" name="state" value="<?php echo isset($_POST['state']) ? $_POST['state'] : '' ?>" maxlength="15" tabindex="10" />
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
         <textarea id="head_about_id" rows="3" cols="50" name="hear_about_us" placeholder="<?php echo esc_attr($input_placeholder); ?>" /></textarea>
       </div>

      <div class="human-verification">
        <p><label for="message_human">Human Verification: <span>*</span> <br><input type="text" style="width: 60px;" name="message_human" maxlength="1"> + 3 = 5</label></p>
        <br>
      </div>

      <input type="submit" value="Submit" name="submit-clicked" class="quote-button">

      <div class="disclaimer" style="margin-top: 15px;">
          <p style="font-size:12px;">**This quoted price may change depending on room size, extra dirty carpet/upholstery, etc.</p>
      </div>
  </form>
<!--end of form-->
  <?php
    if ($get_option_array['franchise_phone'] != 0) {
      echo '<div class="contact-blurb">Contact the franchise owner at ';
      echo $get_option_array['franchise_phone'];
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
<?php
  }
?>