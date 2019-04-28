
<br />
<div style="clear: both">
    <form method="get" action="index.php">
        <input type="text" class='mySearch' id="ls_query_2" placeholder="Entrez une recherche ..." />
        <input type="submit" hidden />
    </form>
</div>

        <div class="row tm-content-row tm-mt-big">
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            
                                <div class="form-group">
								<h2 class="tm-block-title d-inline-block">Comptes Administrateurs</h2>
								<table class="table table-hover table-striped tm-table-striped-even mt-3">
                                   <th></th>
						</table>
                                </div>
							
                        </div>
                    </div>
                    <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
		             <?PHP
                           foreach($listeAdmins as $row){
	                  ?>
                        <li class="tm-list-group-item">
                            <?PHP 
							$nom=$row['nom'];
							$email=$row['email'];
							$pass=$row['motdepasse'];
							$tel=$row['telephone'];
							if(!isset($row['photop']))
							{
								$img="me.png";
							}
								else
								{
							$img=$row['photop'];
								}
							
							echo "<a href='accounts.php?compte=admin&amp;nom=$nom&amp;email=$email&amp;pass=$pass&amp;tel=$tel&amp;img=$img'>$email</a>"; 
							?>
                        </li>
					<?PHP
}
                    ?>
                    </ol>
                    <br />      
                    <div class="tm-table-actions-col-center">
                        <span class="tm-pagination-label">Page</span>
                        <nav aria-label="Page navigation" class="d-inline-block">
                            <ol class="pagination tm-pagination">
                                <?php
                                if(isset($_SESSION['nbpage']))
                                {
                                    //echo $_SESSION['nbpage'];
                                    if(isset($_GET['p']))
                                    {
                                        if($_GET['p'] > 1)
                                        {
                                            echo
                                            "
                                <li class='page-item active'>
                                    <a class='page-link' href='accounts.php?compte=admin&amp;p=1'>1</a>
                                </li>
                                        ";
                                            echo
                                            "
                                <li class='page-item active'>
                                    ...
                                </li>
                                        ";
                                        }
                                        for($i=$_GET['p']-1;$i<=$_SESSION['nbpage']+4;$i++)
                                        {
                                            if($i > 0)
                                            {
                                                echo
                                                "
                                <li class='page-item active'>
                                    <a class='page-link' href='accounts.php?compte=admin&amp;p=$i'>$i</a>
                                </li>
                                        ";
                                                if(($i+1 > $_SESSION['nbpage']) || ($i+1 < 1))
                                                    break;
                                            }
                                        }
                                        if($_GET['p'] < $_SESSION['nbpage'])
                                        {
                                            echo
                                            "
                                <li class='page-item active'>
                                    ...
                                </li>
                                        ";
                                            echo
                                            "
                                <li class='page-item active'>
                                    <a class='page-link' href='accounts.php?compte=admin&amp;p=".ceil($_SESSION['nadmin']/$_SESSION['perpage'])."'>".ceil($_SESSION['nadmin']/$_SESSION['perpage'])."</a>
                                </li>
                                        ";
                                        }
                                    }
                                    else
                                    {
                                        for($i=1;$i<=$_SESSION['nbpage'];$i++)
                                        {
                                            echo
                                            "
                                <li class='page-item active'>
                                    <a class='page-link' href='accounts.php?compte=admin&amp;p=$i'>$i</a>
                                </li>
                                        ";
                                            if($i == 7)
                                                break;
                                        }
                                    }
                                }
                                ?>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title">Editer le compte</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form method="post" action="views/actionAdmin.php" class="tm-signup-form">
                                <div class="form-group">
                                    <label for="nom">Nom du compte</label>
                                    <input value="<?php if(isset($_COOKIE['nom1'])){echo $_COOKIE['nom1'];}else{echo "";}?>" id="nom" name="nom" type="text" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label for="email">Adresse Email</label>
                                    <input value="<?php if(isset($_COOKIE['email2'])){echo $_COOKIE['email2'];}else{echo "";}?>" id="email" name="email" type="email" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label for="pass">Mot de passe</label>
                                    <input value="<?php if(isset($_COOKIE['pass1'])){echo $_COOKIE['pass1'];}else{echo "";}?>" id="pass" name="pass" type="text" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label for="tel">Telephone</label>
                                    <input value="<?php if(isset($_COOKIE['tel1'])){echo $_COOKIE['tel1'];}else{echo "";}?>" id="tel" name="tel" type="tel" class="form-control validate">
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <button type="submit" name="modifier" class="btn btn-primary">Modifier
                                        </button>
                                    </div>
                                    <div class="col-12 col-sm-8 tm-btn-right">
                                        <button type="submit" name="supprimer" class="btn btn-danger">Supprimer le compte
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tm-col tm-col-small">
                <div class="bg-white tm-block">
				<form enctype="multipart/form-data" action="views/modifPhotopAdmin.php" method="get" style="text-align:center;">
                    <h2 class="tm-block-title">Photo du profil</h2>
                    <img src="<?php if(isset($_COOKIE['img'])){$image=$_COOKIE['img'];echo "img/$image";}?>" alt="Profile Image" class="img-fluid" style="border-radius:50%;text-align:center;width:150px;height:150px;">
                    <div class="custom-file mt-3 mb-3">
                        <input id="fileInput" name="img" type="file" style="display:none;" />
                        <input type="button" class="btn btn-primary d-block mx-xl-auto" value="Modifier..." onclick="document.getElementById('fileInput').click();"/>
						</br>
						<input type="submit" value="Envoyer" class="btn btn-primary d-block mx-xl-auto"/>
                    </div>
				</form>
                </div>
            </div>
			
        </div>