<?php

namespace ZarulIzham\EcommercePayment\Messages;

use Ramsey\Uuid\Uuid;
use ZarulIzham\EcommercePayment\Contracts\Message as Contract;
use ZarulIzham\EcommercePayment\Models\EcommerceTransaction;

class AuthorizationConfirmation implements Contract
{
    /**
     * handle a message
     *
     * @param array $options
     * @return mixed
     */
    public function handle($options)
    {
        $this->amount = @$options['AMOUNT'];
        $this->responseCode = @$options['RESPONSE_CODE'];
        $this->transactionId = @$options['TRANSACTION_ID'];
        $this->merchantTransactionId = @$options['MERCHANT_TRANID'];
        $this->responseDescription = @$options['RESPONSE_DESC'];
        $this->responseData = @$options;

        $this->saveTransaction();

        return $this;
    }

    /**
     * Format data for checksum
     * @return string
     */
    public function format()
    {
        return $this->list()->join('|');
    }

    /**
     * returns collection of all fields
     *
     * @return collection
     */
    public function list()
    {
        return collect($this->responseData);
    }

    /**
     * Save response to transaction
     *
     * @return FpxTransaction
     */
    public function saveTransaction(): EcommerceTransaction
    {
        $transaction = EcommerceTransaction::where(['transaction_id' => $this->merchantTransactionId])->firstOrNew();

        $transaction->response_code = $this->responseCode;
        $transaction->response_description = $this->responseDescription;
        $transaction->amount = $this->amount;
        $transaction->response_payload = $this->list();
        $transaction->save();

        return $transaction;
    }
}
