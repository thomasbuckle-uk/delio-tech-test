<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Quote;
use App\Finnhub\src\Enum\SymbolEnum;
use App\Finnhub\src\Service\Factory\ShareAPIServiceFactory;
use App\Finnhub\src\Service\ShareAPIService;
use App\Statistics\QuoteDtoService;
use App\Statistics\Service\StatisticsService;
use Doctrine\ORM\EntityManagerInterface;
use OpenApi\Annotations as OA;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[Route('/api/statistics')]
class StatisticsController extends AbstractController
{
    private LoggerInterface $logger;
    private ShareAPIService $apiService;
    private QuoteDtoService $quoteDtoService;

    private EntityManagerInterface $em;

    public function __construct(LoggerInterface $logger, string $finnhubApiKey, QuoteDtoService $quoteDtoService, EntityManagerInterface $entityManager)
    {
        $this->logger = $logger;
        $this->apiService = (new ShareAPIServiceFactory($finnhubApiKey))->create();
        $this->quoteDtoService = $quoteDtoService;
        $this->em = $entityManager;
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
     *
     * @throws \JsonException
     */

    public function calculateProfitLoss(): JsonResponse
    {
        $fetchParams = array(
            SymbolEnum::APPLE,
            SymbolEnum::MICROSOFT
        );

        $results = $this->apiService->fetchQuotes($fetchParams);

        foreach ($results as $quoteTo) {
            $this->quoteDtoService->insertQuote($quoteTo);
        }

        // Retrieve AAPL & MSFT Share Prices Current and previous day
        $statsService = new StatisticsService($this->em);

        $results = $statsService->compareCurrentWithPreviousDay($fetchParams, 10);
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $jsonResult = [];

        foreach ($results as $result) {
            $jsonResult[] = $serializer->serialize($result, 'json');
        }


        $response = new JsonResponse();
        $response->setData($jsonResult);


        return $response;


    }
}