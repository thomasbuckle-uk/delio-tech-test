<?php

namespace App\Controller;

use App\Finnhub\src\Enum\SymbolEnum;
use App\Finnhub\src\Service\Factory\ShareAPIServiceFactory;
use App\Finnhub\src\Service\ShareAPIService;
use App\Statistics\Service\QuoteDtoService;
use MongoDB\BSON\Symbol;
use OpenApi\Annotations as OA;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/api/shares')]
final class ShareController extends AbstractController
{
    private LoggerInterface $logger;
    private ShareAPIService $apiService;
    private QuoteDtoService $quoteDtoService;


    public function __construct(LoggerInterface $logger, string $finnhubApiKey, QuoteDtoService $quoteDtoService)
    {
        $this->logger = $logger;
        $this->apiService = (new ShareAPIServiceFactory($finnhubApiKey))->create();
        $this->quoteDtoService = $quoteDtoService;
    }

    #[Route('/retrieve-latest', methods: ['POST'])]
    /**
     * Contact Finnhub API and retrieve APPLE & MICROSOFT shares
     * then store in database
     * @OA\Tag(name="Retrieve Latest Finnhub")
     * @OA\Response(
     *     response=200,
     *     description="Contact Finnhub API and retrieve APPLE & MICROSOFT shares then store in database",
     * )
     * */

    public function finnhubDataRetrieve(Request $request): Response
    {
        $fetchParams = array(
            SymbolEnum::APPLE,
            SymbolEnum::MICROSOFT
        );

        $results = $this->apiService->fetchQuotes($fetchParams);

        foreach($results as $quoteTo)
        {
            $this->quoteDtoService->insertQuote($quoteTo);
        }
        //Then save to Database;

        return $this->json('Succcess', 200);
    }


}
