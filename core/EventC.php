<?php 
include 'C:/wamp64/www/laCaveAdmin/config.php';
class EventC{
public function ajouterEvent($produit)
	{
		try{
			$it = $produit->getImageTmp();
			$i = $produit->getImage();
			//move the uploaded pictures
			//move_uploaded_file($it,"../uploads/$i");
			
			$c = new config();
			$driver = $c->getConnexion();
			$stmt = $driver->prepare('INSERT INTO event(nom, description, localisation , date, image) 
									  VALUES (:n,:de,:l,:da,:i)');
			$n = $produit->getNom();
			$de = $produit->getDescription();
			$i = $produit->getImage();
			$l = $produit->getLocalisation();
			$da = $produit->getDate();
			$stmt->bindparam(':n', $n);
			$stmt->bindparam(':de', $de);
			$stmt->bindparam(':i', $i);
			$stmt->bindparam(':l', $l);
			$stmt->bindparam(':da', $da);

			$stmt->execute();

		}catch(PDOException $ex){
			echo "Erreur: ".$ex->getMessage();
		}
	}

	public function   afficherEvent()
	{
		try{

			$c = new config();
			$driver = $c->getConnexion();
			$stmt = $driver->prepare('SELECT `nom`, `description`, `localisation`, `date`, `image`, `id` FROM `event`  ');
			$stmt->execute();
			$produits=$stmt->fetchAll();
			return $produits;

		}catch(PDOException $ex){
			echo "Erreur: ".$ex->getMessage();
		}

	}

	public function supprimerEvent($id){
		try{

			$c = new config();
			$driver = $c->getConnexion();
			$stmt = $driver->prepare('DELETE FROM event WHERE id = :id');
			$stmt->bindparam(":id",$id);
			if($stmt->execute())
				header('location: afficherEvent.php');

		}catch(PDOException $ex){
			echo "Erreur: ".$ex->getMessage();
		}
	}

	public function ModifierEvent($produit){
		try{
			$n = $produit->getNom();
			$de = $produit->getDescription();
			$l = $produit->getLocalisation();
			$da = $produit->getDate();
			$i = $produit->getId();

			$c = new config();
			$driver = $c->getConnexion();
			$stmt = $driver->prepare('UPDATE event SET nom = :n,description = :de, localisation = :l ,date = :da where  id = :id');
			
			$stmt->bindparam(':n', $n);
			$stmt->bindparam(':de', $de);
			$stmt->bindparam(':l', $l);
			$stmt->bindparam(':da', $da);
			$stmt->bindparam(':id', $i);
			if($stmt->execute())
				header('location: afficherEvent.php');

		}catch(PDOException $ex){
			echo "Erreur: ".$ex->getMessage();
		}
	}
	 function count($id){
		try{
			$c =new config();
			$driver = $c->getConnexion();
			$stmt = $driver->prepare('SELECT COUNT(vote) as count FROM rating WHERE event_id=:id');
			$stmt->bindparam(":id",$id);
			$stmt->execute();
		 	$l=$stmt->fetchAll(PDO::FETCH_ASSOC);
		 	return $l;
		}catch(PDOException $ex){
			echo "Erreur: ".$ex->getMessage();

	}}	
	 function countstat($id,$inf,$sup){
		try{
			$c =new config();
			$driver = $c->getConnexion();
			$stmt = $driver->prepare('SELECT COUNT(vote) as count FROM rating WHERE event_id=:id and ( vote<=:sup and vote>:inf)');
			$stmt->bindparam(":id",$id);
				$stmt->bindparam(":inf",$inf);
					$stmt->bindparam(":sup",$sup);
			$stmt->execute();
		 	$l=$stmt->fetchAll(PDO::FETCH_ASSOC);
		 	return $l;
		}catch(PDOException $ex){
			echo "Erreur: ".$ex->getMessage();

	}}



public function trierEvent($id){
		try{
			$c =new config();
			$driver = $c->getConnexion();
			$stmt = $driver->prepare('SELECT event_id as id,(SUM(vote)/COUNT(vote)) as moyenne FROM rating WHERE event_id=:id');
			$stmt->bindparam(":id",$id);
			$stmt->execute();
		 	$l=$stmt->fetchAll(PDO::FETCH_ASSOC);
		 	return $l;
		}catch(PDOException $ex){
			echo "Erreur: ".$ex->getMessage();

	}

}

	public function chercherEvent($nom){
		$c = new config();
		$driver = $c->getConnexion();
		$stmt = $driver->prepare("SELECT * FROM event WHERE  nom LIKE:n");
		$stmt->bindparam(':n', $n);
	
		$stmt->execute();
		//var_dump($liste);
		$produits=$stmt->fetchAll();
			//var_dump($produits);
			return $produits;
	}
 public function  getevent()
	{
		try{
			$c = new config();
			$driver = $c->getConnexion();
			$stmt = $driver->prepare('SELECT * FROM event ');
			$stmt->execute();
			//$produits=$stmt->fetchAll();
			//var_dump($produits);
			return $stmt;
		}catch(PDOException $ex){
			echo "Erreur: ".$ex->getMessage();
		}
	}

}
 ?>