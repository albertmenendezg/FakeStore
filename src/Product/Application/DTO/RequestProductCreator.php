<?php

declare(strict_types=1);

namespace App\Product\Application\DTO;

use App\Shared\Domain\ValueObject\Uuid;

final class RequestProductCreator
{
    private Uuid $id;
    private string $name;
    private string $description;
    private float $price;
    private int $stock;
    private bool $active;

    public function __construct(string $id, string $name, string $description, float $price, int $stock, ?bool $active = false)
    {
        $this->id = new Uuid($id);
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
        $this->active = $active;
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
}