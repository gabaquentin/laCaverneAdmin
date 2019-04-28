<?PHP
class categorie{
	private $referencee;
	private $nomcat;
	
	
	function __construct($referencee,$nomcat){
		$this->referencee=$referencee;
		$this->nomcat=$nomcat;
		
	}
	function getnom(){
		return $this->nomcat;
	}
	
	function getref(){
		return $this->referencee;
	}
	


	function setnom($nomcat){
		$this->nomcat=$nomcat;
	}
	function setref($referencee){
		$this->referencee;
	}
	
	
}

?>