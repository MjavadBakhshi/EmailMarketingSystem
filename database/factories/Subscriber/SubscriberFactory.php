<?php

namespace Database\Factories\Subscriber;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Domain\Shared\Models\User;
use Domain\Subscriber\Models\{Form, Subscriber};

class SubscriberFactory extends Factory
{
    protected $model = Subscriber::class;


    public function definition(): array
    {
        $user = User::factory()->create();
        return [
            'first_name' => fake()->name(),
            'last_name' => fake()->lastName(),
            'email' => fake()->email(),
            'form_id' => (Form::factory()->create([
                'user_id' => $user->id
            ]))->id,
            'user_id' => $user->id,
        ];
    }
}