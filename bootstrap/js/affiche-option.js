$( document ).ready(function() {

   
var marque={};
$("#step1 select").each(function(){

var select=$(this);
marque[select.attr('id')]=select;
select.remove();


});
//console.log(marque);

$("#speed1").change(function(event){

var valeur=$(this).val();

if(valeur==0){

	$("#step1").hide();
}
else{
	$("#step1").show();

	$("#step1").empty().append(marque[valeur]);
}


});




});