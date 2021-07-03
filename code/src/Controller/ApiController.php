<?php

namespace App\Controller;

use App\Request\Artist\ArtistGetRequest;
use App\Response\Transformer\ArtistResponseTransformer;

use App\Service\ArtistService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/{apiVersion}/artist/{artistId}', name: 'api')]
    public function index(
        ArtistGetRequest $request,
        ArtistService $artistService,
        ArtistResponseTransformer $artistResponseTransformer
    ): Response
    {
        $artistId = $request->getArtistId();
        $artistObject = $artistService->get($artistId);
        $output = $artistResponseTransformer->transformFromObject($artistObject);
        
        return $this->json($output, Response::HTTP_OK, [], [
            'groups' => [$request->getApiVersion()],
        ]);
    }
}
