<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\WebsiteStatusController;

Route::post('/check-website-status', [WebsiteStatusController::class, 'checkWebsiteStatus']);
Route::get('/check-website', function () {
    return view('check-website-status');
});
