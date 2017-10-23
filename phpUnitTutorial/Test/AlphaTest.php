<?php

require dirname(__FILE__) . '/../Alpha.php';

class AlphaTest extends \PHPUnit_Framework_TestCase 
{

	public function testbetaProcessCalledExpectedTime()
	{
		$beta = $this->getMockBuilder('\Beta')
				->getMock();

		$beta->expects($this->once())->method('process');

		$deltas = array(-18.023, -14.123, 3.141);

		$alpha = new Alpha($beta);

		$alpha->cromulate($deltas);
	}
}
