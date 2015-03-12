
function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}   

function verifPrenom(champ){
 if(champ.value.length < 2 || champ.value.length > 25)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }

}

function verifNom(champ){
 if(champ.value.length < 2 || champ.value.length > 25)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }

}

function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}


function verifMdp(champ)
{

 if(champ.value.length < 8 )
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifForm(f)
{  var nomOk = verifNom(f.nom);
   var prenomOk = verifPrenom(f.prenom);
   var mailOk = verifMail(f.mail);
   var mdpOk = verifMdp(f.mdp);

   
   if(prenomOk && mailOk && nomOk && mdpOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   
}
}

