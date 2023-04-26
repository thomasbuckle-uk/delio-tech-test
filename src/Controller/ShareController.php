<?php

namespace App\Controller;

use OpenApi\Annotations as OA;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/api/shares')]
final class ShareController extends AbstractController
{
    private LoggerInterface $logger;


    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
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

    public function finnhubDataRetrieve(): Response
    {
        return $this->json('placeholder', 200);
    }


}
