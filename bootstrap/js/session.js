$(document).ready(function() {

$("#boutonConnexion").click(function() {

var id=$("#identifiant");
var mdp=$("#mdp");

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

	var request = $.ajax({

		url: "traitementConnexion.php",
		method: "POST",
		data: {identifiant:id.val(), mdp:mdp.val()},

		});

request.done(function(msg){
var arr=$.parseJSON(msg);
console.log(arr);

			if(arr=='connexion reussie')
			{
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


