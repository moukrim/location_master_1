//cedric teramo
/*#######################################################*/
/* Recherche et modification d'un véhicule */
/*#######################################################*/


var plaque;
$(document).ready(function() {

//lorsque l'on clic sur le bouton recherche vehicule
$("#boutonRechercherVehicule").click(function() {
//on recupère la plaque d'immatriculation saisie
 plaque=$("#plaque");
 			//vérification du champs
			if(plaque.val() == '')
		{
			$("#plaque").focus();
			$("#plaqueInvalide").html('<span>Plaque immatriculation invalide</span>');
			return false;
		}
		//envoi de la donnée vers la page traitementRechercheModificationVehicule.php
		var request = $.ajax({

		url: "traitementRechercheModificationVehicule.php",
		method: "POST",
		data: {plaque:plaque.val() },

	});
//recupération de la réponse avec les informations du véhicule
request.done(function(msg){
	res=$.parseJSON(msg);

console.log(res);


if(res.id != null)
{
 				//on affiche les infos recupérer dans des input et on modifie si besoin
				$("#afficheVehicule").empty().append('\
								<div class="col-sm-12">\
							<form class="form-horizontal" enctype="multipart/form-data">\
							  <div id="typeInvalide"></div>\
							  <div class="form-group">\
							    <label for="Type" class="col-sm-2">Type</label>\
							    <div class="col-sm-12">\
							      <input value="'+res.type+'" type="text" class="form-control" id="type" name="type" placeholder="Type"  >\
							    </div>\
							  </div>\
							  <div id="marqueInvalide"></div>\
							  <div class="form-group">\
							    <label for="Marque" class="col-sm-2">Marque</label>\
							    <div class="col-sm-12">\
							      <input value="'+res.marque+'" type="text" class="form-control" id="marque" name="marque" placeholder="Marque">\
							    </div>\
							  </div>\
							  <div id="modeleInvalide"></div>\
							   <div class="form-group">\
							    <label for="Modele" class="col-sm-2">Modele</label>\
							    <div class="col-sm-12">\
							      <input value="'+res.modele+'" type="text" class="form-control" id="modele" name="modele" placeholder="Modele">\
							    </div>\
							  </div>\
							  <div id="plaqueInvalide"></div>\
							     <div class="form-group">\
							    <label for="Plaque" class="col-sm-2">Immatriculation</label>\
							    <div class="col-sm-12">\
							      <input value="'+res.plaque+'" type="text" class="form-control" id="plaque" name="plaque" placeholder="Plaque d\'immatriculation">\
							    </div>\
							  </div>\
							  <div id="kilometreInvalide"></div>\
							  <div class="form-group">\
							    <label for="Kilometre" class="col-sm-2">Kilometre</label>\
							    <div class="col-sm-12">\
							      <input value="'+res.kilometrage+'" type="text" class="form-control" id="kilometre" name="kilometre" placeholder="Kilometre">\
							    </div>\
							  </div>\
							  <div id="prixInvalide"></div>\
							    <div class="form-group">\
							    <label for="Prix" class="col-sm-2">Prix</label>\
							    <div class="col-sm-12">\
							      <input value="'+res.prix+'" type="text" class="form-control" id="prix" name="prix" placeholder="Prix / Km">\
							    </div>\
							  </div>\
							  <div id="prixJourInvalide"></div>\
							   <div class="form-group">\
							    <label for="PrixJour" class="col-sm-12">Prix / jour</label>\
							    <div class="col-sm-12">\
							      <input value="'+res.prixJour+'" type="text" class="form-control" id="prixJour" name="prixJour" placeholder="Prix / jour">\
							    </div>\
							  </div>\
							 <div id="imageInvalide"></div>\
							  <div class="form-group">\
							  	<label for="Image" class="col-sm-12">Image du vehicule</label>\
							    	<div class="col-sm-12">\
							      		<input value="'+res.image+'" type="file"  name="file" id="file" style="margin-top: +10px;"/>\
							    	</div>\
							   </div>\
							   <div class="col-sm-offset-4 col-sm-4 col-sm-offset-4">\
										<button type="button" class="btn btn-default" id="boutonModifierVehicule" >Modifier</button>\
									</div>\
							</form>\
										</div>\
				');

					
					//lorsque l'on clic sur le bouton modifierVehicule
					$("#boutonModifierVehicule").click(function (){
							//on envoi toutes les données vers la page traitementModificationVehicule.php afin d'enregistrer les modifs							
							var type=$("#type");
							var marque=$("#marque");
							var modele=$("#modele");
							var plaque=$("#plaque");
							var kilometre= $("#kilometre");
							var prix=$("#prix");
							var prixJour=$("#prixJour");
							var file=$("#file");
							var nbloc=$("#nbloc");
							var pop=file.val().replace("C:\\fakepath\\", "");

							if(type.val() == '')
							{
								$("#type").focus();			
								$("#typeInvalide").html('<span>Champs Type vide</span>');
							return false;
							}

							if(marque.val() == '')
							{
								$("#marque").focus();
								$("#marqueInvalide").html('<span>Champs Marque vide</span>');
							return false;
							}
							if(modele.val() == '')
							{
								$("#modele").focus();
								$("#modeleInvalide").html('<span>Champs Modele vide</span>');
							return false;
							}

							if(plaque.val() == '')
							{
								$("#plaque").focus();
								$("#plaqueInvalide").html('<span>Champs Immatriculation vide</span>');
							return false;
							}

							if(kilometre.val() == '')
							{
								$("#kilometre").focus();
								$("#kilometreInvalide").html('<span>Champs Kilometre vide</span>');
							return false;
							}

							if(kilometre.val() < '0')
							{
								$("#kilometre").focus();
								$("#kilometreInvalide").html('<span>le kilometrage du véhicule doit être positif !</span>');
							return false;
							}

							if(isNaN(kilometre.val()) == true)
							{
								$("#kilometre").focus();
								$("#kilometreInvalide").html('<span>le kilometrage est un nombre !</span>');
							return false;
							}

							if(prix.val() == '')
							{
								$("#prix").focus();
								$("#prixInvalide").html('<span>Champs Prix vide</span>');
							return false;
							}

							if(prix.val() <0)
							{
								$("#prix").focus();
								$("#prixInvalide").html('<span>le prix doit être positif !</span>');
							return false;
							}

							if(isNaN(prix.val()) == true)
							{
								$("#prix").focus();
								$("#prixInvalide").html('<span>Le prix doit un nombre !</span>');
							return false;
							}

							if(prixJour.val() == '')
							{
								$("#prixJour").focus();
								$("#prixJourInvalide").html('<span>Champs Prix / jour vide</span>');
							return false;
							}

							if(prixJour.val() <0)
							{
								$("#prixJour").focus();
								$("#prixJourInvalide").html('<span>le prix doit être positif !</span>');
							return false;
							}

							if(isNaN(prixJour.val()) == true)
							{
								$("#prixJour").focus();
								$("#prixJourInvalide").html('<span>le prix par jour est un nombre !</span>');
							return false;
							}

							if(file.val() == '')
							{
									$("#imageInvalide").html('<span>Veuillez selectionner une photo du véhicule</span>');
							return false;
							}
												
								$.ajax({ 
								type: "POST", // les variables seront passées en POST 
								url: "traitementModificationVehicule.php",  
								data: { id:res.id , 
										plaque:$("#plaque").val(), 
										type:$("#type").val(),
										marque:$("#marque").val(), 
										modele:$("#modele").val(),
										kilometrage:$("#kilometre").val(),
										prix:$("#prix").val(),
										prixJour:$("#prixJour").val,
										image:$("#file").val().replace("C:\\fakepath\\", "") },// variable que l'on passe au fichier php
				 
							}).done(function(msg){
								console.log(msg);
								//affichage d'un pop up de confirmation
								$("#modal-modif-Vehicule").modal("show");
								//on vide la div
								$("#afficheVehicule").empty();
								//reinitialisation du champ
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



			