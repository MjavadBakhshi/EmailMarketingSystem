<?php

namespace Domain\Shared\Models\Scopes;

use Illuminate\Database\Eloquent\{Builder, Model, Scope};

class UserScope implements Scope 
{

    public function apply(Builder $builder, Model $model)
    {
        if($user = request()->user())
            $builder->whereBelongsTo($user);
    }    
}