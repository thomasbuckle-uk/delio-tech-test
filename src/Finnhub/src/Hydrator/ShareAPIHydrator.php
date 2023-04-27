<?php

declare(strict_types=1);

namespace App\Finnhub\src\Hydrator;

use App\Finnhub\src\Dto\QuoteTo;
use Cassandra\Date;
use DateTime;
use Finnhub\Model\Quote;

class ShareAPIHydrator implements ShareAPIHydratorInterface
{

    /**
     * @param array $data
     * @return QuoteTo
     */
    public function hydrate(string $name, Quote $data): QuoteTo
    {
        return (new QuoteTo())
            ->setName($name)
            ->setC($data['c'])
            ->setD($data['d'])
            ->setDp($data['dp'])
            ->setH($data['h'])
            ->setL($data['l'])
            ->setO($data['o'])
            ->setPc($data['pc'])
            ->setTime(new DateTime('now'));

        //Finnhub PHP SDK is missing time from their own representating of a quote
        // Using a work around above to get current time

//            ->setTime($this->hydrateDate($data['t']));


    }

    /**
     * @param string $t
     * @return DateTime|null
     */
    private function hydrateDate(string $t): ?DateTime
    {
        $time = DateTime::createFromFormat('U', $t);

        return false === $time ? null : $time;
    }
}