//cedric teramo
/*#######################################################*/
/* Recherche et suppression d'un vehicule */
/*#######################################################*/
var plaque;
$(document).ready(function() {

//lorsque l'on clic sur le bouton recherche vehicule
$("#boutonRechercherVehicule").click(function() {
$("#afficheVehicule").empty();
$("#afficheVehi").empty();
//on recupère la plaque d'immatriculation saisie
 plaque=$("#plaque");
console.log(plaque.val());
			//vérification du champs
			if(plaque.val() == '')
		{
			$("#plaque").focus();
			$("#plaqueInvalide").html('<span>Plaque immatriculation invalide</span>');
			return false;
		}
		//envoi de la donnée vers la page traitementRechercheSuppressionVehicule.php
		var request = $.ajax({

		url: "traitementRechercheSuppressionVehicule.php",
		method: "POST",
		data: {plaque:plaque.val() },

	});
//recupération de la réponse avec les informations du véhicule
request.done(function(msg){
	res=$.parseJSON(msg);

console.log(res.id);


if(res.id != null)
{
				//affichage des infos vehicule
				$("#afficheVehicule").empty().append('\
								<div class="panel panel-warning" style="width:874px;"> \
								  <div class="panel-heading"> \
								        <h3 class="panel-title">Suppression vehicule</h3> \
								    </div> \
								    <div class="panel-body" style="height:150px;"> \
								    <table class="table table-hover"> \
											    <thead>\
											        <tr>\
											        <th>Type</th>\
											            <th>Marque</th>\
											            <th>Modele</th>\
											            <th>Plaque</th>\
											        </tr>\
											    </thead>\
											    <tbody>\
											        <tr>\
											            <td>'+res.type+'</td>\
											            <td>'+res.marque+'</td>\
											            <td>'+res.modele+'</td>\
											            <td>'+res.plaque+'</td>\
											             </tr>\
											             </tbody>\
											</table>\
											 <input type="button" id="boutonSupprimerVehicule" class="btn btn-success" style="float:right;" value="Supprimer">\
								    </div>\
								    </div>\
				');

					
					//lorsque l'on clic sur le bouton SupprimerVehicule
					$("#boutonSupprimerVehicule").click(function (){
					//on envoi l'id du vehicule à supprimer à la page traitementSuppressionVehicule.php
					$.ajax({ 
								type: "POST", 
								url: "traitementSuppressionVehicule.php", 
								data: {id:res.id},
				 
							}).done(function(msg){
								//affichage d'un pop up de confirmation
								$("#modal-sup-Vehicule").modal("show");
								$("#afficheVehicule").empty();
								$('#plaque').val('');
							});

				});
}else
{

	$("#afficheVehi").empty().html('<span> Ce vehicule n existe pas !</span>');

}



});

return false;

});

});



			
