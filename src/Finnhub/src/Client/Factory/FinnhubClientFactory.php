<?php

declare(strict_types=1);

namespace App\Finnhub\src\Client\Factory;

use Finnhub\Configuration;
use Finnhub\Api\DefaultApi;
use GuzzleHttp\Client;
use http\Env;

final class FinnhubClientFactory
{

 private string $finnhubApiKey ;
    public function __construct(string $finnhubApiKey)

    {
        $this->finnhubApiKey = $finnhubApiKey;
    }

    public function create(): DefaultApi
    {


        $config = Configuration::getDefaultConfiguration()->setApiKey('token', $this->finnhubApiKey);
        return new DefaultApi(
            new Client(),
            $config
        );


    }

}