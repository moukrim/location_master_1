/*MOUKRIM Yassine*/

var clickVeh=true;
var clickDate=true;
$(document).ready(function () {     
//cacher les deux filtres à chaque rechargement de page
$("#cache-filtre-date").hide();
$("#cache-filtre-veh").hide();

/*#########################################*/
/*Recherche par vehicule*/
/*#########################################*/
$("#parvehicule").click(function() {
  if(clickVeh==true&&clickDate==true){
			 $("#cache-filtre-veh").show('1000');
			 clickVeh=false;

  }else if(clickVeh==true&&clickDate==false){
       $("#cache-filtre-date").hide('1000');
       $("#cache-filtre-veh").show('1000');
			 clickDate=true;
			 clickVeh=false;

  }else{
       	$("#cache-filtre-veh").hide('1000');
       			 clickVeh=true;
  }

 }); 


/*#########################################*/
/*Recherche par date*/
/*#########################################*/
 $("#pardate").click(function() {
   if(clickDate==true&&clickVeh==true){
			 $("#cache-filtre-date").show('1000');
			 clickDate=false;

    }else if(clickDate==true&&clickVeh==false){
       $("#cache-filtre-veh").hide('1000');
       $("#cache-filtre-date").show('1000');
			 clickVeh=true;
			 clickDate=false;

    }else{

        $("#cache-filtre-date").hide('1000');
        clickDate=true;
    }

 }); 
});
