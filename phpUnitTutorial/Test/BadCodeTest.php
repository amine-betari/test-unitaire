<?php
require dirname(__FILE__) . '/../BadCode.php';

class BadCodeTest extends \PHPUnit_Framework_TestCase
{
    public function testAuthorizeExitsWhenPasswordNotSet()
    {
        $user = array('username' => 'jtreminio');
        $password = 'foo';

		$badCode = $this->getMockBuilder('\BadCode')
            ->setConstructorArgs(array($user))
            ->setMethods(array('callExit'))
            ->getMock();

		 // var_dump(get_class_methods($badCode));
		 //var_dump(($badCode->callExit()));// return null because it is stubdded
		 //var_dump(($badCode->authorize($password)));  // return true becaus it is not stubdded

		$badCode->expects($this->once())->method('callExit');

		$result = $badCode->authorize($password);
		$this->assertTrue($result);
		
		//$result = $badCode->authorize($password);
		//$this->assertTrue($result);
    }
	
	
	public function testChangingReturnValuesBasedOnInput() 
	{
		$user = array('username' => 'jtreminio');
		$foo = $this->getMockBuilder('BadCode')
			->setConstructorArgs(array($user))
			//->setMethods(array('fooSum'))
			->getMock();
		$start= 1; $end = 110;
		$foo->expects($this->once())->method('fooSum')->with($start,$end)->will($this->returnValue($start + $end));
		//$foo->expects($this->once())->method('fooSum');//->with($start,$end);//->will($this->returnValue($start + $end));
		
		$this->assertEquals(11, $foo->fooSum($start,$end));
	}
	
}
