<?php  
class Event
{
	private $id;
	private $nom;
	private $description;
	private $localisation;
	private $date;
	private $image;
	private $imageTmp;

	public function setNom($n){
		$this->nom = $n;
	}
	public function setLocalisation($l){
		$this->localisation = $l;
	}
	public function setDate($da){
		$this->date = $da;
	}	
	public function setDescription($de){
		$this->description = $de;
	}	
	public function setId($id){
		$this->id = $id;
	}
	public function setImage($i){
		$this->image = $i;
	}
	public function setImageTmp($i){
		$this->imageTmp = $i;
	}
	public function getImage(){
		return $this->image;
	}
	public function getImageTmp(){
		return $this->imageTmp;
	}
	public function getNom(){
		return $this->nom;
	}
	public function getDate(){
		return $this->date;
	}	
	public function getLocalisation(){
		return $this->localisation;
	}	
	public function getDescription(){
		return $this->description;
	}	
	public function getId(){
		return $this->id;
	}
	function __construct($n,$de, $l, $da, $i, $it){
		$this->nom  	   = $n;
		$this->description = $de;
		$this->localisation=$l;
		$this->date    = $da;
		$this->image       = $i;
		$this->imageTmp    = $it;

	}
}
	?>