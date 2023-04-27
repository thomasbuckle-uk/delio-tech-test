<?php

namespace App\Finnhub\src\Service\Factory;

use App\Finnhub\src\Driver\Factory\ShareDriverFactory;
use App\Finnhub\src\Hydrator\ShareAPIHydrator;
use App\Finnhub\src\Service\ShareAPIService;

class ShareAPIServiceFactory
{
    private string $finnhubApiKey ;
    public function __construct(string $finnhubApiKey)

    {
        $this->finnhubApiKey = $finnhubApiKey;
    }

    public function create(): ShareAPIService
    {
        $driver = (new ShareDriverFactory($this->finnhubApiKey))->create();
        $hydrator = new ShareAPIHydrator();
        //TODO Implement Hyrdator
//        $hydrator = new ShareAPIHydrator();

        return new ShareAPIService($driver, $hydrator);
    }
}