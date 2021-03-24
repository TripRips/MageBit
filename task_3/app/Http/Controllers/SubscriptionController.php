<?php

namespace App\Http\Controllers;
use App\Subscription;
use App\Http\Requests\ValidationReq;

class SubscriptionController
{
    public function index()
    {
        return view('subscription');
    }

    public function store(ValidationReq $request)
    {

        $new_subscription = new Subscription([
            'email'          =>  $request->get('email'),
        ]) ;

        $new_subscription->save() ;

        return redirect('/subscription');
    }
}
