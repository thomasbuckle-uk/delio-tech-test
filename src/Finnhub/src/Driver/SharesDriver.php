<?php

namespace App\Finnhub\src\Driver;

use App\Finnhub\src\Enum\SymbolEnum;
use Finnhub\Api\DefaultApi;
use Finnhub\ApiException;
use Finnhub\Model\Quote;
use Traversable;

final class SharesDriver implements SharesDriverInterface
{

    private DefaultApi $client;

    public function __construct(DefaultApi $client)
    {
        $this->client = $client;
    }


    /**
     * @throws ApiException
     */
    public function fetchShares(string $symbol): Quote
    {
        return $this->client->quote($symbol);
    }

    public function setCache()
    {
        //TODO Add Caching
    }
}