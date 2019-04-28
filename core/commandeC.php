<?PHP
include "../config.php";
class commandeC {
    function affichercommande ($commande){
        echo "idcommande: ".$commande->getidcommande()."<br>";
        echo "Nom: ".$commande->gettotal()."<br>";

    }

    }
    function ajoutercommande($commande commande){
        $sql="insert into commande (idcommande,total) values (:idcommande, :total,)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);

            $cin=$commande->getidcommande();
            $nom=$employe->gettotal();

            $req->bindValue(':idcommande',$idcommande);
            $req->bindValue(':total',$total);

            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }

    function affichercommandes(){
        $sql="SElECT * From commande";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimercommande($cin){
        $sql="DELETE FROM commande where idcommande= :idcommande";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':cin',$cin);
        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifiercommande($commande,$idcommande){
        $sql="UPDATE commande SET idcommande=:idcommande, total=:toal WHERE idcommande=:idcommande";

        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);
            $idcommande=$commande->getidcommande();
            $total=$commande->gettotal();
             $datas = array(':idcommande'=>$idcommande, ':total'=>$total,);
            $req->bindValue(':idcommande',$idcommande);
            $req->bindValue(':total',$total);


            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }
    function recuperercommande($cin){
        $sql="SELECT * from commande where idcommande=$idcommande";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    }
}

?>