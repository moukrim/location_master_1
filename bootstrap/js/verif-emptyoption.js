var valeur1;
$(document).ready(function () {     

  $("#submit-option").click(function() {
 
    var valeur=$('#speed1 option:selected').val();  
    console.log(valeur);
    var element1 = $("#4X4");
    var element2 = $("#Berline");
    var element3 = $("#Citadine");
    if(element1.length){
    //L'élément existe
    valeur1=$('#4X4 option:selected').val();

    } else if (element2.length){
      valeur1=$('#Berline option:selected').val();
    }else if (element3.length){
      valeur1=$('#Citadine option:selected').val();
    }
     console.log(valeur1);

    if(valeur=="0"){

      $("#erreur").html('<span class="textErreur">veuillez selectionner un type de voiture</span>');
    }
    else{

               window.location='../php/liste-voiture.php?type='+valeur+'&marque='+valeur1;
            
        }

        
 
 });

  });
