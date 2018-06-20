jQuery(document).ready(function($){

  var totalPrice;

  //create variables from PHP input
  var bedroom_price = script_vars.bedrooms_num;
  var hallways_price = script_vars.hallways_num;
  var stairs_price = script_vars.stairs_num;
  var upholstery_price = script_vars.upholstery_num;
  var tile_grout_price = script_vars.tile_grout_num;
  var area_rug_price = script_vars.area_rug_num;

  //define prices as simple JS object, where keys will match the id attributes of the select tags
  prices = {
    'bedrooms': bedroom_price,
    'hallways': hallways_price,
    'stairs': stairs_price,
    'upholstery': upholstery_price,
    'tile_grout': tile_grout_price,
    'area_rug': area_rug_price
  };

  //function displays price based on user input
  $(function() { //wait for DOM to be Ready
    //find all <select> and <input> tags in the document
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

  //popup when user submits form
  $(function() {
    $("#dialog").dialog();
  });

  //close popup
  $(function() {
    $("#popmake-233").close();
  });
});