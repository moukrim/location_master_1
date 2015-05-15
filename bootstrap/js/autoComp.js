//cedric teramo
/*#######################################################*/
/* permet de recupere les noms des marques, utilisation de l'auto complétion */
/*#######################################################*/
$(document).ready(function($){
			$.get( "traitementMarque.php", function( data ) {
			availableTags = $.parseJSON(data);
			$( "#marque" ).autocomplete({
source: availableTags
});
});
			
});
