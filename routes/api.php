<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Jobs\SendEmailJob;
use App\Http\Controllers\ArprojectController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('throttle:5,1')->group(function () {
    Route::get('send-email', function () {
        try {
            $data['email'] = 'ariefraihandiazka@gmail.com';
            dispatch(new SendEmailJob($data));
            
            return response()->json(['message' => 'Email job dispatched successfully'], 200);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Email sending failed: ' . $e->getMessage());

            // Return an error message
            return response()->json(['message' => 'Email sending failed'], 500);
        }
    });
});


Route::post('/callback/ipaymu', [App\Http\Controllers\PaymentController::class, 'handleIPaymuCallback'])
    ->name('payment.handle')
    ->middleware('verifyIpaymuCsrf');

Route::post('/check-user-key', [ArprojectController::class, 'checkUserKey']);
