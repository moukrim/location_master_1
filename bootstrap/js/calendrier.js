var etat=true;

function listenCLick(arr){
    $.each(arr, function( index, value ) {
        
        $('#cal'+value).click(function() {
            
            if(etat==true){
                $('#'+value).show('slow');
                etat=false;
            }
            else{
                $('#'+value).hide(1000);
                etat=true;
            }

        });  
    
    });

}


function eachBoucle(arr){
   
   $.each(arr, function( index, value ) {

    var request1 = $.ajax({
        url: "../php/recup_dates.php",
        method: "POST",
        data: { id: value },
    });
     $("#"+value).jqxCalendar({ enableTooltips: true, width: 220, height: 220});

    request1.done(function( msg ) {
    array=$.parseJSON(msg);
    console.log(array);
    
    if(array!='ko'){
      $.each(array, function( ind, val ) {
        console.log(array);
        $.each(val, function( i, v ) {
         

          $("#"+value).jqxCalendar('addSpecialDate', new Date(v), '', 'Indisponible');


        });
      }); 

    }
    else
    {
      $("#cal"+value).hide();
    }


  });
      $("#"+value).hide();
  });
}

$(document).ready(function () {   

  var typeM = $("#num_test").val();
  var marqueM=$("#num_test1").val();
  
  $.ajax({
  url: "../php/recup_id_veh.php?type="+typeM+"& marque="+marqueM+"",
  method: "POST",
  })
  .done(function( msg ) {
      arr=$.parseJSON(msg);
      listenCLick(arr);
      eachBoucle(arr);
  });





  });


