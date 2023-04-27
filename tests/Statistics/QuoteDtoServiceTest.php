<?php

namespace App\Tests\Statistics;

use App\Entity\Quote;
use App\Finnhub\src\Dto\QuoteTo;
use App\Statistics\QuoteDtoService;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class QuoteDtoServiceTest extends TestCase
{
    private EntityManagerInterface $entityManager;
    private QuoteDtoService $quoteDtoService;

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->quoteDtoService = new QuoteDtoService($this->entityManager);
    }

    public function testInsertQuote(): void
    {
        $quoteTo = new QuoteTo();
        $quoteTo->setName('Apple Inc');
        $quoteTo->setTime(new \DateTime());
        $quoteTo->setD(-1.23);
        $quoteTo->setC(145.85);
        $quoteTo->setH(146.92);
        $quoteTo->setL(144.63);
        $quoteTo->setO(146.49);
        $quoteTo->setDp(-0.84);
        $quoteTo->setPc(147.85);

        $this->entityManager->expects($this->once())
            ->method('persist');
        $this->entityManager->expects($this->once())
            ->method('flush');

        $this->quoteDtoService->insertQuote($quoteTo);
    }
}
