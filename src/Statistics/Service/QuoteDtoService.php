<?php

namespace App\Statistics\Service;

use App\Entity\Quote;
use App\Finnhub\src\Dto\QuoteTo;
use Doctrine\ORM\EntityManagerInterface;

class QuoteDtoService
{

    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Translates Finnhub QuoteTo DTO to our own Quote Entity and inserts into database
     * @param QuoteTo $quoteTo
     * @return void
     */
    public function insertQuote(QuoteTo $quoteTo): void
    {
        $quote = new Quote();
        $quote->setShareName($quoteTo->getName());
        $quote->setTime($quoteTo->getTime());
        $quote->setChange($quoteTo->getD());
        $quote->setCurrentPrice($quoteTo->getC());
        $quote->setHighPriceOfDay($quoteTo->getH());
        $quote->setLowPriceOfDay($quoteTo->getL());
        $quote->setOpenPriceOfDay($quoteTo->getO());
        $quote->setPercentChange($quoteTo->getDp());
        $quote->setPreviousClosePrice($quoteTo->getPc());

        $this->em->persist($quote);

        $this->em->flush();
    }

}