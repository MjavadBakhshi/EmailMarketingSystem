<?php

namespace Database\Factories\Subscriber;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Domain\Shared\Models\User;
use Domain\Subscriber\Models\Tag;

class TagFactory extends Factory
{
    protected $model = Tag::class;


    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'user_id' => User::factory()
        ];
    }
}