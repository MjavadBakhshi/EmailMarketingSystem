<?php

namespace Domain\Subscriber\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\LaravelData\WithData;

use Domain\Shared\Models\BaseModel;
use Domain\Subscriber\DataTransferObjects\FormData;

class Form extends BaseModel
{
    use WithData;

    protected $dataClass = FormData::class;
}
