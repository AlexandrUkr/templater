<?php
/**
* Appointment: Template Class
* File: Templater.php
* Author: Alexandr Drozd
* Email: alexandr1drozd@gmail.com
*/
class Templater {
	
	var $dir = '.', 								    // directory template
	    $data = [],								            // temp data
	    $get = [];								            // data output
	
	function set($tpl, $data, $res){
		
		// if file exists
		if($tpl || file_exists($this->dir.$tpl.'.tpl')){
			
			// If this pattern is already in the variable that we will not receive it again
			if(isset($this->get[$res]) and !$this->get[$res]) 
				$this->data[0] = file_get_contents($this->dir.$tpl.'.tpl');

			// We manufacture replacement
			$this->data[1] = str_replace(array_keys($data), array_values($data), $this->data[0]);
			
			// Compile pattern
			if(isset($this->get[$res]) and $this->get[$res]) $this->get[$res] .= $this->data[1];
			else $this->get[$res] = $this->data[1];
		} else
			die("No template file: ".$this->dir.$tpl.'.tpl');
	}
	
	// Clear the template variables
	function clear() {
		$this->get = [];
		$this->data = [];
	}
	
}
?>
