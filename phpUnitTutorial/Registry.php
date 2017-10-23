<?php

trait Registry 
{
	protected $values = array();
	
	public function set($key, $value) 
	{
		$this->values[$key] = $values;
	}
	
	public function get($key) 
	{
		if(!isset($this->values[$key])) {
			return false;
		}
		return $this->values[$key];
	}
}

