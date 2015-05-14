//cedric teramo
/*#######################################################*/
/* Connexion de l'administrateur */
/*#######################################################*/
$(document).ready(function() {
//lorsque l'on clic sur le bouton connexion
$("#boutonConnexion").click(function() {
//on recupère l'identifiant(mail) et le mot de passe
var id=$("#identifiant");
var mdp=$("#mdp");
	//on verifie les champs
		if(id.val() == '')
		{
			$("#identifiant").focus();
			$("#IdentifiantInvalide").html('<span>Mail invalide</span>');
			return false;
		}

		if(mdp.val() == '')
		{
			$("#mdp").focus();
			$("#MdpInvalide").html('<span>Mot de passe invalide</span>');
			return false;
		}
	//envoi des données à la page traitementConnexion.php
	var request = $.ajax({

		url: "traitementConnexion.php",
		method: "POST",
		data: {identifiant:id.val(), mdp:mdp.val()},

		});
//recupératino de la réponse
request.done(function(msg){
var arr=$.parseJSON(msg);
console.log(arr);

			if(arr=='connexion reussie')
			{	//on va à la page indexConnect.php page d'accueil de l'admin
				window.location.href="indexConnecte.php";
			}
			else
			{
				$("#ConnexionInvalide").html('<span>Erreur de connexion</span>');
				return false;
			}
		});
return false;
	});
});


