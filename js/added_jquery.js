jQuery(document).ready(function($){

  var totalPrice;

  //create variables from PHP input
  var bedroom_price = script_vars.bedrooms_num;
  var family_rooms_price = script_vars.family_rooms_num;
  var living_rooms_price = script_vars.living_rooms_num;
  var offices_price = script_vars.offices_num;
  var area_rug_price = script_vars.area_rug_price_num;
  var hallways_price = script_vars.hallways_num;
  var stairs_price = script_vars.stairs_num;
  var landing_price = script_vars.landing_num;
  var dining_room_price = script_vars.dining_rooms_num;
  var kitchen_price = script_vars.kitchen_num;
  var bathroom_price = script_vars.bathroom_num;
  var dining_chairs_price = script_vars.dining_chairs_num;
  var sofa_3_price = script_vars.sofa_3_num;
  var sofa_4_price = script_vars.sofa_4_num;
  var loveseat_price = script_vars.loveseat_num;
  var sectional_price = script_vars.sectional_num;
  var ottoman_price = script_vars.ottoman_num;
  var chaise_price = script_vars.chaise_num;
  var recliner_price = script_vars.recliner_num;
  var wing_back_price = script_vars.wing_back_num;

  //define prices as simple JS object, where keys will match the id attributes of the select tags
  prices = {
    'bedrooms': bedroom_price,
    'family_rooms': family_rooms_price,
    'living_rooms': living_rooms_price,
    'home_offices': offices_price,
    'hallways': hallways_price,
    'stairs': stairs_price,
    'landings': landing_price,
    'dining_rooms': dining_room_price,
    'kitchens': kitchen_price,
    'bathrooms': bathroom_price,
    'dining_chairs': dining_chairs_price,
    'sofa_3': sofa_3_price,
    'sofa_4': sofa_4_price,
    'sectional': sectional_price,
    'ottomans': ottoman_price,
    'chaises': chaise_price,
    'recliners': recliner_price,
    'wing_backs': wing_back_price,
    'loveseats': loveseat_price
  };

  //function displays price based on user input
  $(function() { //wait for DOM to be Ready
    //find all <select> tags in the document
    var selects = $('select');
    //when any select list changes, run the callback function
    selects.change(function(changeEvent) {
      var changedSelectList = changeEvent.target;
      //only update the total if there is a price
      if (Object.keys(prices).includes(changedSelectList.id) && prices[changedSelectList.id]) {
        //iterate over select lists and sum the prices
        totalPrice = [...selects].reduce(function(sum, select) {
          //if there is a selected value for the select list
          if ($(select).val()) {
            //add the product of the selected value and the price
            sum += $(select).val() * prices[select.id];
          }
          //return the sum for the next iteration of the loop
          return sum;
        }, 0); //start the total at 0
        //update the output
        $("#output1").text(totalPrice);
      }
    });
  })

  //datepicker jquery function
  $( function() {
    $( "#datepicker" ).datepicker();
  } );

});