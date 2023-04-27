<?php

declare(strict_types=1);

namespace App\Finnhub\src\Driver\Factory;

use App\Finnhub\src\Client\Factory\FinnhubClientFactory;
use App\Finnhub\src\Driver\SharesDriver;


final class ShareDriverFactory
{

    private string $finnhubApiKey ;
    public function __construct(string $finnhubApiKey)

    {
        $this->finnhubApiKey = $finnhubApiKey;
    }
    public function create(): SharesDriver
    {
//        try {
////            $cache = CacheFactory::create();
//        } catch (\Throwable $throwable) {
//            //Cache not ready :(
//            $cache = null;
//        }

        $client = (new FinnhubClientFactory($this->finnhubApiKey))->create();
        $driver = new SharesDriver($client);


        //TODO implement caching
        $driver->setCache();

        return $driver;
    }

}