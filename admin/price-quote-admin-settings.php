<?php
/**
 * The admin page for Kite Media Price Quote Plugin.
 *
 * plugin name:    Kite Media Price Quote Plugin
 * plugin author:     Colten Van Tussenbrook
 */


class SettingsPage {
  private $options;

  //constructor to start

  public function __construct() {
    add_action('admin_menu', array($this, 'add_plugin_page') );
    add_action ('admin_init', array($this, 'page_init') );
  }

  //add options page

  public function add_plugin_page() {
    add_options_page ('Price Quote Admin', 'Price Quote Settings', 'manage_options', 'my-setting-admin', array($this, 'create_admin_page'));
  }

  //options page Callback

  public function create_admin_page() {
    $this->options = get_option( 'option_name' );
    ?>
      <div class="wrap">
        <h1>Price Quote Settings</h1>
        <form method="post" action="options.php">
          <?php
            settings_fields('option_group');
            do_settings_sections('my-setting-admin');
            submit_button();
          ?>
        </form>
      </div>
      <?php
  }

  //add actual settings

  public function page_init() {
    register_setting(
      'option_group',
      'option_name',
      array($this,'sanitize')
    );

    add_settings_section (
      'setting_section_id',
      'Custom Settings',
      array($this, 'print_section_info'),
      'my-setting-admin'
    );

    //carpet cleaning prices

    add_settings_field(
      'franchise_email',
      'Franchise Owner\'s email (this will only be used to receive quotes from users)',
      array($this, 'franchise_email_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'franchise_phone',
      'Franchise phone number',
      array($this, 'franchise_phone_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'bedroom',
      'Price per room',
      array($this, 'bedroom_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'hallway',
      'Price per hall',
      array($this, 'hallway_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'stair',
      'Price per stair',
      array($this, 'stair_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    //upholstery prices

    add_settings_field(
      'upholstery',
      'Upholstery price (per sq ft)',
      array($this, 'upholstery_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    //tile prices

    add_settings_field(
      'tile_grout',
      'Tile &amp; Grout Per Room',
      array($this, 'tile_grout_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    //area rug cleaning

    add_settings_field(
      'area_rug',
      'Area Rug Price (per sq ft)',
      array($this, 'area_rug_callback'),
      'my-setting-admin',
      'setting_section_id'
    );
  }

//function for text area setting
function setting_textarea_fn() {
	$options = get_option('plugin_options');
	echo "<textarea id='plugin_textarea_string' name='plugin_options[text_area]' rows='7' cols='50' type='textarea'>{$options['text_area']}</textarea>";
}
  //sanitize each setting field

  public function sanitize($input) {
    $new_input = array();

    //carpet cleaning

    if (isset($input['franchise_email']))
      $new_input['franchise_email'] = sanitize_text_field( $input['franchise_email'] );

    if (isset($input['bedroom']))
      $new_input['bedroom'] = absint( $input['bedroom'] );

    if (isset($input['hallway']))
      $new_input['hallway'] = absint( $input['hallway'] );

    if (isset($input['stair']))
      $new_input['stair'] = absint( $input['stair'] );

    //upholstery cleaning

    if (isset($input['upholstery']))
      $new_input['upholstery'] = absint( $input['upholstery'] );

    //tile & grout cleaning

    if (isset($input['tile_grout']))
      $new_input['tile_grout'] = absint( $input['tile_grout'] );

    //area rug cleaning

    if (isset($input['area_rug']))
      $new_input['area_rug'] = absint( $input['area_rug'] );

    //other items

    if (isset($input['franchise_phone']))
      $new_input['franchise_phone'] = sanitize_text_field( $input['franchise_phone'] );

    return $new_input;
  }

  //print section text

  public function print_section_info(){
    print 'Enter your price quote settings below. If you don\'t offer a particular service, leave it blank in the field below and it won\'t show up on the price quote form.<br>
           Copy and paste this shortcode <code>[price-quote]</code> to the page where you want the price quote to show up.';
  }

  //get settings option array and print one of its values

  //carpet cleaning callbacks

  public function franchise_email_callback() {
    printf(
      '<input type="email" id="franchise_email" name="option_name[franchise_email]" width="50" value="%s" />',
      isset($this->options['franchise_email']) ? esc_attr($this->options['franchise_email']) : ''
    );
  }

  public function bedroom_callback() {
    printf(
      '$<input type="text" id="bedroom" name="option_name[bedroom]" width="50" value="%s" />',
      isset($this->options['bedroom']) ? esc_attr($this->options['bedroom']) : ''
    );
  }

  public function hallway_callback() {
    printf(
      '$<input type="text" id="hallway" name="option_name[hallway]" width="50" value="%s" />',
      isset($this->options['hallway']) ? esc_attr($this->options['hallway']) : ''
    );
  }

  public function stair_callback() {
    printf(
      '$<input type="text" id="stair" name="option_name[stair]" value="%s" />',
      isset($this->options['stair']) ? esc_attr($this->options['stair']) : ''
    );
  }

  //upholstery cleaning callbacks

  public function upholstery_callback() {
    printf(
      '$<input type="text" id="upholstery" name="option_name[upholstery]" width="50" value="%s" />',
      isset($this->options['upholstery']) ? esc_attr($this->options['upholstery']) : ''
    );
  }

  //tile & grout cleaning callbacks

  public function tile_grout_callback() {
    printf(
      '$<input type="text" id="tile_grout" name="option_name[tile_grout]" width="50" value="%s" />',
      isset($this->options['tile_grout']) ? esc_attr($this->options['tile_grout']) : ''
    );
  }

  //area rug cleaning callbacks

  public function area_rug_callback() {
    printf(
      '$<input type="text" id="area_rug" name="option_name[area_rug]" width="50" value="%s" />',
      isset($this->options['area_rug']) ? esc_attr($this->options['area_rug']) : ''
    );
  }

  public function franchise_phone_callback() {
    printf(
      '<input type="text" id="franchise_phone" name="option_name[franchise_phone]" width="50" value="%s" />',
      isset($this->options['franchise_phone']) ? esc_attr($this->options['franchise_phone']) : ''
    );
  }

}

  if (is_admin() )
    $settings_page = new SettingsPage();
?>