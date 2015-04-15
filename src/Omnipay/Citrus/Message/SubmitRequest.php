<?php

namespace Omnipay\Citrus\Message;

use Omnipay\Citrus\Message\AbstractRequest;

/**
 * Citrus Submit Request
 */
class SubmitRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();

        $this->validate('amount', 'link', 'api_key');

        $data['data_amount'] = $this->getAmount();
        $data['vanity_url'] = $this->getLink();
        $data['secret_key'] = $this->getApiKey();

        return $data;
    }

    protected function generateSignature()
    {
        $sign = $this->getlink().$this->getAmount().uniqid().$this->getCurrency();
        return Zend_Crypt_Hmac::compute($this->getAuthToken(), "sha1", $sign);
    }

    public function getEndpoint()
    {
        return $this->getEndpoint();
    }
}
