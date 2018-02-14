$(document).ready(function() {


  $('#purchase_miner').click(function() {
      purchase($(this).attr("value"));
  });
  $('#purchase_scout').click(function() {
      purchase($(this).attr("value"));
  });


  var purchase = function(e) {
     var purchase = (e);
     var sendData = jQuery.ajax({
               type: 'POST',
               url: '/assets/ajax/ajax.php',
               data: {purchase},
                 success: function(resultData) {
                     //jQuery('.pm').html(resultData);
                     jQuery('.aside-1').html('<div id="player_resources"><strong>Current Resources</strong><br>'+resultData+'</div>');
                     console.log(purchase);
                 }
             }); // end ajax call
  }

});
