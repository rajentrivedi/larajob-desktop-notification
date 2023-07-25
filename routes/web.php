<?php

use App\Events\NewNotificationEvent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Broadcast::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::view('/test', 'test');
Route::get('/socket', function(){

});
Route::get('/desktop-notification', [NotificationController::class, 'newNotificationDesktop'])->name('notification');
Route::get('/web-notification', [NotificationController::class, 'newNotificationWeb'])->name('notification.web');
