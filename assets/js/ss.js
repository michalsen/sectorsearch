$(document).ready(function() {


  $('#sigma_plane').click(function() {
    console.log('toggle');
    $('#sector_Sa, #sector_Sd, #sector_Sg, #sector_Sb, #sector_Se, #sector_Sh, #sector_Sc, #sector_Sf, #sector_Si').toggle();
  });
  $('#tao_plane').click(function() {
    $('#sector_Ta, #sector_Td, #sector_Tg, #sector_Tb, #sector_Te, #sector_Th, #sector_Tc, #sector_Tf, #sector_Ti').toggle();
  });
  $('#zeta_plane').click(function() {
    $('#sector_Za, #sector_Zd, #sector_Zg, #sector_Zb, #sector_Ze, #sector_Zh, #sector_Zc, #sector_Zf, #sector_Zi').toggle();
  });


  $('.sector_link').click(function(e) {
      sectorDetail(this.id);
  });

  $('#purchase_miner').click(function() {
      purchase($(this).attr("value"));
  });
  $('#purchase_scout').click(function() {
      purchase($(this).attr("value"));
  });


  var sectorDetail = function(e) {
     var id = (e);
     console.log(id);
     var sendData = jQuery.ajax({
               type: 'POST',
               cache: false,
               async: false,
               url: '/assets/ajax/sector.php',
               data: {id},
                 success: function(resultData) {
                     console.log(resultData);
                     $('.stage_details').html('<div class="stage_details">'+resultData+'</div>');
                 },
                 failure: function(http, state, error) {
                     // console.log(error);
                 },
                 error: function(http, state, error) {
                     // console.log(error);
                 },
             }); // end ajax call
    }



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
