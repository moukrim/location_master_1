//cedric teramo
/*#######################################################*/
/* graphisme pie chart*/
/*#######################################################*/
var dataReponse;
//fonction qui génère des couleurs
function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

$(document).ready(function($){
            //on recupère dataReponse depuis la page tratiementGraph.php
            $.get( "traitementGraph.php", function( data ) {
            dataReponse = $.parseJSON(data);
            console.log(dataReponse);
            var pieData = [];
            //la fonction each permet de parcourir le tableau recupérer de le serveur
            //ind correspond à l'id du vehicule et val à la somme totale qu'a rapporter le véhicule
            $.each(dataReponse,function(ind,val)
                
                {
                        pieData.push({
                            value: val,//somme totale
                            color:  getRandomColor(), //couleur
                            label: 'id:'+ind+'  prix(€)'//on affiche l'id du véhicule
                        });

                });

var ctx = $("#myChart").get(0).getContext("2d");
    var myNewChart = new Chart(ctx);
    new Chart(ctx).Pie(pieData);
});
         
});
