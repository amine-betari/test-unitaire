<?php
require dirname(__FILE__) . '/../Registry.php';

class RegistryTest extends \PHPUnit_Framework_TestCase 
{
	//Case
	//{
		public function testReturnsFalseForUnknownKey() 
		{
			$registry = $this->getObjectForTrait('Registry');
//			$registry->set(foo, 'foo');		
			$response = $registry->get('foo');
			$this->assertFalse($response,"Did not get expected false result for unknown key");
		}
	//}
}


