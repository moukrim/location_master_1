var dataReponse;



function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}






$(document).ready(function($){
            $.get( "traitementGraph.php", function( data ) {
            dataReponse = $.parseJSON(data);
            console.log(dataReponse);
            var pieData = [];
            $.each(dataReponse,function(ind,val)
                
                {
                        pieData.push({
                            value: val,
                            color:  getRandomColor(),
                            label: 'id:'+ind+'  prix(€)'
                        });

                });

var ctx = $("#myChart").get(0).getContext("2d");
    var myNewChart = new Chart(ctx);
    new Chart(ctx).Pie(pieData);
});
         
});