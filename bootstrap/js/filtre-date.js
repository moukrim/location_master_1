$(document).ready(function () {     

  $("#submit-recherche").click(function() {
            var debut = $("#dtdebut").val();
            var fin=$("#dtfin").val(); 
          


       $.ajax({
                    url: "php/recup-id-dt.php",
                    method: "POST",
                    data: { dtdebut : debut, dtfin : fin },
                    })
                    .done(function( msg ) {
                        arr=$.parseJSON(msg);
                        console.log(arr);
                        /*listenCLick(arr);
                        eachInfernal(arr);*/
                   });
 return false; 
        }); 
     
    
 


  });
