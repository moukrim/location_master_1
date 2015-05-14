/*MOUKRIM Yassine*/

var marqueVoiture;
var typeVoiture;

//recuperation des voitures 
function rechercheVoiture(typeVoiture,marqueVoiture){

  $("#erreur").empty();
  $.ajax({
        url: "../php/renvoi-voiture.php",
        method: "POST",
        data: { type : typeVoiture , marque : marqueVoiture },
      })
        .done(function(msg) {
          array=$.parseJSON(msg);
          console.log(array);
          afficheVoitureHtml(array);   
 });
}


//affichage des sur la page
function afficheVoitureHtml(array){

  $.each(array, function( ind, val ) { 
    $("#liste").append('\
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
                           <a href="#" id="cal'+val.id+'" class="gift"> \
                           </a> \
                           <div class="rating"> \
                              <span style="width:170px;">Modele :<strong>'+val.modele+'</strong></span> \
                           </div> \
                           <a href="../php/addPanier.php?id='+val.id+'" class="add addPanier">add</a>\
                          </div> \
                        </div>\
                      </div>\
                      ');
    $("#calendrier").append('\
                      <div class="modal fade bs-example-modal-sm" id="c'+val.id+'" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">\
                        <div class="modal-dialog modal-sm">\
                          <div class="modal-content">\
                            <div class="modal-header">\
                              <h4 class="modal-title" id="myModalLabel">Dates d\' <font color="red">indisponibilité</font>:</h4>\
                            </div>\
                            <div class="modal-body">\
                              <div id="'+val.id+'" style="margin-left:10px;"></div> \
                            </div>\
                          </div>\
                        </div>\
                      </div>\
                      ');
        
       });
        affichePopupAjoutPanier();
        recupIdPourCal();
         
}

//affichage d'un pop-up après le clique sur le bouton pour voir le comparateur
function affichePopupAjoutPanier(){

  $('.addPanier').click(function(event){
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


//récuperation des ids de voitures pour associer chaqu'un à un calendrier
function recupIdPourCal(){

  $.ajax({
        url: "../php/recup_id_veh.php",
        method: "POST",
        data: { type : typeVoiture , marque : marqueVoiture },
        })
        .done(function( msg ) {
            arr=$.parseJSON(msg);
            listenCLick(arr);
            eachBoucle(arr);
        });
      }


//creer les listners de cliques pour chaque calendrier
function listenCLick(arr){

  $.each(arr, function( index, value ) {     
      $('#cal'+value).click(function() {
              $('#c'+value).modal('show');  
      });      
  });

}

//création des calendriers associés à chaque voiture
function eachBoucle(arr){
   
   //récuperation des dates indisponibles pour chaque id
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

    }else{
      $("#cal"+value).hide();
    }


  });   
  });
}

/*#######################################################*/
/* Recherche les voitures qui ont le type et la marque séléctionné */
/*#######################################################*/

$(document).ready(function () {     


  $("#submit-option").click(function() {
    //vider la liste de voiture à chaque nouvelle recherche
    $("#liste").empty();
    $("#voitureIndisponible").empty();
    //recuperer le type de voiture séléctionné
    typeVoiture=$('#typeSelect option:selected').val();  
    var element1 = $("#4X4");
    var element2 = $("#Berline");
    var element3 = $("#Citadine");

    //recuperer la marque de voiture séléctionnée
    if(element1.length){
    //L'élément existe
    marqueVoiture=$('#4X4 option:selected').val();

    } else if (element2.length){
         marqueVoiture=$('#Berline option:selected').val();
    }else if (element3.length){
         marqueVoiture=$('#Citadine option:selected').val();
    }
    

    if(typeVoiture=="0"){

          $("#erreur").html('<span class="textErreur">veuillez selectionner un type de voiture</span>').show();
           $("#erreur").delay(2000).hide("slow" ); 
           return false;
    }
    else{        
          rechercheVoiture(typeVoiture,marqueVoiture);
        }

        
 
    });

  });

