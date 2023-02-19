<?php

declare(strict_types=1);

namespace App\Product\Application\Create;

use App\Product\Application\DTO\RequestProductCreator;
use App\Product\Domain\Product;
use App\Product\Domain\ProductRepository;
use App\Shared\Domain\Event\DomainEventPublisher;

final class ProductCreator
{
    private ProductRepository $repository;
    private DomainEventPublisher $publisher;

    public function __construct(ProductRepository $repository, DomainEventPublisher $publisher)
    {
        $this->repository = $repository;
        $this->publisher = $publisher;
    }

    public function __invoke(RequestProductCreator $request): void
    {
        $product = Product::create(
            $request->id(),
            $request->name(),
            $request->description(),
            $request->price(),
            $request->stock(),
            $request->active()
        );
        
        $this->publisher->publish(... $product->pullDomainEvents());
        $this->repository->save($product);
    }
}