<?php

namespace Omnipay\Migs\Message;

use Omnipay\Tests\TestCase;

class TwoPartyPurchaseResponseTest extends TestCase
{
    public function testTwoPartyPurchaseSuccess()
    {
        $httpResponse = $this->getMockHttpResponse('TwoPartyPurchaseSuccess.txt');
        $response = new Response($this->getMockRequest(), $httpResponse->getBody());

        $this->assertInstanceOf('Omnipay\Migs\Message\Response', $response);
        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('12345', $response->getTransactionReference());
        $this->assertSame('Approved', $response->getMessage());
        $this->assertSame('0', $response->getCode());
    }

    public function testTwoPartyPurchaseFailure()
    {
        $httpResponse = $this->getMockHttpResponse('TwoPartyPurchaseFailure.txt');
        $response = new Response($this->getMockRequest(), $httpResponse->getBody());

        $this->assertInstanceOf('Omnipay\Migs\Message\Response', $response);
        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('12345', $response->getTransactionReference());
        $this->assertSame('Declined', $response->getMessage());
        $this->assertSame('2', $response->getCode());
    }
}
