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

        $data['orderAmount'] = $this->getAmount();
        $data['currency'] = $this->getCurrency();
        $data['merchantTxnId'] = $this->getOrderId();

        return $data;
    }

    /**
     * Function to generate the signature
     * link here is vanity url
     * amount is order amount
     * @return [type] [description]
     */
    protected function generateSignature()
    {
        $sign = $this->getlink().$this->getAmount().$this->getOrderId().$this->getCurrency();

        return hash_hmac(
            'sha1',
            $sign,
            $this->getAuthToken()
        );
    }
}
