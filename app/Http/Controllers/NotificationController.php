<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Native\Laravel\Facades\Notification;
use App\Events\NewNotificationEvent;
use App\Http\Requests\NotificationRequest;

class NotificationController extends Controller
{
    public function newNotificationDesktop(NotificationRequest $request)
    {
        $data = $request->validated();
        Notification::title($data['title'])
        ->message($data['body'])
        ->event(NewNotificationEvent::class)
        ->show();
    }

    public function newNotificationWeb(NotificationRequest $request)
    {
        event(new NewNotificationEvent($request->validated()));
    }
}
