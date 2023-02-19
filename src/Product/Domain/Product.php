<?php

declare(strict_types=1);

namespace App\Product\Domain;

use App\Product\Domain\Event\ProductCreated;
use App\Shared\Domain\AggregateRoot;
use App\Shared\Domain\ValueObject\Uuid;

final class Product extends AggregateRoot
{
    private Uuid $id;
    private string $name;
    private string $description;
    private float $price;
    private int $stock;
    private bool $active;

    public function __construct(Uuid $id, string $name, string $description, float $price, int $stock, ?bool $active = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
        $this->active = $active;
    }

    public static function create(Uuid $id, string $name, string $description, float $price, int $stock, ?bool $active = false): Product
    {
        $product = new Product(
          $id,
          $name,
          $description,
          $price,
          $stock,
          $active
        );

        $product->record(new ProductCreated($product->id->value(), $product->toArray()));

        return $product;
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function stock(): int
    {
        return $this->stock;
    }

    public function active(): bool
    {
        return $this->active;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->__toString(),
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'active' => $this->active
        ];
    }
}