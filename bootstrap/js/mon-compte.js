var session;
$(document).ready(function () {   

  //avoir id utilisateur pour gérer son compte
  session=$("#session").val();
  $.ajax({
        url: "../php/info-moncompte.php",
        method: "POST",
        data: { id : session  },
        })
        .done(function(msg) {
          array=$.parseJSON(msg);
          $.each(array, function( index, value ) {
              $("#affiche-historique").append('<tr id="affiche'+index+'"><td> <input type="button" id="btn-historique'+index+'" class="btn btn-success" value="Infos"></td></tr>'); 
             	  $.each(value, function( ind, val ) {
             	  	if(ind=='2'){
             	  	$("#affiche"+index).prepend('<td><img src="'+val+'" style="height:50px;"></td>');
               	  }else if(ind=='3'){
                    $("#affiche"+index).prepend('<input type="hidden" id="idh'+index+'" value="'+val+'" ></td>');
                  }else{
                    $("#affiche"+index).prepend('<td>'+val+'</td>');
                  }
             
                });

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
                   	
        });
              

                
  });

});