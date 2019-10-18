<?php
namespace App\lib;
use nusoap_client;

class zarinpal
{
    public $MerchantID;

    public function __construct()
    {
        $this->MerchantID="6e70bb64-8e33-11e8-a395-005056a205be";
    }

    public function pay($Amount,$Email,$Mobile)
    {
        $Description = 'همپا | خرید آزمون';
        $CallbackURL = route('');

                $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
                $client->soap_defencoding = 'UTF-8';
                $result = $client->call('PaymentRequest', [
                    [
                        'MerchantID'     => $this->MerchantID,
                        'Amount'         => $Amount,
                        'Description'    => $Description,
                        'Email'          => $Email,
                        'Mobile'         => $Mobile,
                        'CallbackURL'    => $CallbackURL,
                    ],
                ]);

                if ($result['Status'] == 100)
                {
                    return $result['Authority'];
                }
                else
                {
                    return false;
                }
    }

}
