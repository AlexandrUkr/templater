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
	    $data = [],
	    $get = [];
	
	function set($tpl, $data, $res, $cache = true){
		
		if($tpl OR file_exists($this->dir.$tpl.'.tpl')){
			
			if(!$cache OR !$this->get[$res])
				$this->data[0] = file_get_contents($this->dir.$tpl.'.tpl');
			
			$this->data[1] = str_replace(array_keys($data), array_values($data), $this->data[0]);
			
			if(isset($this->get[$res]) and $this->get[$res])
				$this->get[$res] .= $this->data[1];
			else
				$this->get[$res] = $this->data[1];
			
			return $this->data[1];
			
		} else
			die("No template file: ".$this->dir.$tpl.'.tpl');
	}

	function clear() {
		$this->get = [];
		$this->data = [];
	}
}
?>
