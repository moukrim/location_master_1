//cédric teramo
/*#######################################################*/
/* Ajouter des véhicules */
/*#######################################################*/

$(document).ready(function() {


//lorsque l'on clic sur le bouton d'ajout dun vehicule
$("#boutonAjoutVehicule").click(function() {
//recupération des champs suivant
var type=$("#type");
var marque=$("#marque");
var modele=$("#modele");
var plaque=$("#plaque");
var kilometre= $("#kilometre");
var prix=$("#prix");
var prixJour=$("#prixJour");
var file=$("#file");
var nbloc=$("#nbloc");
//après recuperation de l'image on enlève le fakepath et on ne garde que le nom de l'image
var pop=file.val().replace("C:\\fakepath\\", "");

//vérification des champs
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

if(kilometre.val() < '0')
{
	$("#kilometre").focus();
	$("#kilometreInvalide").html('<span>le kilometrage du véhicule doit être positif !</span>');
return false;
}

if(isNaN(kilometre.val()) == true)
{
	$("#kilometre").focus();
	$("#kilometreInvalide").html('<span>le kilometrage est un nombre !</span>');
return false;
}

if(prix.val() == '')
{
	$("#prix").focus();
	$("#prixInvalide").html('<span>Champs Prix vide</span>');
return false;
}

if(prix.val() <0)
{
	$("#prix").focus();
	$("#prixInvalide").html('<span>le prix doit être positif !</span>');
return false;
}

if(isNaN(prix.val()) == true)
{
	$("#prix").focus();
	$("#prixInvalide").html('<span>Le prix doit un nombre !</span>');
return false;
}

if(prixJour.val() == '')
{
	$("#prixJour").focus();
	$("#prixJourInvalide").html('<span>Champs Prix / jour vide</span>');
return false;
}

if(prixJour.val() <0)
{
	$("#prixJour").focus();
	$("#prixJourInvalide").html('<span>le prix doit être positif !</span>');
return false;
}

if(isNaN(prixJour.val()) == true)
{
	$("#prixJour").focus();
	$("#prixJourInvalide").html('<span>le prix par jour est un nombre !</span>');
return false;
}

if(file.val() == '')
{
		$("#imageInvalide").html('<span>Veuillez selectionner une photo du véhicule</span>');
return false;
}
	//envoie des données vers la page AjoutVehicule.php
	var request = $.ajax({

		url: "traitementAjoutVehicule.php",
		method: "POST",
		data: {type:type.val(), marque:marque.val(), modele:modele.val(), plaque:plaque.val(), kilometre:kilometre.val(), prix:prix.val(), prixJour:prixJour.val(), file:pop, nbloc:nbloc.val(), },

	});
//recuperation de la reponse
request.done(function(msg){

console.log(msg);


if(msg = "ajout reussie")
{	//on affiche un pop up pour confimer l'ajout d'un vehicule
	$("#modal-ajout-Vehicule").modal("show");
	//reinitialsiation dse champs
	$('#type').val('');
	$('#marque').val('');
	$('#modele').val('');
	$('#plaque').val('');
	$('#kilometre').val('');
	$('#prix').val('');
	$('#prixJour').val('');
	$('#file').val('');
	//on vide les div après affichage d'une erreur de saisie
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


