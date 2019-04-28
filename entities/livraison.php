<?PHP
class Livraison{
	private $ref;
	private $nom;
	private $prenom;
	private $mail;
	private $numtel;
	private $ville;
	private $adresse;
	private $codepostal;
	private $livreur;
	
	function __construct($ref,$nom,$prenom,$mail,$numtel,$ville,$adresse,$codepostal,$livreur){
		$this->ref=$ref;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->codepostal=$codepostal;
		$this->ville=$ville;
		$this->adresse=$adresse;
		$this->numtel=$numtel;
		$this->mail=$mail;
		$this->livreur=$livreur;
		
	}
	
	function getRef(){
		return $this->ref;
	}
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getAdresse(){
		return $this->adresse;
	}
	function getCodepostal(){
		return $this->codepostal;
	}
	function getVille(){
		return $this->ville;
	}
	function getNumtel(){
		return $this->numtel;
	}
	function getMail(){
		return $this->mail;
	}
	function getLivreur(){
		return $this->livreur;
	}
	
	
function setRef($ref){
		$this->ref=$ref;
	}
	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom=$prenom;
	}
	function setAdesse($adresse){
		$this->adresse=$adresse;
	}
	function setCodepostal($codepostal){
		$this->codepostal=$codepostal;
	}
	function setVille($ville){
		$this->ville=$ville;
	}
	function setNumtel($numtel){
		$this->numtel=$numtel;
	}
	function setMail($mail){
		$this->mail=$mail;
	}

	function setLivreur($livreur){
		$this->livreur=$livreur;
	}
	
	
	
}

?>