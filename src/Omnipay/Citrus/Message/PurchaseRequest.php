<?php

namespace Omnipay\Citrus\Message;

/**
 * Citrus Purchase Request
 */
class PurchaseRequest extends AuthorizeRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['returnUrl'] = $this->getReturnUrl();

        return $data;
    }
}
