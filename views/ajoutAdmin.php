<?PHP
include "../entities/administrateur.php";
include "../core/administrateurC.php";


if (isset($_POST['nom']) and isset($_POST['tel']) and isset($_POST['email']) and isset($_POST['pass'] )){
	if($_POST['pass'] == $_POST['pass2'])
	{
$admin1=new Administrateur($_POST['nom'],$_POST['tel'],$_POST['email'],$_POST['pass']);
$admin1C=new administrateurC();
$admin1C->ajouterAdmin($admin1);
$mail=$_POST['email'];
header("location: ../index.php");


}
else
{
	header("location: ../login.php?inscription");
}
}
//*/

?>