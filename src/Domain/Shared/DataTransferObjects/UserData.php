<?php

namespace Domain\Shared\DataTransferObjects;
use Spatie\LaravelData\Data;

class UserData extends Data 
{
    function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $password
    ){}

    static function rules():array
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ];
    }
}