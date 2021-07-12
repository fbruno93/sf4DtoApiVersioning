<?php

namespace App\Controller;

use App\Request\Artist\ArtistGetRequest;
use App\Transformer\Database\ArtistResponseTransformer;

use App\Service\AlbumService;
use App\Service\ArtistService;

use Nette\PhpGenerator\Attribute;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Method;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\Property;
use Nette\SmartObject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class ApiController extends AbstractController
{
    #[Route('/api/{apiVersion}/artist/{artistId}', name: 'apiV2', requirements: ['artistId' => '\d+'], priority: 1)]
    #[Route('/api/{apiVersion}/artist/get', name: 'api', priority: 2)]
    public function index(
        ArtistGetRequest $request,
        ArtistService $artistService,
        ArtistResponseTransformer $artistResponseTransformer
    ): JsonResponse
    {
        $artistId = $request->getArtistId();
        $artistObject = $artistService->get($artistId);
        $output = $artistResponseTransformer->transformFromObject($artistObject);
        
        return $this->json($output, JsonResponse::HTTP_OK, [], [
            AbstractNormalizer::GROUPS => [$request->getApiVersion()],
        ]);
    }

    #[Route('/api/album/{albumId}', name: 'album')]
    public function album($albumId, AlbumService $albumService): JsonResponse
    {
        try {
            $album = $albumService->getAlbum($albumId, forCountry:'fr');
        } catch (NotFoundHttpException $e) {
            return $this->json(["message" => 'Album not found'], $e->getStatusCode());
        }

        return $this->json($album);
    }


    #[Route('/api/test', name: 'album')]
    public function test(): JsonResponse
    {
        $member = (new Property('artistId'))
            ->setType('int')
            ->setPrivate()
        ;

        $method = (new Method('getArtistId'))
            ->setPublic()
            ->setBody('return $this->artistId')
            ->addAttribute("Assert\NotBlank", [
                'message' => 'PARAMETER_ARTIST_ID_REQUIRED'
            ])
            ->addAttribute('Assert\Positive', [
                'message' => 'PARAMETER_ARTIST_ID_POSITIVE_NUMBER'
            ])
        ;

        $class = (new ClassType('Test'))
            ->addMember($member)
            ->addMember($method)
        ;

        $namespace = (new PhpNamespace('App\Request'))
            ->addUse('Symfony\Component\HttpFoundation\Request')
            ->addUse('Symfony\Component\Validator\Constraints as Assert')
            ->add($class)
        ;

        dd($namespace->__toString());

        return $this->json([]);
    }
}
