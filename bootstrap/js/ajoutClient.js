//cedric teramo
/*#######################################################*/
/* Ajouter des clients */
/*#######################################################*/
$(document).ready(function() {

//ajout d'un client après le click du bouton ajoutClient
$("#boutonAjoutClient").click(function() {
//récuperation des champs
var nom=$("#nom");
var prenom=$("#prenom");
var adrMail=$("#adrMail");
var mdp=$("#mdp");

//vérifications champs
if(nom.val() == '')
{
	$("#nom").focus();			
	$("#nomInvalide").html('<span>Champs Nom vide</span>');
return false;
}

if(prenom.val() == '')
{
	$("#prenom").focus();
	$("#prenomInvalide").html('<span>Champs Prenom vide</span>');
return false;
}
if(adrMail.val() == '')
{
	$("#adrMail").focus();
	$("#adrMailInvalide").html('<span>Champs Mail vide</span>');
return false;
}
if(mdp.val() == '')
{
	$("#mdp").focus();			
	$("#mdpInvalide").html('<span>Champs Mot de passe vide</span>');
return false;
}
	//envoi des données vers la page traitementAjoutClient.php
	var request = $.ajax({

		url: "traitementAjoutClient.php",
		method: "POST",
		data: {nom:nom.val(), prenom:prenom.val(), adrMail:adrMail.val(), mdp:mdp.val(), },

	});
//recuperation de la reponse
request.done(function(msg){

console.log(msg);


if(msg = "ajout reussie")
{	//affichage d'un pop up pour confirmer l'ajout
	$("#modal-ajout-Client").modal("show");
	//reinitialisation des champs
	$('#nom').val('');
	$('#prenom').val('');
	$('#adrMail').val('');
	$('#mdp').val('');
	//on vide les div après affichage d'une erreur de saisie
	$('#nomInvalide').empty();
	$('#prenomInvalide').empty();
	$('#adrMailInvalide').empty();
	$('#mdpInvalide').empty();

}
else
{
	alert('Ajout refuse');
}

});

return false;
});
});


