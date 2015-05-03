var adrMail;
$(document).ready(function() {


$("#boutonRechercherClient").click(function() {

 adrMail=$("#adrMail");

			if(adrMail.val() == '')
		{
			$("#adrMail").focus();
			$("#adrMailInvalide").html('<span>Adresse mail invalide</span>');
			return false;
		}
		
		var request = $.ajax({

		url: "traitementRechercheModificationClient.php",
		method: "POST",
		data: {adrMail:adrMail.val() },

	});

request.done(function(msg){
	res=$.parseJSON(msg);



if(res.id != null)
{

				$("#afficheClient").empty().append('\
								<div class="col-sm-12">\
							<form class="form-horizontal" enctype="multipart/form-data">\
							  <div id="nomInvalide"></div>\
							  <div class="form-group">\
							    <label for="Nom" class="col-sm-2 control-label">Nom</label>\
							    <div class="col-sm-12">\
							      <input value="'+res.nom+'" type="text" class="form-control" id="nom" name="nom"   >\
							    </div>\
							  </div>\
							  <div id="prenomInvalide"></div>\
							  <div class="form-group">\
							    <label for="Prenom" class="col-sm-2 control-label">Prenom</label>\
							    <div class="col-sm-12">\
							      <input value="'+res.prenom+'" type="text" class="form-control" id="prenom" name="prenom">\
							    </div>\
							  </div>\
							  <div id="adrMailInvalide"></div>\
							   <div class="form-group">\
							    <label for="Mail" class="col-sm-12">Adresse mail</label>\
							    <div class="col-sm-12">\
							      <input value="'+res.adrMail+'" type="text" class="form-control" id="AdrMail" name="adrMail" placeholder="Mail">\
							    </div>\
							  </div>\
							  <div id="mdpInvalide"></div>\
							     <div class="form-group">\
							    <label for="Mdp" class="col-sm-12 ">Mot de passe</label>\
							    <div class="col-sm-12">\
							      <input value="'+res.mdp+'" type="password" class="form-control" id="mdp" name="mdp" >\
							    </div>\
							  </div>\
								<button type="button" class="btn btn-default" id="boutonModifierClient" >Modifier</button>\
							</form>\
										</div>\
				');
					

					$("#boutonModifierClient").click(function (){

					$.ajax({ 
								type: "POST", 
								url: "traitementModificationClient.php", 
								data: { id:res.id , 
										nom:$("#nom").val(),
										prenom:$("#prenom").val(),
										AdrMail:$("#AdrMail").val(), 
					 					mdp:$("#mdp").val(), 
					 				},				 
							}).done(function(msg){

								$("#modal-modif-Client").modal("show");
								$("#afficheClient").empty();
								$('#AdrMail').val('');
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



			