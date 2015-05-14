//cedric teramo
/*#######################################################*/
/* Recherche et suppression d'un client */
/*#######################################################*/
var adrMail;
$(document).ready(function() {


//lorsque l'on clic sur le bouton recherche client
$("#boutonRechercherClient").click(function() {
$("#afficheCli").empty();
$("#afficheClient").empty();

//on recupère l'adresse mail
 adrMail=$("#adrMail");
			//on verifie le champ
			if(adrMail.val() == '')
		{
			$("#adrMail").focus();
			$("#adrMailInvalide").html('<span>Adresse Mail invalide</span>');
			return false;
		}
		//on envoi la données à la page traitementRechercheSuppressionClient.php
		var request = $.ajax({

		url: "traitementRechercheSuppressionClient.php",
		method: "POST",
		data: {adrMail:adrMail.val() },

	});
//on recupère les infos client
request.done(function(msg){
	res=$.parseJSON(msg);

if(res.id != null)
{
				//on affiche les infos recupérer 
				$("#afficheClient").empty().append('\
								<div class="panel panel-warning" style="width:874px;"> \
								  <div class="panel-heading"> \
								        <h3 class="panel-title">Suppression utilisateur</h3> \
								    </div> \
								    <div class="panel-body" style="height:150px;"> \
								    <table class="table table-hover"> \
											    <thead>\
											        <tr>\
											        <th>Nom</th>\
											            <th>Prenom</th>\
											            <th>Mail</th>\
											            <th>Mot de passe</th>\
											        </tr>\
											    </thead>\
											    <tbody>\
											        <tr>\
											            <td>'+res.nom+'</td>\
											            <td>'+res.prenom+'</td>\
											            <td>'+res.adrMail+'</td>\
											            <td>'+res.mdp+'</td>\
											             </tr>\
											             </tbody>\
											</table>\
											 <input type="button" id="boutonSupprimerClient" class="btn btn-success" style="float:right;" value="Supprimer">\
								    </div>\
								    </div>\
				');
					//lorsque l'on clic sur le bouton supprimer client
					$("#boutonSupprimerClient").click(function (){
					//on envoi l'id sur la page traitementSuppressionClient.php
					$.ajax({ 
								type: "POST",  
								url: "traitementSuppressionClient.php", 
								data: {id:res.id},
				 
							}).done(function(msg){
								//affichage d'un pop up de confirmation
								$("#modal-sup-Client").modal("show");
								$("#afficheClient").empty();
								$('#adrMail').val('');
							});

				});
}else
{

	$("#afficheCli").empty().html('<span> Ce client n existe pas !</span>');

}



});

return false;

});

});



			
