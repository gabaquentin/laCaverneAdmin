<?PHP
include "../core/administrateurC.php";
include "../entities/administrateur.php";
$administrateurC=new AdministrateurC();
if (isset($_POST["modifier"])){
	$administrateur=new administrateur($_POST['nom'],$_POST['tel'],$_POST['email'],$_POST['pass']);
	$administrateurC->modifierAdmin($administrateur,$_COOKIE['email1']);
	header('Location: ../accounts.php?compte=admin');
}
else if(isset($_POST["supprimer"]))
{
	$administrateurC->supprimerAdmin($_POST["email"]);
	header('Location: ../accounts.php?compte=admin');
}
else
{
	header('Location: ../accounts.php?compte=admin');
}
?>