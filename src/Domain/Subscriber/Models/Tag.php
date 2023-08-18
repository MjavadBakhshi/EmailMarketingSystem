<?php

namespace Domain\Subscriber\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\LaravelData\WithData;

use Domain\Shared\Models\BaseModel;
use Domain\Shared\Models\Concerns\HasUser;
use Domain\Subscriber\DataTransferObjects\TagData;

class Tag extends BaseModel
{
    use HasUser, WithData;
    
    protected $guarded = ['id'];
    protected $dataClass = TagData::class;
    
}
 