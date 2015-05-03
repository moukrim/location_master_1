var adrMail;
$(document).ready(function() {


$("#boutonRechercherClient").click(function() {
$("#afficheCli").empty();
$("#afficheClient").empty();
 adrMail=$("#adrMail");

			if(adrMail.val() == '')
		{
			$("#adrMail").focus();
			$("#adrMailInvalide").html('<span>Adresse Mail invalide</span>');
			return false;
		}
		
		var request = $.ajax({

		url: "traitementRechercheSuppressionClient.php",
		method: "POST",
		data: {adrMail:adrMail.val() },

	});

request.done(function(msg){
	res=$.parseJSON(msg);

if(res.id != null)
{

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

					$("#boutonSupprimerClient").click(function (){

					$.ajax({ 
								type: "POST",  
								url: "traitementSuppressionClient.php", 
								data: {id:res.id},
				 
							}).done(function(msg){
								//console.log(msg);
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



			