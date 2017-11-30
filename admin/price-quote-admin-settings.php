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
      'Price per bedroom',
      array($this, 'bedroom_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'family_room',
      'Price per family room',
      array($this, 'family_room_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'living_room',
      'Price per living room',
      array($this, 'living_room_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'office',
      'Price per office',
      array($this, 'office_callback'),
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

    add_settings_field(
      'landing',
      'Price per landing',
      array($this, 'landing_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'dining_room',
      'Price per dining room',
      array($this, 'dining_room_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'kitchen',
      'Price per kitchen',
      array($this, 'kitchen_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'bathroom',
      'Price per bathroom',
      array($this, 'bathroom_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    //upholstery prices

    add_settings_field(
      'sofa_3',
      'Price per sofa (3 Seats)',
      array($this, 'sofa_3_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'sofa_4',
      'Price per sofa (4 Seats)',
      array($this, 'sofa_4_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'sectional',
      'Price per sectional',
      array($this, 'sectional_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'loveseat',
      'Price per loveseat',
      array($this, 'loveseat_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'ottoman',
      'Price per ottoman',
      array($this, 'ottoman_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'chaise',
      'Price per chaise',
      array($this, 'chaise_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'recliner',
      'Price per recliner',
      array($this, 'recliner_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'wing_back',
      'Price per wing back chair',
      array($this, 'wing_back_callback'),
      'my-setting-admin',
      'setting_section_id'
    );

    add_settings_field(
      'dining_chair',
      'Price per dining chair',
      array($this, 'dining_chair_callback'),
      'my-setting-admin',
      'setting_section_id'
    );
  }

  //sanitize each setting field

  public function sanitize($input) {
    $new_input = array();

    //carpet cleaning

    if (isset($input['franchise_email']))
      $new_input['franchise_email'] = sanitize_text_field( $input['franchise_email'] );

    if (isset($input['bedroom']))
      $new_input['bedroom'] = absint( $input['bedroom'] );

    if (isset($input['family_room']))
      $new_input['family_room'] = absint( $input['family_room'] );

    if (isset($input['living_room']))
      $new_input['living_room'] = absint( $input['living_room'] );

    if (isset($input['office']))
      $new_input['office'] = absint( $input['office'] );

    if (isset($input['hallway']))
      $new_input['hallway'] = absint( $input['hallway'] );

    if (isset($input['stair']))
      $new_input['stair'] = absint( $input['stair'] );

    if (isset($input['landing']))
      $new_input['landing'] = absint( $input['landing'] );

    if (isset($input['dining_room']))
      $new_input['dining_room'] = absint( $input['dining_room'] );

    if (isset($input['kitchen']))
      $new_input['kitchen'] = absint( $input['kitchen'] );

    if (isset($input['bathroom']))
      $new_input['bathroom'] = absint( $input['bathroom'] );

    //upholstery cleaning

    if (isset($input['sofa_3']))
      $new_input['sofa_3'] = absint( $input['sofa_3'] );

    if (isset($input['sofa_4']))
      $new_input['sofa_4'] = absint( $input['sofa_4'] );

    if (isset($input['sectional']))
      $new_input['sectional'] = absint( $input['sectional'] );

    if (isset($input['loveseat']))
      $new_input['loveseat'] = absint( $input['loveseat'] );

    if (isset($input['ottoman']))
      $new_input['ottoman'] = absint( $input['ottoman'] );

    if (isset($input['chaise']))
      $new_input['chaise'] = absint( $input['chaise'] );

    if (isset($input['recliner']))
      $new_input['recliner'] = absint( $input['recliner'] );

    if (isset($input['wing_back']))
      $new_input['wing_back'] = absint( $input['wing_back'] );

    if (isset($input['dining_chair']))
      $new_input['dining_chair'] = absint( $input['dining_chair'] );

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

  public function family_room_callback() {
    printf(
      '$<input type="text" id="family_room" name="option_name[family_room]" width="50" value="%s" />',
      isset($this->options['family_room']) ? esc_attr($this->options['family_room']) : ''
    );
  }

  public function living_room_callback() {
    printf(
      '$<input type="text" id="living_room" name="option_name[living_room]" width="50" value="%s" />',
      isset($this->options['living_room']) ? esc_attr($this->options['living_room']) : ''
    );
  }

  public function office_callback() {
    printf(
      '$<input type="text" id="office" name="option_name[office]" width="50" value="%s" />',
      isset($this->options['office']) ? esc_attr($this->options['office']) : ''
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

  public function landing_callback() {
    printf(
      '$<input type="text" id="landing" name="option_name[landing]" value="%s" />',
      isset($this->options['landing']) ? esc_attr($this->options['landing']) : ''
    );
  }

  public function dining_room_callback() {
    printf(
      '$<input type="text" id="dining_room" name="option_name[dining_room]" value="%s" />',
      isset($this->options['dining_room']) ? esc_attr($this->options['dining_room']) : ''
    );
  }

  public function kitchen_callback() {
    printf(
      '$<input type="text" id="kitchen" name="option_name[kitchen]" value="%s" />',
      isset($this->options['kitchen']) ? esc_attr($this->options['kitchen']) : ''
    );
  }

  public function bathroom_callback() {
    printf(
      '$<input type="text" id="bathroom" name="option_name[bathroom]" value="%s" />',
      isset($this->options['bathroom']) ? esc_attr($this->options['bathroom']) : ''
    );
  }

  //upholstery cleaning callbacks

  public function sofa_3_callback() {
    printf(
      '$<input type="text" id="sofa_3" name="option_name[sofa_3]" width="50" value="%s" />',
      isset($this->options['sofa_3']) ? esc_attr($this->options['sofa_3']) : ''
    );
  }

  public function sofa_4_callback() {
    printf(
      '$<input type="text" id="sofa_4" name="option_name[sofa_4]" width="50" value="%s" />',
      isset($this->options['sofa_4']) ? esc_attr($this->options['sofa_4']) : ''
    );
  }

  public function sectional_callback() {
    printf(
      '$<input type="text" id="sectional" name="option_name[sectional]" width="50" value="%s" />',
      isset($this->options['sectional']) ? esc_attr($this->options['sectional']) : ''
    );
  }

  public function loveseat_callback() {
    printf(
      '$<input type="text" id="loveseat" name="option_name[loveseat]" width="50" value="%s" />',
      isset($this->options['loveseat']) ? esc_attr($this->options['loveseat']) : ''
    );
  }

  public function ottoman_callback() {
    printf(
      '$<input type="text" id="ottoman" name="option_name[ottoman]" width="50" value="%s" />',
      isset($this->options['ottoman']) ? esc_attr($this->options['ottoman']) : ''
    );
  }

  public function chaise_callback() {
    printf(
      '$<input type="text" id="chaise" name="option_name[chaise]" width="50" value="%s" />',
      isset($this->options['chaise']) ? esc_attr($this->options['chaise']) : ''
    );
  }

  public function recliner_callback() {
    printf(
      '$<input type="text" id="recliner" name="option_name[recliner]" width="50" value="%s" />',
      isset($this->options['recliner']) ? esc_attr($this->options['recliner']) : ''
    );
  }

  public function wing_back_callback() {
    printf(
      '$<input type="text" id="wing_back" name="option_name[wing_back]" width="50" value="%s" />',
      isset($this->options['wing_back']) ? esc_attr($this->options['wing_back']) : ''
    );
  }

  public function dining_chair_callback() {
    printf(
      '$<input type="text" id="dining_chair" name="option_name[dining_chair]" width="50" value="%s" />',
      isset($this->options['dining_chair']) ? esc_attr($this->options['dining_chair']) : ''
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