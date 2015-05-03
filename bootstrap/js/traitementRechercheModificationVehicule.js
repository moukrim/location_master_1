var plaque;
$(document).ready(function() {


$("#boutonRechercherVehicule").click(function() {

 plaque=$("#plaque");

			if(plaque.val() == '')
		{
			$("#plaque").focus();
			$("#plaqueInvalide").html('<span>Plaque immatriculation invalide</span>');
			return false;
		}
		
		var request = $.ajax({

		url: "traitementRechercheModificationVehicule.php",
		method: "POST",
		data: {plaque:plaque.val() },

	});

request.done(function(msg){
	res=$.parseJSON(msg);

console.log(res);


if(res.id != null)
{

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
							      		<input type="file" name="file" id="file" style="margin-top: +10px;"/>\
							    	</div>\
							   </div>\
							   <div class="col-sm-offset-4 col-sm-4 col-sm-offset-4">\
										<button type="button" class="btn btn-default" id="boutonModifierVehicule" >Modifier</button>\
									</div>\
							</form>\
										</div>\
				');

					

					$("#boutonModifierVehicule").click(function (){

					$.ajax({ 
								type: "POST", // les variables seront passées en POST 
								url: "traitementModificationVehicule.php", // on appelle le fichier php qui supprime l'element de la base de donnees 
								data: { id:res.id , 
										plaque:$("#plaque").val(), 
										type:$("#type").val(),
										marque:$("#marque").val(), 
										modele:$("#modele").val(),
										kilometrage:$("#kilometre").val(),
										prix:$("#prix").val(),
										prixJour:$("#prixJour").val(),
										image:$("#file").val().replace("C:\\fakepath\\", "") },// variable que l'on passe au fichier php
				 
							}).done(function(msg){
								console.log(msg);
								$("#modal-modif-Vehicule").modal("show");
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



			