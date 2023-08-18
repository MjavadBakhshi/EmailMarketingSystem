<?php

namespace Tests\Feature\Subscriber;

use Domain\Subscriber\DataTransferObjects\FormData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use Domain\Subscriber\Models\Form;

class FormFunctionalityTest extends TestCase
{
    use RefreshDatabase;

    public function test_DTO_creation_of_form(): void
    {
        $form = Form::factory()->create();

        $formDTOFromModel = $form->getData();
        $formDTOFromArray = FormData::from($form->toArray());


        $this->assertEquals($formDTOFromModel, $formDTOFromArray);
    }
}
