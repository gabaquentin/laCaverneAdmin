document.getElementById("tel").addEventListener("input", function(e){
	var verifnum=document.getElementById("erreur");
	if(this.value.length !== 8 ){
		verifnum.innerHTML= "Entrez un numero a 8 chiffres";
	}
	else{
		e.preventDefault();
		verifnum.innerHTML="";
	}	
})
/* Mdp simulatané
document.getElementById("confirm_mdp").addEventListener("input", function(e){
	var verifmdp= document.getElementById("erreur");
	if(this.value != document.getElementById("mdp").value){
		verifmdp.innerHTML= "Les motde passe ne sont pas similaires ";
	}
	else{
		e.preventDefault();
		verifmdp.innerHTML="";
	}
})
*/
document.getElementById("inscription").addEventListener("submit", function(e){
	var erreur="";
	var erreur_email="";
	var erreur_num="";
	//var erreur_mdp="";
	var inputs=this.getElementsByTagName("input");
	for(var i=0;i< inputs.length;i++){
		if(!inputs[i].value){
			erreur="Veillez verifier les données saisies ";
		}
	}
	/* Verif Email */ 
	var mail=inputs["email"].value;
	var part1=mail.substring(0,mail.indexOf("@"));
	var part2=mail.substring(mail.indexOf("@")+1,mail.indexOf("."));
	var part3=mail.substring(mail.indexOf(".")+1,mail.length);
	if((part2 !== "gmail" || part3!== "com") && (part2 !== "yahoo" || part3!== "fr") && (part2 !== "esprit" || part3!== "tn")){
		erreur_email= "Email Incorrect ";
	}
	else{
		erreur_email="";
	}
	/* Fin Email */
	/* Mot de passe 
	if(inputs["confirm_mdp"].value != inputs["mdp"].value){
		erreur_mdp= "Les motde passe ne sont pas similaires ";
	}
	else{
		erreur_mdp="";
	}
 Fin mot de passe */
	/* Longueur */
	if(inputs["tel"].value.length !== 8){
		erreur_num = "Trop tetu Entrez un numero a 8 chiffres";
	}
	else{
		erreur_num="";
	}
	/* Fin longueur */
	if(erreur_email || erreur_num){
		e.preventDefault();
		document.getElementById("erreur").innerHTML="<u>NB:</u> <br>"+"- "+erreur+"<br>- "+erreur_email+"<br>- "+erreur_num;
	}
	else{
		
	}
	
})