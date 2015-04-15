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

        return $data;
    }
}
