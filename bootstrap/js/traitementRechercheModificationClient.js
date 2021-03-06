//cedric teramo
/*#######################################################*/
/* Recherche et modification d'un client */
/*#######################################################*/

var adrMail;
$(document).ready(function() {

//lorsque l'on clic sur le bouton recherche client
$("#boutonRechercherClient").click(function() {
//on recupère l'adresse mail saisie
 adrMail=$("#adrMail");
 			//vérification du champs
			if(adrMail.val() == '')
		{
			$("#adrMail").focus();
			$("#adrMailInvalide").html('<span>Adresse mail invalide</span>');
			return false;
		}
		
		//envoi de la donnée vers la page traitementRechercheModificationClient.php
		var request = $.ajax({

		url: "traitementRechercheModificationClient.php",
		method: "POST",
		data: {adrMail:adrMail.val() },

	});
//recupération de la réponse avec l'id, le nom, le prenom, l'adresse mail et le mot de passe du client
request.done(function(msg){
	res=$.parseJSON(msg);



if(res.id != null)
{
								//on affiche les infos recupérer dans des input et on modifie si besoin
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
					
					//lorsque l'on clic sur le bouton modifierClient
					$("#boutonModifierClient").click(function (){


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

					//on envoi toutes les données vers la page traitementModificationClient.php afin d'enregistrer les modifs
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
								//affichage d'un pop up de confirmation
								$("#modal-modif-Client").modal("show");
								//on vide la div
								$("#afficheClient").empty();
								//reinitialisation du champ
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



			