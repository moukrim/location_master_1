//yassine
//afficher pop-up avant l'ajout au comparateur
function affichePopupAjPanier(){
 
  $('.addPanier').click(function(){

    event.preventDefault();
    $.get($(this).attr('href'),{},function(data){
      if(data.error){
          alert(data.message);
      }else{
          $("#myModal").modal('show');
      }
    },'json');
  return false;
  });
}

//modification de dates pour les adapter avec la BDD
function recupBonDate(debut,fin)  {

  $("#erreurdate").empty();
  var dateArDebut = debut.split('/');
  var newDateDebut = dateArDebut[2] + '-' + dateArDebut[0] + '-' + dateArDebut[1];
  var dateArFin = fin.split('/');
  var newDateFin = dateArFin[2] + '-' + dateArFin[0] + '-' + dateArFin[1];

  recupVoiture(newDateDebut,newDateFin);
}          


//Récuperation des voitures et les afficher sur la page
function recupVoiture(newDateDebut,newDateFin){ 
  
  $.ajax({
  url: "../php/recup-id-dt.php",
  method: "POST",
  data: { dtdebut : newDateDebut, dtfin : newDateFin },
  })
  .done(function( msg ) {
    array=$.parseJSON(msg);
    console.log(array);
   if(array=='indisponible'){

      $("#voitureIndisponible").html('<span style="color:red; margin-left:300px;">Aucune voiture disponible à cette date!!</span>');
      return false;
    }else{
    $.each(array, function( ind, val ) {
       console.log(val.marque); 
       $("#liste").append('\
                <div id="'+val.id+'"></div>\
                   <div class="wrap">\
                      <div class="box">\
                        <div class="product full">\
                          <a href="#"> \
                            <img name="img" src="'+val.image+'" height="255" width="262"> \
                         </a> \
                         <div class="description"> \
                            '+val.type+', <strong>'+val.marque+' :</strong> \
                            <a href="#" class="price">'+Math.round(val.prix*150*100)/100+' €/Jr <p style="margin-top:-16px; color:coral;"><em style="font-size:10px; position:absolute;">moins de 150 Km/Jr</em></p></a> \
                        </div> \
                        </a> \
                        <div class="rating"> \
                          <span style="width:170px;">Modele :<strong>'+val.modele+'</strong></span> \
                        </div> \
                        <a href="../php/addPanier.php?id='+val.id+'" class="add addPanier" >add</a>\
                      </div> \
                    </div>\
                </div>\
               ');

   });
}
     
      affichePopupAjPanier();  
  });
}        

    
$(document).ready(function () {     
/*#########################################*/
/*Récuperation des voitures par la date de début et de fin choisies*/
/*#########################################*/
  $("#button-date").click(function() {
            $("#liste").empty();
            $("#voitureIndisponible").empty();
            var debut = $("#from").val();
            var fin=$("#to").val();

             if(debut==''){
               $("#erreurdate").html('<span class="textErreur">veuillez selectionner une date de début</span>').show();
               $('#erreurdate').delay(2000).hide("slow" ); 
              return false;

            }if(fin==''){
               $("#erreurdate").html('<span class="textErreur">veuillez selectionner une date de fin</span>').show();
               $('#erreurdate').delay(2000).hide("slow" ); 
              return false;
            }

            recupBonDate(debut,fin);

        }); 


  });
