                           <?PHP
$connect = mysqli_connect("localhost", "root", "", "cave");

if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM produit 
  WHERE nom LIKE '%".$search."%'
  OR categorie LIKE '%".$search."%' 
 
 ";
}
else
{
 $query = "
  SELECT * FROM produit ORDER BY reference
 ";
}
$result = mysqli_query($connect, $query);


//var_dump($listeEmployes->fetchAll());
?>
						   <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Reference</th>
                                        <th scope="col" class="text-center">Categorie</th>
                                        <th scope="col" class="text-center">Prix</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								$i=0;
								while($row = mysqli_fetch_array($result)){
									$i++;
									$nom=$row['nom'];
									$reference=$row['reference'];
									$categorie=$row['categorie'];
									$prix=$row['prix'];
									$description=$row['description'];
									echo "
									<tr>
                                        <th scope='row'>
                                            <input type='checkbox' name='choix[]' value='$reference' aria-label='Checkbox'>
                                        </th>
                                        <td class='tm-product-name'><a href='edit-product.php?reference=$reference'>$nom</a></td>
                                        <td class='text-center'>$reference</td>
                                        <td class='text-center'>$categorie</td>
                                        <td>$prix</td>
                                        <td>$description</td>
                                        <td><a href='views/supprimerproduit.php?reference=$reference'><i class='fas fa-trash-alt tm-trash-icon'></i></a></td>
                                    </tr>
									";
								}
								if($i == 0)
								{
									echo"<p style='color:red;'>aucun resultat pour votre recherche</p>";
								}
								?>
                                </tbody>
                            </table>