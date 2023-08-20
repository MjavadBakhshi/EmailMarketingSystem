<?php

namespace Tests\Feature\Subscriber;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use Domain\Shared\Models\User;
use Domain\Subscriber\Models\{Subscriber, Tag};

class SubscriberFunctionalityTest extends TestCase
{
    use RefreshDatabase;

    public function test_insert_subscriber_without_tags(): void
    {   

        $subsceriber = Subscriber::factory()->make();

        $response = $this->withHeaders([
            'Authorization' => $this->getToken($subsceriber->user)
        ])
        ->post(route('api.subscriber.store'),$subsceriber->toArray());
        
        $response->assertSuccessful()
            ->assertStatus(200)
            ->assertJson(['ok' => true, 'data' => ['email' => $subsceriber->email]]);

        $this->assertTrue(
            Subscriber::whereId($response->json('data')['id'])
                ->whereUserId($subsceriber->user->id)
                ->exists()
        );
    }

    public function test_insert_subscriber_with_tags(): void
    {   

        $subsceriber = Subscriber::factory()->make();
        
        $tags = Tag::factory()->count(3)->create([
            'user_id' => $subsceriber->user->id,
        ]);

        $response = $this->withHeaders([
            'Authorization' => $this->getToken($subsceriber->user)
        ])
        ->post(route('api.subscriber.store'),[
            ...$subsceriber->toArray(),
            'tag_ids' => $tags->pluck('id')->toArray()
        ]);
        
        $response->assertSuccessful()
            ->assertStatus(200)
            ->assertJson(['ok' => true, 'data' => ['email' => $subsceriber->email]]);

        # check model has been stored?
        $subscriberModel = Subscriber::whereId($response->json('data')['id'])
        ->whereUserId($subsceriber->user->id)->first();

        $this->assertNotNull($subscriberModel);

        # check the tags of the subscriber has been stored ?
        $this->assertEquals(
            $subscriberModel->tags->pluck('id')->toArray(),
            $tags->pluck('id')->toArray()
        );

    }




    private function getToken(User $user):string 
    {
        return  'Bearer ' .str(($user->createToken('command'))->plainTextToken)
                    ->explode('|')->last();
    }
}
