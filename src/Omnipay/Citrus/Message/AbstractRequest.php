<?php

namespace Omnipay\Citrus\Message;

/**
 * Citrus Abstract Request
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $liveEndPoint = 'https://citruspay.com/sslperf/';
    protected $testEndPoint = 'https://sandbox.citruspay.com/sslperf/';

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

    public function getAuthToken()
    {
        return $this->getParameter('auth_token');
    }

    /**
     * Seeting merchant access key
     * @param [type] $value [description]
     */
    public function setAuthToken($value)
    {
        return $this->setParameter('auth_token', $value);
    }

    public function getCurrency()
    {
        return $this->getParameter('currency');
    }

    public function setCurrency($value)
    {
        return $this->setParameter('currency', $value);
    }

    public function getReturnUrl()
    {
        return $this->getParameter('return_url');
    }

    public function setReturnUrl($value)
    {
        return $this->setParameter('return_url', $value);
    }

    /**
     * function to send the data to Citrus
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function sendData($data)
    {
        $url = $this->getLink().'?'.http_build_query($data, '', '&').'&embed=form';
        header('location:'.$url);
    }

    public function getData()
    {
        $this->validate('amount', 'link', 'api_key');

        $data = array();

        $data['data_amount'] = $this->getAmount();
        $data['vanity_url'] = $this->getLink();
        $data['secret_key'] = $this->getApiKey();

        return $data;
    }
}
