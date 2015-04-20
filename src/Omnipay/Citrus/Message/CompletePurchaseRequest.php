<?php
namespace Omnipay\Citrus\Message;

class CompletePurchaseRequest extends PurchaseRequest
{

    public function isSuccessful()
    {
        $data = $this->httpRequest->request->all();
        return $data['TxStatus'] =='SUCCESS' ? 1 : 0;
    }
    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $data = $this->httpRequest->request->all();
        
        return $data;
    }

    /**
     * function to get the payment id
     * @return [type] [description]
     */
    public function getTransactionReference()
    {
        $data = $this->httpRequest->request->all();
        return $data['TxId'];
    }
}
