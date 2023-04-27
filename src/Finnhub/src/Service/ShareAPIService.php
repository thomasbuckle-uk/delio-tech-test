<?php

namespace App\Finnhub\src\Service;

use App\Finnhub\src\Driver\SharesDriverInterface;
use App\Finnhub\src\Dto\FetchParamsTo;
use App\Finnhub\src\Enum\SymbolEnum;
use App\Finnhub\src\Hydrator\ShareAPIHydratorInterface;
use Generator;
use Traversable;

 class ShareAPIService
{

    private SharesDriverInterface $driver;
    private ShareAPIHydratorInterface $hydrator;

    public function __construct(SharesDriverInterface $driver, ShareAPIHydratorInterface $hydrator)
    {
        $this->driver = $driver;
        $this->hydrator = $hydrator;
    }


    /**
     * @param array<SymbolEnum> $symbolParams

     */
    public function fetchQuotes(array $symbolParams = null): array
    {
        $results = [];
        foreach ($symbolParams as $symbol) {
            $share = $this->driver->fetchShares($symbol);

            $results[] = $this->hydrator->hydrate($symbol, $share);
        }

        return $results;

    }
}