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
}
