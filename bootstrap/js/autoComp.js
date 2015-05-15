$(document).ready(function($){
			$.get( "traitementMarque.php", function( data ) {
			availableTags = $.parseJSON(data);
			$( "#marque" ).autocomplete({
source: availableTags
});
});
			//alert( "Load was performed.");
});
