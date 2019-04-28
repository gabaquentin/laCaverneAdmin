<?PHP
class Abonne	{
	private $name;
	private $prenom;
	private $datenaiss;
	private $tel;
	private $email;
	private $adresse;
	private $pass;
	
	function __construct($name,$prenom,$datenaiss,$tel,$email,$adresse,$pass){
		$this->name=$name;
		$this->prenom=$prenom;
		$this->datenaiss=$datenaiss;
		$this->tel=$tel;
		$this->email=$email;
		$this->adresse=$adresse;
		$this->pass=$pass;
	}
	
	function getName(){
		return $this->name;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getDatenaiss(){
		return $this->datenaiss;
	}
	function getTel(){
		return $this->tel;
	}
	function getEmail(){
		return $this->email;
	}
	function getAdresse(){
		return $this->adresse;
	}
	function getPass(){
		return $this->pass;
	}

	function setName($name){
		$this->name=$name;
	}
	function setPrenom($prenom){
		$this->prenom=$prenom;
	}
	function setDatenaiss($datenaiss){
		$this->datenaiss=$datenaiss;
	}
	function setTel($tel){
		$this->tel=$tel;
	}
	function setEmail($email){
		$this->email=$email;
	}
	function setAdresse($adresse){
		$this->adresse=$adresse;
	}
	function setPass($pass){
		$this->pass=$pass;
	}
}

?>