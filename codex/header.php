     <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="index.php">
                        
                        <img src="img/logocaverne.jpg">
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    Commande
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="afficherEmploye.php">Afficher commande</a>


                                </div>


                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Marketing
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="ajouterEvent.php">Ajouter evenement</a>
                                    <a class="dropdown-item" href="afficherEvent.php">Tous les evenements</a>


                                </div>


                            </li>

                             <li class="nav-item dropdown">
                                <a class="nav-link" href="livraison.php" >
                                    Livraison
                                </a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="products.php">Produits</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="SAV.php">SAV</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Parametres
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Billing</a>
                                    <a class="dropdown-item" href="#">Customize</a>
                                    <a class="dropdown-item" href="accounts.php?compte=admin">Administrateurs</a>
                                    <a class="dropdown-item" href="accounts.php?compte=client">Clients</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img src="<?php if(isset($_COOKIE['pp'])){echo "img/".$_COOKIE['pp']."";}else{}?>" alt="Photo de profil" class="img-fluid" style="border-radius:50%;text-align:center;width:50px;height:50px;" />
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Profil</a>
                                    <a class="dropdown-item" href="login.php">Deconnexion</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>