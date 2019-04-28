<?php
include('core/livraisonC.php');
include('entities/livraison.php');

if(isset($_GET['email']))
{
    include('views/rafraichirCookie.php');
}
else if(isset($_COOKIE['email']))
{
    include('views/rafraichirCookie.php');
}
else
{
	header('login.php');
}

$livraison1C=new livraisonC();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Page - Dashboard Template</title>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="reportsPage" class="bg02">
    <div class="" id="home">
        <div class="container">
<?php include("codex/header.php"); ?>
            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
				<form action='views/supprimerlivraison.php' method='post' name='del'>
                    <div class="bg-white tm-block h-100">
					    <div class="input-group">
     <input type="text" name="search_textL" id="search_textL" placeholder="Recherche" class="form-control" />
    </div>
	</br>
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Livraison</h2>

                            </div>
                        </div>
                        <div class="table-responsive">
                       <div id="resultL"></div>
                        </div>

                        <div class="tm-table-mt tm-table-actions-row">
                            <div class="tm-table-actions-col-left">
							
                                <button class="btn btn-danger">Livraison effectué</button>
								
                            </div>
							
                            <div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <span class="tm-dots d-block">...</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">13</a></li>
                                        <li class="page-item"><a class="page-link" href="#">14</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
					</form>
                </div>

                <div class="col-xl-4 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title d-inline-block">Livreur</h2>
                        <table class="table table-hover table-striped mt-3">
                            <tbody>
									<?php
									$listelivreurs=$livraison1C->afficherlivreurs();
									foreach($listelivreurs as $row){
										$nom=$row['nom'];
										$cin=$row['cin'];
											echo"
                                <tr>
                                    <td><a href='edit-livreur.php?cin=$cin&amp;nom=$nom'>$nom</a></td>
                                    <td class='tm-trash-icon-cell'><a href='views/supprimerlivreur.php?cin=$cin'><i class='fas fa-trash-alt tm-trash-icon'></i></a></td>
                                </tr>
											";
									}
									?>
                            </tbody>
                        </table>

                        <a href="add-livreur.php" class="btn btn-primary tm-table-mt">Ajouter un livreur</a>
                    </div>
                </div>
				
            </div>
            <footer class="row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                        Copyright &copy; 2018. Created by
                        <a href="http://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a> |  Distributed by <a href="https://themewagon.com" class="text-white tm-footer-link">ThemeWagon</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
	<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"codex/livraison.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#resultL').html(data);
   }
  });
 }
 $('#search_textL').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
</body>

</html>