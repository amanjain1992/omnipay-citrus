<?php

namespace Omnipay\Citrus\Message;

/**
 * Citrus Authorize Request
 */
class AuthorizeRequest extends SubmitRequest
{
    /**
     * function to create data
     * signature is require for authentication
     * at Citrus
     * @return [type] [description]
     */
    public function getData()
    {
        $data = parent::getData();

        $data['secSignature'] = $this->generateSignature();

        return $data;
    }
}
