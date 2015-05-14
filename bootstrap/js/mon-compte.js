/*MOUKRIM Yassine*/

var session;


function recupInfoProfile(){

//avoir id utilisateur pour gérer son compte
 session=$("#session").val();
   $.ajax({
        url: "../php/profil-moncompte.php",
        method: "POST",
        data: { id : session  },
        })
        .done(function(msg) {
          tableau=$.parseJSON(msg);
          $("#affiche-profile").append('<tr><td>'+tableau.nom+'</td><td>'+tableau.prenom+'</td><td>'+tableau.adrMail+'</td><td>'+tableau.mdp+'</td></tr>');
      }); 

}

function clickAnnulReserv(index){

 $('#btn-historique-annuler'+index).click(function(){
 $('#btn-historique-annul-annuler'+index).show('slow');
 $('#btn-historique-confirm-annul'+index).show('slow');
 $('#numReservation'+index).show('slow');
 $(this).hide('slow');

});


}

function clickAnnulAnnulation(index){

   $('#btn-historique-annul-annuler'+index).click(function(){
   $('#numReservation'+index).hide('slow');
   $('#btn-historique-confirm-annul'+index).hide('slow');
   $(this).hide('slow');
   $('#btn-historique-annuler'+index).show('slow');
    
  });
}


function confAnnulReserv(index){

 $('#btn-historique-confirm-annul'+index).click(function(){
   $.ajax({
    url: "../php/annuler-reservation.php",
    method: "POST",
    data: { id :  $('#numReservation'+index).val() , idU: session  },
    })
    .done(function(msg) {
      res=$.parseJSON(msg);

      if(res=='oui'){

        $("#conf-annul").modal('show').show();
        $('#conf-annul').delay(2000).hide("slow" ); 
        return false;
    }else if(res=='non'){

     $("#pas-annul"+index).html('<span style="color:red;">L\'annulation n\'est pas valide!!</span>').show();
     $('#pas-annul'+index).delay(3000).hide("slow" ); 
     return false;
    }


      
    });

   $('#numReservation'+index).hide('slow');
   $(this).hide('slow');
   $('#btn-historique-annul-annuler'+index).hide('slow');
   $('#btn-historique-annuler'+index).show('slow');
     });


}


function afficheInfoVehiculeReserve(value,index){

     $.each(value, function( ind, val ) {
      if(ind=='2'){
      $("#affiche"+index).prepend('<td><img src="'+val+'" style="height:50px;"></td>');
      }else if(ind=='3'){
        $("#affiche"+index).prepend('<input type="hidden" id="idh'+index+'" value="'+val+'" ></td>');
      }else{
        $("#affiche"+index).prepend('<td>'+val+'</td>');
      }
 
    });


}


function afficheInfoReservation(index){

   $("#btn-historique"+index).click(function(){

      $("#affiche-date").empty();
      var idv =$("#idh"+index).val();
      $.ajax({
            url: "../php/info-dates.php",
            method: "POST",
            data: { id : idv , idU: session },
            })
            .done(function(msg) {
              table=$.parseJSON(msg);
              $.each(table, function( index, valeur) {
                $("#affiche-date").append('<tr id="a'+index+'"></tr>'); 
                $.each(valeur, function( ind, val) {
                  $("#a"+index).append('<td>'+val+'</tr>'); 
                });

             });
              $("#modal-date").modal('show');
            });
                          
    });
}

/*#######################################################*/
/* Gérer le compte utilisateur*/
/*#######################################################*/
$(document).ready(function () {   
  //recuperer les informations du profile utilisateur
  recupInfoProfile();

  $.ajax({
        url: "../php/info-moncompte.php",
        method: "POST",
        data: { id : session  },
        })
        .done(function(msg) {
          array=$.parseJSON(msg);

        

          $.each(array, function( index, value ) {

              $("#affiche-historique").append('<tr id="affiche'+index+'"><td> <input type="button" id="btn-historique'+index+'" class="btn btn-primary" value="Infos"></td><td> <input type="button" id="btn-historique-annuler'+index+'" class="btn btn-danger" value="Annuler"></td><td><input type="text" style="display:none;" class="form-control" id="numReservation'+index+'" placeholder="Numéro de réservation"></td>\
                <td><div id="pas-annul'+index+'"></div> <input type="button" style="display:none;" id="btn-historique-annul-annuler'+index+'" class="btn btn-danger" value="Abandonner"></td><td> <input type="button" style="display:none;" id="btn-historique-confirm-annul'+index+'" class="btn btn-success" value="Confirmer"></td></tr>'); 

              //afficher les informations des vehicules reservés
             	afficheInfoVehiculeReserve(value,index);   

              //animations après le clique sur annuler
              clickAnnulReserv(index);

              //abandonner l'annulation de reservation
              clickAnnulAnnulation(index);

              //confirmation de reservation
              confAnnulReserv(index);

              //afficher les informations d'une reservation
              afficheInfoReservation(index);
                  
                   	
        });
              

                
  });

});