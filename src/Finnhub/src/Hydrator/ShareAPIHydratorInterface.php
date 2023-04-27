<?php

namespace App\Finnhub\src\Hydrator;

use App\Finnhub\src\Dto\QuoteTo;
use Finnhub\Model\Quote;

interface ShareAPIHydratorInterface
{

    public function hydrate(string $name, Quote $data): QuoteTo;


}