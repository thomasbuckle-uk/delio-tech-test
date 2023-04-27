<?php

namespace App\Statistics\Service;

use App\Entity\Quote;
use App\Finnhub\src\Enum\SymbolEnum;
use App\Statistics\Dto\currentPreviousDayDto;
use Doctrine\ORM\EntityManagerInterface;

class StatisticsService
{


    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @param array<SymbolEnum> $symbolParams
     * @return array<currentPreviousDayDto>
     */
    public function compareCurrentWithPreviousDay(array $symbolParams, int $multiplier = 10): array
    {
        $results = [];
        foreach ($symbolParams as $param) {
            $results[] = $this->em->getRepository(Quote::class)->findOneBy(['shareName' => $param], ['dateTime' => 'DESC']);
        }


        $response = [];

        foreach ($results as $quote) {

            $currentPrice = $quote->getCurrentPrice();
            $previousClosingPrice = $quote->getPreviousClosePrice();

            $currentPreviousDayDto = new currentPreviousDayDto();

            $currentPreviousDayDto->setShareName($quote->getShareName());
            $currentPreviousDayDto->setTotalCurrent($currentPrice * $multiplier);
            $currentPreviousDayDto->setTotalPreviousDay($previousClosingPrice * $multiplier);
            $currentPreviousDayDto->setNumberOfShares($multiplier);
            $currentPreviousDayDto->setProfitLossDifference($currentPrice - $previousClosingPrice);
            $response[] = $currentPreviousDayDto;
        }

        return $response;
    }
}