

$(document).ready(function() {



$("#boutonAjoutVehicule").click(function() {

var type=$("#type");
var marque=$("#marque");
var modele=$("#modele");
var plaque=$("#plaque");
var kilometre=$("#kilometre");
var prix=$("#prix");
var prixJour=$("#prixJour");
var file=$("#file");
var nbloc=$("#nbloc");
var pop=file.val().replace("C:\\fakepath\\", "");

if(type.val() == '')
{
	$("#type").focus();			
	$("#typeInvalide").html('<span>Champs Type vide</span>');
return false;
}

if(marque.val() == '')
{
	$("#marque").focus();
	$("#marqueInvalide").html('<span>Champs Marque vide</span>');
return false;
}
if(modele.val() == '')
{
	$("#modele").focus();
	$("#modeleInvalide").html('<span>Champs Modele vide</span>');
return false;
}

if(plaque.val() == '')
{
	$("#plaque").focus();
	$("#plaqueInvalide").html('<span>Champs Immatriculation vide</span>');
return false;
}
if(kilometre.val() == '')
{
	$("#kilometre").focus();
	$("#kilometreInvalide").html('<span>Champs Kilometre vide</span>');
return false;
}

if(prix.val() == '')
{
	$("#prix").focus();
	$("#prixInvalide").html('<span>Champs Prix vide</span>');
return false;
}

if(prixJour.val() == '')
{
	$("#prixJour").focus();
	$("#prixJourInvalide").html('<span>Champs Prix / jour vide</span>');
return false;
}

if(file.val() == '')
{
		$("#imageInvalide").html('<span>Veuillez selectionner une photo du véhicule</span>');
return false;
}

	var request = $.ajax({

		url: "traitementAjoutVehicule.php",
		method: "POST",
		data: {type:type.val(), marque:marque.val(), modele:modele.val(), plaque:plaque.val(), kilometre:kilometre.val(), prix:prix.val(), prixJour:prixJour.val(), file:pop, nbloc:nbloc.val(), },

	});

request.done(function(msg){

console.log(msg);


if(msg = "ajout reussie")
{
	$("#modal-ajout-Vehicule").modal("show");

	$('#type').val('');
	$('#marque').val('');
	$('#modele').val('');
	$('#plaque').val('');
	$('#kilometre').val('');
	$('#prix').val('');
	$('#prixJour').val('');
	$('#file').val('');

	$('#typeInvalide').empty();
	$('#marqueInvalide').empty();
	$('#modeleInvalide').empty();
	$('#plaqueInvalide').empty();
	$('#kilometreInvalide').empty();
	$('#prixInvalide').empty();
	$('#prixJourInvalide').empty();
	$('#imageInvalide').empty();
}
else
{
	alert('Ajout refuse');
}

});

return false;

});



});


