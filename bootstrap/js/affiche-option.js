/*MOUKRIM Yassine*/

$( document ).ready(function() {
   
var marque={};
//mettre les marques dans un tableau associatif (type=>marque)
$("#marqueSelect select").each(function(){

	var select=$(this);
	//l'attr d'id est le type
	marque[select.attr('id')]=select;
	select.remove();
});


//afficher les marques de voiture d'apres le choix son type
$("#typeSelect").change(function(event){

	//récuperer la valeur d'un type de voiture choisi
	var valeur=$(this).val();

	if(valeur==0){

		$("#marqueSelect").hide();
	}else{

		$("#marqueSelect").show();
		$("#marqueSelect").empty().append(marque[valeur]);
	}


});
});