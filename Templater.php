<?php
/**
* Appointment: Template Class
* File: Templater.php
* Engine: Fast Engine
* URL: https://fast-engine.org/
* Author: Alexandr Drozd
* Email: alexandr1drozd@gmail.com
*/

class Templater {
	
	var $dir = '.',
	    $type = '.tpl',
	    $temp = array(),
	    $get = array();
		
	function __construct($dir, $type){
		if($dir) $this->dir = $dir;
		if($type) $this->type = $type;
	}
	
	public function compile($tpl, $data, $blocks = false, $res = 'main', $cache = true){
		
		if($tpl OR file_exists($this->dir.$tpl.$this->type)){
			if(!$cache OR !$this->get[$res])
				$this->temp[$res] = file_get_contents($this->dir.$tpl.$this->type);
			
			$temp = str_replace(array_keys($data), array_values($data), $this->temp[$res]);
			
			if (is_array($blocks)){
				foreach ($blocks as $key => $value) {
					$temp = preg_replace("#\\[".$key."\\](.*?)\\[/".$key."\\]#is", $value ? "$1" : "", $temp);
				}
			}
			
			if(isset($this->get[$res]) and $this->get[$res])
				$this->get[$res] .= $temp;
			else
				$this->get[$res] = $temp;
			
			return $temp;
			
		} else
			die("No template file: ".$this->dir.$tpl.$this->type);
	}

	function clear() {
		$this->get = array();
		$this->data = array();
	}
}
?>
