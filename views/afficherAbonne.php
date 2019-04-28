<?PHP
include "../core/AbonneC.php";
$abonne1C=new AbonneC();
$listeAbonnes=$abonne1C->afficherAbonne();

//var_dump($listeEmployes->fetchAll());
?>
<table border="1">
<tr>
<td>Cin</td>
<td>Nom</td>
<td>Prenom</td>
<td>nb heures</td>
<td>tarif horaire</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeAbonnes as $row){
	?>
	<tr>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prenom']; ?></td>
	<td><?PHP echo $row['datenaiss']; ?></td>
	<td><?PHP echo $row['email']; ?></td>
	<td><?PHP echo $row['adresse']; ?></td>
	<td><form method="POST" action="supprimerEmploye.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['email']; ?>" name="cin">
	</form>
	</td>
	<td><a href="modifierEmploye.php?cin=<?PHP echo $row['email']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


