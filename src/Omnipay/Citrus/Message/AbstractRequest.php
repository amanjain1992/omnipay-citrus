<?php

namespace Omnipay\Citrus\Message;

/**
 * Citrus Abstract Request
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $liveEndPoint = 'https://citruspay.com/';
    protected $testEndPoint = 'https://sandbox.citruspay.com/';

    public function getUsername()
    {
        return $this->getParameter('username');
    }

    public function setUsername($value)
    {
        return $this->setParameter('username', $value);
    }

    /**
     * function to set the vanity url
     * @return [type] [description]
     */
    public function getLink()
    {
        return $this->getParameter('link');
    }

    public function setLink($value)
    {
        return $this->setParameter('link', $value);
    }

    public function getApiKey()
    {
        return $this->getParameter('api_key');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('api_key', $value);
    }

    /**
     * Seeting merchant access key
     * @param [type] $value [description]
     */
    public function setAuthToken($value)
    {
        return $this->setParameter('auth_token', $value);
    }

    public function getAuthToken()
    {
        return $this->getParameter('auth_token');
    }

    public function getCurrency()
    {
        return $this->getParameter('currency');
    }

    public function setCurrency($value)
    {
        return $this->setParameter('currency', $value);
    }

    public function getOrderId()
    {
        return $this->getParameter('order_id');
    }

    public function setOrderId($value)
    {
        return $this->setParameter('order_id', $value);
    }

    public function sendData($data)
    {
        return $this->response = new Response($this, $data, $this->testEndPoint.$this->getLink());
    }

    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndPoint : $this->liveEndpoint;
    }

    public function getData()
    {
        $this->validate('amount', 'link', 'api_key', 'order_id');

        $data = array();

        $data['orderAmount'] = $this->getAmount();
        $data['vanity_url'] = $this->getLink();

        return $data;
    }
}
