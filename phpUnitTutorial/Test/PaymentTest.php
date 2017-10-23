<?php

namespace phpUnitTutorial\Test;

use phpUnitTutorial\Payment;

//require dirname(dirname(__FILE__)) . '/vendor/ajbdev/authorizenet-php-api/AuthorizeNet.php';
require dirname(__FILE__) . '/../Payment.php';


class PaymentTest extends \PHPUnit_Framework_TestCase
{
	public function testProcessPaymentReturnsTrueOnSuccessfulPayment() 
	{
		$paymentDetails = array(
			'amount'   => 123.99,
			'card_num' => '4111-1111-1111-1111',
			'exp_date' => '03/2013',
		);
		$payment = new Payment();
		
		$response = new \stdClass();
		$response->approved = true;
		$response->transaction_id  = 1;

        //$authorizeNet = new \AuthorizeNetAIM($payment::API_ID, $payment::TRANS_KEY);
		//$authorizeNet = $this->getMock('\AuthorizeNetAIM', array(), array($payment::API_ID, $payment::TRANS_KEY));
		
		// getMockBuilder returns a mock object, which is simply an object that has behavior similar to the original object
		$authorizeNet = $this->getMockBuilder('\AuthorizeNetAIM')
		//->setConstructorArgs(array($payment::API_ID, $payment::TRANS_KEY))->getMock();
		->setMethods(array('authorizeAndCapture'))->getMock();
		
		
		// This code produces a mock object where the methods : Are all stubs, Al return null by default, are easily overridable
		//var_dump(get_class_methods($authorizeNet));
		//var_dump(($authorizeNet->authorizeAndCapture()));
		//var_dump(($authorizeNet->authorizeOnly()));
		//var_dump(($authorizeNet->credit()));

		
		$authorizeNet->expects($this->once())->method('authorizeAndCapture')->will($this->returnValue($response));
		
		$result = $payment->processPayment($authorizeNet, $paymentDetails);
	
		//$this->assertTrue($result);
	}
}
