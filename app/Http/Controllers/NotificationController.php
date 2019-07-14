<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Notification;

class NotificationController extends Controller
{
    public function newMessage(\App\Http\Requests\NewNotification $request)
    {
        $notification = Notification::create($request->all());
        return redirect()->back()->with("success","Mensagem inserida com sucesso!");
    }
}
