<?php

declare(strict_types=1);

namespace App\Product\Domain\Event;

use App\Shared\Domain\Event\DomainEvent;

final class ProductCreated extends DomainEvent
{
    public function eventName(): string
    {
        return 'product.created';
    }
}