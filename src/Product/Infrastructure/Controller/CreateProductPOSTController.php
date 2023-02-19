<?php

declare(strict_types=1);

namespace App\Product\Infrastructure\Controller;

use App\Product\Application\Create\ProductCreator;
use App\Product\Application\DTO\RequestProductCreator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CreateProductPOSTController extends AbstractController
{
    public function __invoke(Request $request, ProductCreator $productCreator): JsonResponse
    {
        $payload = json_decode($request->getContent(), true);
        $requestProductCreator = new RequestProductCreator(
          $payload['id'],
          $payload['name'],
          $payload['description'],
          $payload['price'],
          $payload['stock'],
              $payload['active'] ?? false
        );

        $productCreator($requestProductCreator);

        return new JsonResponse(null, Response::HTTP_CREATED);
    }
}