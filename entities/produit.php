<?PHP
class produit{
	private $reference;
	private $nom;
	private $categorie;
	private $prix;
	private $description;
	private $image;
	function __construct($reference,$nom,$categorie,$prix,$description,$image){
		$this->reference=$reference;
		$this->nom=$nom;
		$this->categorie=$categorie;
		$this->prix=$prix;
		$this->description=$description;
		$this->image=$image;
	}
	
	function getreference(){
		return $this->reference;
	}
	function getnom(){
		return $this->nom;
	}
	function getcategorie(){
		return $this->categorie;
	}
	function getdescription(){
		return $this->description;
	}
	function getprix(){
		return $this->prix;
	}
	function getimage(){
		return $this->image;
	}

	function setreference($reference){
		$this->reference=$reference;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setcategorie($categorie){
		$this->categorie;
	}
	function setdescription($description){
		$this->description=$description;
	}
	function setprix($prix){
		$this->prix=$prix;
	}
	
}

?>