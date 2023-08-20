<?php

namespace Domain\Subscriber\Actions;

use Domain\Shared\Models\User;
use Domain\Subscriber\Models\Subscriber;
use Domain\Subscriber\DataTransferObjects\SubscriberData;

class UpsertSubscriberAction {
    
    public static function execute(
        SubscriberData $data,
        User $user
    ): Subscriber {
        
        $subscriber = Subscriber::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                ...$data->all(),
                'form_id' => $data->form?->id,
                'user_id' => $user->id,
            ]
        );

        /** Remove every values which does't exist in the input array and 
         * insert the values which present in the array in the
         * intermediate table.
         */
        $subscriber->tags()->sync(
            $data->tags->toCollection()->pluck('id')
        );

        /** Eager load the subscriber's relationships */
        return $subscriber->load('tags', 'form');
    }
}