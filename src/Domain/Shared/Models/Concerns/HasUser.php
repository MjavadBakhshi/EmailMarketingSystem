<?php

namespace Domain\Shared\Models\Concerns;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Domain\Shared\Models\Scopes\UserScope;
use Domain\Shared\Models\User;

trait HasUser {

    function user() :BelongsTo {
        return $this->belongsTo(User::class);
    }

    static function booted() {
        static::addGlobalScope(new UserScope);
    }
}