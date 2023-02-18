<?php

/**
 * 
 */

class Database
{
	
	private $con;
	public function connect(){
		$this->con = new Mysqli("localhost", "admin", "XII-RPl1234", "khanstore");
		return $this->con;
	}
}

?>