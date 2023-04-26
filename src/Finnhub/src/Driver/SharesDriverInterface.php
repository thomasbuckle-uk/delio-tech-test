<?php

namespace App\Finnhub\src\Driver;

use Traversable;

interface SharesDriverInterface
{
    public function fetchShares(): Traversable;
}