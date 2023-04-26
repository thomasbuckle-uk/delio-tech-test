<?php

namespace App\Finnhub\src\Driver;

use Finnhub\Api\DefaultApi;
use Traversable;

final class SharesDriver implements SharesDriverInterface
{

    private DefaultApi $client;

    public function __construct(DefaultApi $client)
    {
        $this->client = $client;
    }


    public function fetchShares(): Traversable
    {
        // TODO: Implement fetchShares() method.
    }

    public function setCache()
    {
        //TODO Add Caching
    }
}