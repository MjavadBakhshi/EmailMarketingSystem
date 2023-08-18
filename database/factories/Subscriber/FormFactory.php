<?php

namespace Database\Factories\Subscriber;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Domain\Shared\Models\User;
use Domain\Subscriber\Models\Form;

class FormFactory extends Factory
{
    protected $model = Form::class;


    public function definition(): array
    {
        return [
            'title' => fake()->words(2, true),
            'content' => fake()->randomHtml(),
            'user_id' => User::factory()
        ];
    }
}