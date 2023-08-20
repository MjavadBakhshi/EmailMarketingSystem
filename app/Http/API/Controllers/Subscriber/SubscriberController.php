<?php

namespace App\Http\API\Controllers\Subscriber;

use Illuminate\Http\Request;
use App\Http\API\Controllers\Shared\Controller;

use Domain\Subscriber\Actions\UpsertSubscriberAction;
use Domain\Subscriber\DataTransferObjects\SubscriberData;

class SubscriberController extends Controller
{

    public function index()
    {
        
    }

    public function store(SubscriberData $subscriber)
    {
      

        try {
            $subscriber = UpsertSubscriberAction::execute(
                $subscriber, 
                request()->user()
            );
         
            return $this->successResponse($subscriber->getData()->toArray());
        } 
        catch(\Exception $e) {
            return $this->failedResponse($e->getMessage());
        }
    }

  
    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }    
}
