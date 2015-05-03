var plaque;
$(document).ready(function() {


$("#boutonRechercherVehicule").click(function() {
$("#afficheVehicule").empty();
$("#afficheVehi").empty();
 plaque=$("#plaque");
console.log(plaque.val());
			if(plaque.val() == '')
		{
			$("#plaque").focus();
			$("#plaqueInvalide").html('<span>Plaque immatriculation invalide</span>');
			return false;
		}
		
		var request = $.ajax({

		url: "traitementRechercheSuppressionVehicule.php",
		method: "POST",
		data: {plaque:plaque.val() },

	});

request.done(function(msg){
	res=$.parseJSON(msg);

console.log(res.id);


if(res.id != null)
{

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

					

					$("#boutonSupprimerVehicule").click(function (){
				//console.log(res.id);


					$.ajax({ 
								type: "POST", // les variables seront passées en POST 
								url: "traitementSuppressionVehicule.php", // on appelle le fichier php qui supprime l'element de la base de donnees 
								data: {id:res.id},// variable que l'on passe au fichier php
				 
							}).done(function(msg){
								//console.log(msg);
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



			