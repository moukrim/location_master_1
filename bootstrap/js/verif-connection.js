/*MOUKRIM Yassine*/

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
}


/*#######################################################*/
/* Verifications de connection */
/*#######################################################*/
$( document ).ready(function() {


  $("#submit").click(function(){
       
        var mail = $('#loginname');
        var pass = $('#password') ;
        var login_result = $('#resultatConnexion') ;
        var login_result1 = $('#resultatConnexion1') ;
        
    
    // Verification sur les champs du formulaire
    if (mail.val() == ''){ 
        mail.focus();
        login_result.empty().html('<span class="textErreur">Merci d\'indiquer une adresse mail</span>').show();
        login_result.delay(2000).hide("slow" );
        return false ;
    }
    if(!isValidEmailAddress(mail.val())){
        login_result.empty().html("<span class='textErreur'>Adresse mail invalide!</span>").show();
        login_result.delay(2000).hide("slow" );
        return false;
    }
    if (pass.val() == ''){ 
        pass.focus() ;
        login_result1.empty().html('<span class="textErreur">Merci d\'indiquer votre mot de passe</span>').show();
        login_result1.delay(2000).hide("slow" );
        return false;
    }
        
    // Post de l'adresse email et du password à verif_connexion.php
   $.ajax({ 
            type : 'POST',
            data : {mail:mail.val(), 
                    pass:pass.val()},
            url  : '../php/verif_connection.php',

            success: function(result){ 
                //login_result.html(result);
                console.log(result);
                if(result == "connectionOk"){
                    //login_result.html('<span class="textErreur"></span>');
                    window.location = '../php/index.php'; 
                }
                else if(result == "connectionKo"){
                    login_result.empty().html('<span class="textErreur">Informations données incorrect</span>').show();
                    login_result.delay(2000).hide("slow" );
                    mail.val('');
                    return false;
                    
                }
               
            }
            
        });
        
     

    });


});