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
	    $temp = array(),
	    $get = array();
	
	public function set($tpl, $data, $blocks = false, $res = 'main', $cache = true){
		
		if($tpl OR file_exists($this->dir.$tpl.'.tpl')){
			
			if(!$cache OR !$this->get[$res])
				$this->temp[$res] = file_get_contents($this->dir.$tpl.'.tpl');
			
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
			die("No template file: ".$this->dir.$tpl.'.tpl');
	}

	function clear() {
		$this->get = [];
		$this->data = [];
	}
}
?>
