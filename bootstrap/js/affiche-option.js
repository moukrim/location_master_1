$( document ).ready(function() {

   
var marque={};
$("#marqueSelect select").each(function(){

var select=$(this);
marque[select.attr('id')]=select;
select.remove();


});
//console.log(marque);

$("#typeSelect").change(function(event){

var valeur=$(this).val();

if(valeur==0){

	$("#marqueSelect").hide();
}
else{
	$("#marqueSelect").show();

	$("#marqueSelect").empty().append(marque[valeur]);
}


});




});