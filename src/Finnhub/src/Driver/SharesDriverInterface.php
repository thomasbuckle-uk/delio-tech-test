<?php

namespace App\Finnhub\src\Driver;

use App\Finnhub\src\Enum\SymbolEnum;
use Finnhub\Model\Quote;
use Traversable;

interface SharesDriverInterface
{
    public function fetchShares(string $symbol): Quote;
}