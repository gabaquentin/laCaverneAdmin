<?PHP
include "../core/administrateurC.php";
include "../entities/administrateur.php";
$administrateurC=new AdministrateurC();
if (isset($_GET["img"])){
	$img=$_GET["img"];
	$administrateurC->modifPhotpAdmin($img,$_COOKIE['email1']);
	header("Location: ../accounts.php?compte=admin");
}
else
{
	header('Location: ../accounts.php?compte=admin');
}
?>