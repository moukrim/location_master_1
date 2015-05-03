//yassine
var session;
var id;
var prixFinale;

function nbJoursEntreDate(){
  var start = $('#from').datepicker('getDate');
  var end   = $('#to').datepicker('getDate');  
  var days   = (end - start)/1000/60/60/24;
  return days;

}

$('#from').datepicker({
    defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      minDate: 1,
    onSelect: function(dateText) { 
      
    $( "#to" ).datepicker( "option", "minDate", dateText );
     if($("#to").val()!=''){
        if($('#optradiojour').is(':checked')){
         var nbdayjour=nbJoursEntreDate()+1;
         prixFinale=nbdayjour*($("#prixj").val());
         $("#prixfinale").empty().html('<span>'+prixFinale+'€</span>');
         console.log(prixFinale);
       }else if($('#optradiokm').is(':checked')){
        var nbdaykm=nbJoursEntreDate()+1;
        prixFinale=nbdaykm*($("#prixk").val().replace(',','.'));
        $("#prixfinale").empty().html('<span>'+prixFinale+'€</span>');
        console.log(prixFinale);

      }

    }
}
});

$('#to').datepicker({
  defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
     
    onSelect: function(dateText) { 

      $( "#from" ).datepicker( "option", "maxDate", dateText );
      if($("#from").val()!=''){
        if($('#optradiojour').is(':checked')){
         var nbdayjour=nbJoursEntreDate()+1;
         prixFinale=nbdayjour*($("#prixj").val());
         $("#prixfinale").empty().html('<span>'+prixFinale+'€</span>');
          console.log(prixFinale);
        

      }else if($('#optradiokm').is(':checked')){
        var nbdaykm=nbJoursEntreDate()+1;
        prixFinale=nbdaykm*($("#prixk").val().replace(',','.'));
        $("#prixfinale").empty().html('<span>'+prixFinale+'€</span>');
        console.log(prixFinale);
      }
    
  }
    }
});

$(document).ready(function () {    


 
 $("input[name='optradio']").change(function(){
   if($('#optradiojour').is(':checked') && $("#from").val()!='' && $("#to").val()!=''){
       var nbdayjour=nbJoursEntreDate()+1;
        prixFinale=nbdayjour*($("#prixj").val());
        $("#prixfinale").empty().html('<span>'+prixFinale+'€</span>');
         console.log(prixFinale);

   }else if($('#optradiokm').is(':checked')  && $("#from").val()!='' && $("#to").val()!=''){
      
      var nbdaykm=nbJoursEntreDate()+1;
       prixFinale=nbdaykm*($("#prixk").val().replace(',','.'));
       $("#prixfinale").empty().html('<span>'+prixFinale+'€</span>');
        console.log(prixFinale);

   }

});


  $("#cache-validation").hide();

$("#btn-reservation").click(function(){
   session=$("#session").val();
  if(typeof session === 'undefined'){
     $("#myModal").modal('show');
     return false;
  }

$("#cache-validation").show('slow');

});

$("#btn-reserv").click(function(){

var from=$("#from").val();
var to=$("#to").val();
id=$("#id").val();


  var dateArDebut = from.split('/');
            var newDateDebut = dateArDebut[2] + '-' + dateArDebut[0] + '-' + dateArDebut[1];
            var dateArFin = to.split('/');
            var newDateFin = dateArFin[2] + '-' + dateArFin[0] + '-' + dateArFin[1];

$("#erreur").empty();
  if(from==''){
    $("#erreur").html('<span style="color:red;">Veuillez indiquer la date de début de réservation!!</span>').show();
    $('#erreur').delay(2000).hide("slow" ); 
    return false;
  }if(to==''){
     $("#erreur").html('<span style="color:red;">Veuillez indiquer la date de fin de réservation!!</span>').show(); 
      $('#erreur').delay(2000).hide("slow" );  
     return false;
  }
$.ajax({
                        url: "../php/verif-date-reserv.php",
                        method: "POST",
                        data: {dtdebut : newDateDebut , dtfin : newDateFin },
                        })
                        .done(function( msg ) {
                            arr=$.parseJSON(msg);
                           if($.inArray(id , arr) != -1){
                             $("#erreur").html('<span style="color:red; margin-left:180px;">Cette voiture est indisponible dans cette date!!</span>').show(); 
                             $('#erreur').delay(3000).hide("slow" );  
                             return false;

                           }else{
                              $.ajax({
                        url: "../php/reserver.php",
                        method: "POST",
                        data: {dtdebut : newDateDebut , dtfin : newDateFin , idVehicule : id , idUtilisateur : session, prix : prixFinale },
                        })
                        .done(function( msg ) {
                             $("#modal-reserv").modal('show').show();
                             $('#modal-reserv').delay(2000).hide("slow" ); 
                          
                        });
                           }
                        });



});
  


  });
