<?php

declare(strict_types=1);

namespace App\Product\Infrastructure\Persistence\Doctrine\Repository;

use App\Product\Domain\Product;
use App\Product\Domain\ProductRepository;
use App\Shared\Domain\ValueObject\Uuid;
use App\Shared\Infrastructure\Doctrine\DoctrineAbstractRepository;

final class DoctrineProductRepository extends DoctrineAbstractRepository implements ProductRepository
{

    function entityRepositoryClass(): string
    {
        return Product::class;
    }

    public function save(Product $product): void
    {
        $this->em()->persist($product);
        $this->em()->flush();
    }

    public function findById(Uuid $id): ?Product
    {
        return $this->repository()->find($id);
    }

    public function findAll(): ?iterable
    {
        return $this->repository()->findAll();
    }
}