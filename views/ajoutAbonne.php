<?PHP
include "../entities/abonne.php";
include "../core/abonneC.php";


if (isset($_POST['name']) and isset($_POST['prenom']) and isset($_POST['datenaiss']) and isset($_POST['tel']) and isset($_POST['email']) and isset($_POST['adresse']) and isset($_POST['pass'] )){
	if($_POST['pass'] == $_POST['pass1'])
	{
$abonne1=new abonne($_POST['name'],$_POST['prenom'],$_POST['datenaiss'],$_POST['tel'],$_POST['email'],$_POST['adresse'],$_POST['pass']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$abonne1C=new abonneC();
$abonne1C->ajouterAbonne($abonne1);
$mail=$_POST['email'];
header("location: ../index.php?email=$mail");
/*
      if ($abonne1C->rechercherDouble($_POST['email']) == 0) 
      {
			 $abonne1C->ajouterAbonne($abonne1);
             setcookie('email', $_POST['email'], time() + 365*24*3600, null, null, false, true);
             header("location: ../index.php");
		 }
		 else
		 {
			 header('Location:../404-page.php?connect=inscription1');
		 }
		 */

}
else
	header('Location:../login.php');
}
//*/

?>