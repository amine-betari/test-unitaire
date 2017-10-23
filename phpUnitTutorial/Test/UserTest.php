<?php

namespace phpUnitTutorial\Test;

use phpUnitTutorial\User;

require_once dirname(__FILE__) . '/../User.php';

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testSetPasswordReturnsTrueWhenPasswordSuccessfullySet()
	{
		$details = array();
		$user = new User($details);
		$password = 'fubar';
		$result = $user->setPassword($password);
		$this->assertTrue($result);
    }
	
	public function testGetUserReturnsUserWithExpectedValues()
	{
		$details = array();

		$user = new User($details);

		$password = 'fubar';

		/*$user->setPassword($password);

		$expectedPasswordResult = '5185e8b8fd8a71fc80545e144f91faf2';

		$currentUser = $user->getUser();

		$this->assertEquals($expectedPasswordResult, $currentUser['password']);*/
		
		$expectedPasswordResult = '5185e8b8fd8a71fc80545e144f91faf2';
		$result = $this->invokeMethod($user, 'cryptPassword', array('fubar'));
		$this->assertEquals($expectedPasswordResult, $result);
	}
	
	/**
	 * Call protected/private method of a class.
	 *
	 * @param object &$object    Instantiated object that we will run method on.
	 * @param string $methodName Method name to call
	 * @param array  $parameters Array of parameters to pass into method.
	 *
	 * @return mixed Method return.
	 */
	public function invokeMethod(&$object, $methodName, array $parameters = array())
	{
		$reflection = new \ReflectionClass(get_class($object));
		$method = $reflection->getMethod($methodName);
		$method->setAccessible(true);

		return $method->invokeArgs($object, $parameters);
	}

}
