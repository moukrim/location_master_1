$(document).ready(function () {
   $("#register").click(function(){

      var mdp=$("#mdp").val();
      var mdp_confirm=$("#mdp_confirmation").val();
      var nom=$("#nom").val();
      var prenom=$("#prenom").val();
      var email=$("#email").val();

      if(prenom.length==''){
         $("#erreurprenom").html('<span style="color:red;">Veuillez écrire un prénom!!</span>').show();
         $("#erreurprenom").delay(2000).hide("slow" );
         return false;

      }
   
      if(nom.length==''){
         $("#erreurnom").empty().html('<span style="color:red;">Veuillez écrire un nom!!</span>').show();
         $("#erreurnom").delay(2000).hide("slow" );
         return false;

      }

      if(email.length==''){
         $("#erreurmail").empty().html('<span style="color:red;">Veuillez écrire une adresse mail!!</span>').show();
         $("#erreurmail").delay(2000).hide("slow" );
         return false;

      }

       if(!isValidEmailAddress(email)){
        $("#erreurmail").empty().html('<span class="erreurmail" style="color:red;">Adresse mail invalide!</span>').show();
        $("#erreurmail").delay(2000).hide("slow" );
        return false;
    }

      if(mdp.length==''){
         $("#erreurmdp").empty().html('<span style="color:red;">Veuillez écrire un mot de passe!!</span>').show();
         $("#erreurmdp").delay(2000).hide("slow" );
         return false;

      }

      if(mdp.length<8){
         $("#erreurmdp").empty().html('<span style="color:red;">Veuillez écrire un mot de passe plus de 8 caractères!!</span>').show();
         $("#erreurmdp").delay(2000).hide("slow" );
         return false;

      }


      if(mdp != mdp_confirm){

         $("#erreurmdpconfirm").empty().html('<span style="color:red;">Confirmation de mot de pass erronée!!</span>').show();
         $("#erreurmdpconfirm").delay(2000).hide("slow" );
         return false;
      }else{

         
         $.ajax({       

                        url: "../php/enregistrer_utilisateur.php",
                        method: "POST",
                        data: { nom : nom , prenom : prenom , mail : email , mdp : mdp },
                        })
                        .done(function( msg ) {
                            if(msg='enregistre'){

                              $("#enregistre").html('<span style="color:green; text-align:center;">L\'enregistrement terminé!! </span>');
                              $("#enregistre").delay(2000).hide("slow" );
                              return false;
                            }
                        });
               }
      

 

});
});


function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
}
