<?php

namespace App\Http\Controllers;

use App\Http\Requests\Registration\StoreRequest;
use App\Models\User;

class RegistrationController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        User::query()->create($data);

        return redirect()->route('orders');
    }
}
