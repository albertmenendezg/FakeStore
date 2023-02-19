<?php

declare(strict_types=1);

namespace App\Product\Domain;

use App\Shared\Domain\ValueObject\Uuid;

interface ProductRepository
{
    public function save(Product $product): void;
    public function findById(Uuid $id): ?Product;
    public function findAll(): ?iterable;
}