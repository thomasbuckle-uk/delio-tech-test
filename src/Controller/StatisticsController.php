<?php

namespace App\Controller;

use App\Finnhub\src\Service\Factory\ShareAPIServiceFactory;
use App\Statistics\Service\QuoteDtoService;
use OpenApi\Annotations as OA;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/statistics')]
class StatisticsController extends AbstractController
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    #[Route('/profit-loss', methods: ['GET'])]
    /**
     * Calculate Profit Loss for 10 Microsoft & Apple shares based on previous days closing value
     * then store in database
     * @OA\Tag(name="Calculate Profit Loss")
     * @OA\Response(
     *     response=200,
     *     description="Calculate Profit Loss for 10 Microsoft & Apple shares based on previous days closing value ",
     * )
     * */

    public function calculateProfitLoss(): Response
    {
return $this->json('success', 200);
    }
}