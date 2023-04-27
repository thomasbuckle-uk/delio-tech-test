<?php

namespace App\Tests\Statistics\Service;

use App\Entity\Quote;
use App\Finnhub\src\Enum\SymbolEnum;
use App\Repository\QuoteRepository;
use App\Statistics\Dto\currentPreviousDayDto;
use App\Statistics\Service\StatisticsService;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class StatisticsServiceTest extends TestCase
{
    public function testCompareCurrentWithPreviousDay()
    {
        // Mock EntityManagerInterface
        $entityManager = $this->createMock(EntityManagerInterface::class);

        // Mock Quote repository
        $quoteRepository = $this->getMockBuilder(QuoteRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Mock Quote
        $quote = new Quote();
        $quote->setCurrentPrice(100);
        $quote->setPreviousClosePrice(90);
        $quote->setShareName(SymbolEnum::APPLE);

        // Set up Quote repository mock to return the mock Quote object
        $quoteRepository->expects($this->once())
            ->method('findOneBy')
            ->with(['shareName' => SymbolEnum::APPLE], ['dateTime' => 'DESC'])
            ->willReturn($quote);

        // Set up EntityManagerInterface mock to return the Quote repository mock
        $entityManager->expects($this->once())
            ->method('getRepository')
            ->with(Quote::class)
            ->willReturn($quoteRepository);

        // Create StatisticsService instance
        $statisticsService = new StatisticsService($entityManager);

        // Call the compareCurrentWithPreviousDay method with a single SymbolEnum parameter
        $results = $statisticsService->compareCurrentWithPreviousDay([SymbolEnum::APPLE]);

        // Check that the method returns an array with a single currentPreviousDayDto object
        $this->assertIsArray($results);
        $this->assertCount(1, $results);
        $this->assertInstanceOf(currentPreviousDayDto::class, $results[0]);

        // Check that the currentPreviousDayDto object has the expected values
        $this->assertEquals(SymbolEnum::APPLE, $results[0]->getShareName());
        $this->assertEquals(1000, $results[0]->getTotalCurrent());
        $this->assertEquals(900, $results[0]->getTotalPreviousDay());
        $this->assertEquals(10, $results[0]->getNumberOfShares());
        $this->assertEquals(10, $results[0]->getProfitLossDifference());
    }
}
