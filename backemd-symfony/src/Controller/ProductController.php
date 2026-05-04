<?php

namespace App\Controller;

use App\Service\LegacyProductService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class ProductController {

    private LegacyProductService $service;
    
    public function __construct(LegacyProductService $service){
    
        $this->service = $service;

    }

    

    #[Route('/api/products', methods: ['GET'])]
    public function index(): JsonResponse{
        
        $data = $this->service->indexProduct();

        return new JsonResponse($data);
    }

    #[Route('/api/products/{id}', methods: ['GET'])]
    public function show(int $id): JsonResponse{

        $data = $this->service->showProduct($id);

        return new JsonResponse($data);
    }

    #[Route('/api/products', methods: ['POST'])]
    public function create(Request $request): JsonResponse {


        $data = json_decode($request->getContent(), true);

        if (!$data) {
            return new JsonResponse([
                'error' => 'Dados inválidos'
            ], 400);
        }

        $response = $this->service->createProduct($data);

        return new JsonResponse($response);

    }


}
