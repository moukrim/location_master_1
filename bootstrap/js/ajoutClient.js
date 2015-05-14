//cedric teramo
$(document).ready(function() {

//ajout d'un client après le click le bouton ajoutClient
$("#boutonAjoutClient").click(function() {

var nom=$("#nom");
var prenom=$("#prenom");
var adrMail=$("#adrMail");
var mdp=$("#mdp");

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

	var request = $.ajax({

		url: "traitementAjoutClient.php",
		method: "POST",
		data: {nom:nom.val(), prenom:prenom.val(), adrMail:adrMail.val(), mdp:mdp.val(), },

	});

request.done(function(msg){

console.log(msg);


if(msg = "ajout reussie")
{
	$("#modal-ajout-Client").modal("show");

	$('#nom').val('');
	$('#prenom').val('');
	$('#adrMail').val('');
	$('#mdp').val('');

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


