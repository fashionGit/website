<?php
class Product
{
	private $id;
	private $name;
	private $group;

	function __construct($id,$name,$group) {
		$this->id = $id;
		$this->name = $name;
		$this->group = $group;
		
	}

	public function setName($name) {
		$this->name = $name;
	}
	
	public function setGroup($group) {
		$this->group = $group;
	}

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}
	
	public function getGroup() {
		return $this->group;
	}

	
	/**
	 * 
	 * @return multitype: array of imagepaths for product
	 */
	function loadImages(){
		$pdir = scandir("products/".$this->id); // Sortierung A-Z
		$images=array();
		
		foreach ($pdir as $datei) {
				if ($datei != "." && $datei != ".."  && $datei != "_notes") {
					$dateiinfo = pathinfo("products/".$this->id."/".$datei);
					if($dateiinfo['extension']=='jpg'){
					array_push($images,"products/".$this->id."/".$datei);}
				}
		}
		return $images;
	}
	
	/**
	 * @return string|multitype: content of first found description.txt file or false if can't be read
	 */
	function loadDescription(){
		$pdir = scandir("products/".$this->id); // Sortierung A-Z
		$re="";
		foreach ($pdir as $datei) {
				if ($datei != "." && $datei != ".."  && $datei != "_notes") {
						
					$dateiinfo = pathinfo("products/".$this->id."/".$datei);
					if($dateiinfo['basename']=='description.txt'){
						return file_get_contents("products/".$this->id."/".$datei);}
				}
 		}
 		return $re;
	}
}
?>