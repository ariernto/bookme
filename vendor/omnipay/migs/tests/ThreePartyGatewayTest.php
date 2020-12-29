<?php

namespace Omnipay\Migs;

use Omnipay\Tests\GatewayTestCase;

class ThreePartyGatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new ThreePartyGateway($this->getHttpClient(), $this->getHttpRequest());

        $this->options = array(
            'amount'        => '10.00',
            'transactionId' => 12345,
            'returnUrl'     => 'https://www.example.com/return',
        );
    }

    public function testPurchase()
    {
        $request = $this->gateway->purchase(array('amount' => '10.00'));

        $this->assertInstanceOf('\Omnipay\Migs\Message\ThreePartyPurchaseRequest', $request);

        $this->assertSame('10.00', $request->getAmount());
    }

    public function testCompletePurchase()
    {
        $request = $this->gateway->completePurchase(array('amount' => '10.00'));

        $this->assertInstanceOf('\Omnipay\Migs\Message\ThreePartyCompletePurchaseRequest', $request);

        $this->assertSame('10.00', $request->getAmount());
    }

    public function testRefund()
    {
        $request = $this->gateway->refund(array(
            'amount' => '10.00',
            'transactionNo' => '1112',
            'user' => 'amauser',
            'password' =>'amapassword'
        ));

        $this->assertInstanceOf('\Omnipay\Migs\Message\ThreePartyRefundRequest', $request);

        $this->assertSame('10.00', $request->getAmount());

        $this->assertSame('1112', $request->getTransactionNo());

        $this->assertSame('amauser', $request->getUser());

        $this->assertSame('amapassword', $request->getPassword());
    }
}
