<?php

namespace ZarulIzham\EcommercePayment\Messages;

use Illuminate\Support\Facades\Validator;
use ZarulIzham\EcommercePayment\Contracts\Message as Contract;
use ZarulIzham\EcommercePayment\Models\EcommerceTransaction;

class AuthorizationRequest implements Contract
{
    /**
     * Message Url
     */
    public $url;

    public function __construct()
    {
        $this->password = config('ecommerce.password');
        $this->merchantAccountNo = config('ecommerce.merchant_account_no');
        $this->paymentWindowUrl = config('ecommerce.payment_window_url');
        $this->directPath = config('ecommerce.direct_path');
        $this->directUrl = config('ecommerce.direct_url');
        $this->callbackPath = config('ecommerce.callback_path');
        $this->callbackUrl = config('ecommerce.callback_url');
        $this->transactionType = config('ecommerce.transaction_type');
        $this->responseType = config('ecommerce.response_type');
    }

    /**
     * handle a message
     *
     * @param array $options
     * @return mixed
     */
    public function handle($options)
    {
        $data = Validator::make(
            $options,
            [
                'TXN_DESC' => 'required',
                'AMOUNT' => 'required|numeric',
                'reference_id' => 'nullable',
            ],
            [
                'AMOUNT.required' => __('Amount is required.'),
                'AMOUNT.numeric' => __('Amount must be numeric.'),
                'AMOUNT.TXN_DESC' => __('Transaction Description is required.'),
            ],
        )->validate();

        foreach ($data as $index => $value) {
            $this->$index = $value;
        }
        $this->amount = $data['AMOUNT'];
        $this->description = $data['TXN_DESC'];
        $this->signMessage($data);
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
        return collect($this->dataToSign);
    }

    /**
     * Save request to transaction
     */
    public function saveTransaction()
    {
        $transaction = new EcommerceTransaction();
        $transaction->reference_id = $this->reference_id;
        $transaction->transaction_id = $this->reference_id;
        $transaction->amount = $this->amount;
        $transaction->request_payload = $this->list();
        $transaction->save();
    }

    public function signMessage($data)
    {
        $allowedParams = [
            'MERCHANT_ACC_NO', 'MERCHANT_TRANID', 'AMOUNT', 'TRANSACTION_TYPE', 'SECURE_SIGNATURE', 'RESPONSE_TYPE', 'TXN_URL', 'RETURN_URL', 'TXN_DESC', 'CUSTOMER_ID', 'FR_HIGHRISK_EMAIL', 'FR_HIGHRISK_COUNTRY', 'FR_BILLING_ADDRESS', 'FR_SHIPPING_ADDRESS', 'FR_SHIPPING_COST', 'FR_PURCHASE_HOUR', 'CUSTOMER_IP', 'PYMT_IND', 'PYMT_CRITERIA',
        ];

        $this->dataToSign = array_merge($data, [
            'AMOUNT' => $this->amount,
            'MERCHANT_ACC_NO' => $this->merchantAccountNo,
            'MERCHANT_TRANID' => $this->reference_id,
            'RESPONSE_TYPE' => $this->responseType,
            'RETURN_URL' => $this->directUrl,
            'TRANSACTION_TYPE' => $this->transactionType,
            'TXN_DESC' => $this->description,
        ]);

        ksort($this->dataToSign);

        unset($this->dataToSign['reference_id']);

        $message = config('ecommerce.password') .  implode('', array_values($this->dataToSign));
        $this->signature = hash('sha512', $message);
        $this->dataToSign['SECURE_SIGNATURE'] = $this->signature;
    }
}
