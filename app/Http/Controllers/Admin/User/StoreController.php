<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();
        $password = Str::random(10);
        $data['password'] = Hash::make($password);
        $user = User::firstOrCreate(['email' =>  $data['email']],$data);
        Mail::to($data['email'])->send(new PasswordMail($password)); // в PasswordMail нужно имплементировать
        event(new Registered($user)); //он активирует метод из SendVerifyWithQueueNotification.php
        return redirect()->route('admin.user.index');
    }
}
