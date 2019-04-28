<?php
include('core/produitC.php');
include('entities/produit.php');

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

$produit1C=new produitC();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product - Dashboard Admin Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body class="bg02">
    <div class="container">
<?php include("codex/header.php"); ?>
        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Ajouter un produit</h2>
                        </div>
                    </div>
					<form action="views/ajouterproduit.php" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            
                                <div class="input-group mb-3">
                                    <label for="nom" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                        Nom
                                    </label>
                                    <input placeholder="Entrez le nom du produit" id="nom" name="nom" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="reference" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                        Reference
                                    </label>
                                    <input placeholder="Entrez la reference du produit" id="reference" name="reference" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="categorie" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Categorie</label>
                                    <select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="categorie" name="categorie">
									<option selected>Selectionner la categorie</option>
									<?php
									$listeCategories=$produit1C->affichercategories();
									foreach($listeCategories as $row){
										$cat=$row['nomcat'];
											echo"
											<option>$cat</option>
											";
									}
									?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="prix" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                        Prix
                                    </label>
                                    <input placeholder="Entrez le prix du produit" id="prix" name="prix" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-7 col-sm-7">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Description</label>
                                    <textarea class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" rows="3" name="description" placeholder="Entrez la description du produit"></textarea>
                                </div>

                            
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
                            <div class="tm-product-img-dummy mx-auto">
                                <i class="fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('image').click();"></i>
                            </div>
                            <div class="custom-file mt-3 mb-3">
                                <input type="file" id="image" style="display:none;" name="image" />
                                <input type="button" class="btn btn-primary d-block mx-auto" name="image" value="Upload ..." onclick="document.getElementById('image').click();" />
                            </div>
                        </div>
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                        <button type="submit" class="btn btn-primary" name='ajouter'>Ajouter
                                        </button>
                                    </div>
                                </div>
						
                    </div>
					</form>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2018. Created by
                    <a href="http://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a> |  Distributed by <a href="https://themewagon.com" class="text-white tm-footer-link">ThemeWagon</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('#expire_date').datepicker();
        });
    </script>
</body>

</html>