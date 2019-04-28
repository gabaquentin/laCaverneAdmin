function verif() {
        erreur = 0;
        with(document.hey) {
             if(exampleInputName1.value == "" || exampleInputEmail3.value == "" || exampleInputPassword4.value == "" || exampleInputCity1.value == "" ) {
                alert("Veuillez remplir le champs : nom_dun_champs");
                erreur = 1;
             }
        }
        if(erreur == 0) {
           return true;
        } else {
            return false;
        } 
}

function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "#B0F2B6";

}
function verifname(champ)
{
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
function verifForm(f)
{
   var pseudoOk = verifname(f.sarra);
  
   if(pseudoOk )
      return true;
   
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}

function verifref(champ)
{
   var ref = parseInt(champ.value);
   if(isNaN(ref) || ref < 5 )
   {
      alert("veuillez verifier votre reference")
      return false;
   }
   else
   {
      alert("champs bien rempli")
      return true;
   }
}