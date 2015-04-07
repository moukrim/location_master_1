var session;
var id;
$(document).ready(function () {     
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
                             $("#erreur").html('<span style="color:red;">Cette voiture est indisponible dans cette date!!</span>').show(); 
                             $('#erreur').delay(3000).hide("slow" );  
                             return false;

                           }else{
                              $.ajax({
                        url: "../php/reserver.php",
                        method: "POST",
                        data: {dtdebut : newDateDebut , dtfin : newDateFin , idVehicule : id , idUtilisateur : session },
                        })
                        .done(function( msg ) {
                             $("#modal-reserv").modal('show');
                             $('#modal-reserv').delay(2000).hide("slow" ); 
                          
                        });
                           }
                        });



});
  


  });
