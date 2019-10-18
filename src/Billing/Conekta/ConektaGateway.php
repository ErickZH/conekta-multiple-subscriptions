<?php

namespace JJE\Billing\Conekta;

class ConektaGateway
{
    /** @var string */
    private $apiSecret;

    /** @var string */
    private $apiVersion;

    /** @var string */
    private $locale;

    /**
     * ConektaGateway constructor.
     *
     * @param string $apiSecret
     * @param string $apiVersion
     * @param string $locale
     */
    public function __construct(string $apiSecret, string $apiVersion, string $locale = 'es')
    {
        $this->apiSecret = $apiSecret;
        $this->apiVersion = $apiVersion;
        $this->locale = $locale;

        \Conekta\Conekta::setApiKey($apiSecret);
        \Conekta\Conekta::setApiVersion($apiVersion);
        \Conekta\Conekta::setLocale($locale);
    }

    /*
    |--------------------------------------------------------------------------
    | Customers
    |--------------------------------------------------------------------------
    */

    /**
     * Create a new customer in Conekta.
     *
     * @link https://developers.conekta.com/api?language=php#create-customer
     *
     * @param  string  $name
     * @param  string  $email
     * @return array
     */
    public function createCustomer(string $name, string $email)
    {
        $conektaCustomer = \Conekta\Customer::create(compact('name', 'email'));

        return [
            'id' => $conektaCustomer->id,
            'name' => $conektaCustomer->name,
            'email' => $conektaCustomer->email,
        ];
    }
}
