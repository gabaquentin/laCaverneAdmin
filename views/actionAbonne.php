<?PHP
include "../config.php";
include "../core/AbonneC.php";
include "../entities/abonne.php";
$abonneC=new AbonneC();
if (isset($_POST["modifier"])){
	$abonne=new abonne($_POST['nom'],$_POST['prenom'],$_POST['datenaiss'],$_POST['tel'],$_POST['email'],$_POST['adresse'],$_POST['pass']);
	$abonneC->modifierAbonne($abonne,$_COOKIE['email1']);
	setcookie('email2', $_COOKIE['email1'], time() + 365*24*3600, null, null, false, true);
	header('Location: ../accounts.php?compte=client');
}
else if(isset($_POST["supprimer"]))
{
	$email=$_POST["email"];
	$abonneC->supprimerAbonne($email);
	header('Location: ../accounts.php?compte=client');
}
else
{
	header('Location: ../accounts.php?compte=admin');
}
?>