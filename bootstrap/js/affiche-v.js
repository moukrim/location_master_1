var marqueVoiture;
var typeVoiture;
var etat=true;

$(document).ready(function () {     

  $("#submit-option").click(function() {
      $("#liste").empty();
    typeVoiture=$('#speed1 option:selected').val();  
    var element1 = $("#4X4");
    var element2 = $("#Berline");
    var element3 = $("#Citadine");
    if(element1.length){
    //L'élément existe
         marqueVoiture=$('#4X4 option:selected').val();

    } else if (element2.length){
         marqueVoiture=$('#Berline option:selected').val();
    }else if (element3.length){
         marqueVoiture=$('#Citadine option:selected').val();
    }
    

    if(typeVoiture=="0"){

          $("#erreur").html('<span class="textErreur">veuillez selectionner un type de voiture</span>');
    }
    else{        
          rechercheVoiture(typeVoiture,marqueVoiture);
        }

        
 
    });

  });

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

function afficheVoitureHtml(array){
              $.each(array, function( ind, val ) {
                           console.log(val.marque); 
                           $("#liste").append('\
                                              <div class="wrap">\
                                              <div class="box">\
                                              <div class="product full">\
                                              <a href="#"> \
                                          <img name="img" src="'+val.image+'" height="255" width="262"> \
                                        </a> \
                                        <div class="description"> \
                                          '+val.type+', <strong>'+val.marque+' :</strong> \
                                          <a href="#" class="price">'+val.prix+' €/Km</a> \
                                        </div> \
                                        <a href="#" id="cal'+val.id+'" class="gift"> \
                                        </a> \
                                        <div class="rating"> \
                                          <span>Etat :</span> \
                                        </div> \
                                        <a href="../php/addPanier.php?id='+val.id+'" class="add addPanier">add</a>\
                                              </div> \
                                              </div>\
                                              </div>\
                                              ');
                      $('#calendrier').append('<div id="'+val.id+'" style="margin-left: 45px;"></div>');

                   });
                    affichePopupAjoutPanier();
                    recupIdPourCal();
                     
                                        

}

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




