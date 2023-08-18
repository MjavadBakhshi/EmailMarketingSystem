<?php

namespace Domain\Subscriber\DataTransferObjects;

use Spatie\LaravelData\Data;

class TagData extends Data {

    function __construct(
        public readonly ?int $id,
        public readonly string $title
    ){}
}