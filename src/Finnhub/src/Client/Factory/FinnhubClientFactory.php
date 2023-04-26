<?php

declare(strict_types=1);

namespace App\Finnhub\src\Client\Factory;

use Finnhub\Configuration;
use Finnhub\Api\DefaultApi;
use GuzzleHttp\Client;
use http\Env;

final class FinnhubClientFactory
{
    public static function create(): DefaultApi
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('token', getenv('FINNHUB_API_KEY'));
        return new DefaultApi(
            new Client(),
            $config
        );


    }

}