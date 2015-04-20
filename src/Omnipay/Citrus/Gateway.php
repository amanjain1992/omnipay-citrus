<?php

namespace Omnipay\Citrus;

use Omnipay\Common\AbstractGateway;

/**
 * Citrus Gateway
 *
 * @link http://docs.Citrus.com/
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Citrus';
    }

    public function getDefaultParameters()
    {
        return array(
            'api_key' => '',
            'vanity_url' => '',
            'currency' =>'',
        );
    }

    /**
     * Public function to set Secrer key 
     * @return [type] [description]
     */
    public function getApiKey()
    {
        return $this->getParameter('api_key');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('api_key', $value);
    }

    public function getLink()
    {
        return $this->getParameter('link');
    }

    /**
     * public function to set vanity url
     * @param [type] $value [description]
     */
    public function setLink($value)
    {
        return $this->setParameter('link', $value);
    }

    public function getAuthToken()
    {
        return $this->getParameter('auth_token');
    }

    public function getOrderId()
    {
        return $this->getParameter('order_id');
    }

    public function setOrderId($value)
    {
        return $this->setParameter('order_id', $value);
    }

    /**
     * Seeting merchant access key
     * @param [type] $value [description]
     */
    public function setAuthToken($value)
    {
        return $this->setParameter('auth_token', $value);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Citrus\Message\PurchaseRequest', $parameters);
    }

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Citrus\Message\AuthorizeRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Citrus\Message\CompletePurchaseRequest', $parameters);
    }
}
