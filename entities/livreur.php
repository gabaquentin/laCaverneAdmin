<?PHP
class livreur{
	private $cin;
	private $nom;
	private $prenom;
	private $numtelephone;
	private $email;
	
	function __construct($cin,$nom,$prenom,$numtelephone,$email){
		$this->cin=$cin;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->numtelephone=$numtelephone;
		$this->email=$email;
		
	}
	
	function getCin(){
		return $this->cin;
	}
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getNum(){
		return $this->numtelephone;
	}
	function getMail(){
		return $this->email;
	}
	

	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom;
	}
	function setNum($numtelephone){
		$this->numtelephone;
	}
	function setMail($email){
		$this->email;
	}
	
	
}

?>