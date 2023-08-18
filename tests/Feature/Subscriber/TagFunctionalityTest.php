<?php

namespace Tests\Feature\Subscriber;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use Domain\Subscriber\Models\Tag;
use Domain\Subscriber\DataTransferObjects\TagData;

class TagFunctionalityTest extends TestCase
{
    use RefreshDatabase;

    public function test_DTO_creation_of_tag(): void
    {
        $tag = Tag::factory()->create();

        $tagDTOFromModel = $tag->getData();
        $tagDTOFromArray = TagData::from($tag->toArray());


        $this->assertEquals($tagDTOFromModel, $tagDTOFromArray);
    }
}
