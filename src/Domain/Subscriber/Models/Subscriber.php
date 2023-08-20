<?php

namespace Domain\Subscriber\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany};
use Illuminate\Notifications\Notifiable;
use Spatie\LaravelData\WithData;

use Domain\Shared\Models\BaseModel;
use Domain\Shared\Models\Concerns\HasUser;
use Domain\Subscriber\DataTransferObjects\SubscriberData;

class Subscriber extends BaseModel {

    use HasUser, WithData, Notifiable;

    protected $dataClass = SubscriberData::class;

    protected $fillable = [
        'email',
        'first_name', 
        'form_id',
        'last_name',
        'user_id'
    ];

    function fullName(): Attribute {
        return new Attribute(
            get: fn() => "{$this->first_name} {$this->last_name}"
        );
    }

    /** Relations */

    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class);
    } 

    public function form(): BelongsTo {
        return $this->BelongsTo(Form::class)
            ->withDefault();
    }

}