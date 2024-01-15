<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestApi\RestApiPatientController;
use Illuminate\Support\Facades\Route;

//============================================== Begin: Client-API ============================================
/**
 * View attachment
 * middleware: auth_is_client
 * Example Route should be started with: /api/client/.....
 */
Route::get('client/attachment/{file_name?}', function ($file_name) {
    $fileType = pathinfo($file_name, PATHINFO_EXTENSION);
    $fileType = strtolower($fileType);
    $header = null;

    switch ($fileType) {
        case 'jpg':
            $header = ['Content-type' => 'image/jpeg'];
            break;
        case 'jpeg':
            $header = ['Content-type' => 'image/jpeg'];
            break;
        case 'png':
            $header = ['Content-type' => 'image/png'];
            break;
        case 'pdf':
            $header = ['Content-type' => 'application/pdf'];
            break;
        case 'doc':
            $header = ['Content-type' => 'application/msword'];
            break;
    }

    if (!$header) {
        return;
    }

    $file = Storage::get($file_name);

    return response($file, 200, $header);
})->middleware(['auth_is_client'])->where('file_name', '.*');

/**
 * Remaining Routes
 * middleware: auth:sanctum
 * abilities:is-client
 * Example Routes should be started with: /api/client/.....
 */
Route::middleware(['auth:sanctum', 'abilities:is-client'])->prefix('client')->group(function () {
    Route::post('patient', [RestApiPatientController::class, 'storePatient']);
});
//============================================== End: Client-API ==============================================

//============================================== Begin: System(Local)-API ============================================
/**
 * Login
 * No middleware (Guest)
 */
Route::post('login', [AuthController::class, 'login']);

/**
 * View attachment
 * middleware: auth_is_system
 */
Route::get('attachment/{file_name?}', function ($file_name) {
    $fileType = pathinfo($file_name, PATHINFO_EXTENSION);
    $fileType = strtolower($fileType);
    $header = null;

    switch ($fileType) {
        case 'jpg':
            $header = ['Content-type' => 'image/jpeg'];
            break;
        case 'jpeg':
            $header = ['Content-type' => 'image/jpeg'];
            break;
        case 'png':
            $header = ['Content-type' => 'image/png'];
            break;
        case 'pdf':
            $header = ['Content-type' => 'application/pdf'];
            break;
        case 'doc':
            $header = ['Content-type' => 'application/msword'];
            break;
    }

    if (!$header) {
        return;
    }
    $file = Storage::get($file_name);

    return response($file, 200, $header);
})->middleware(['auth_is_system'])->where('file_name', '.*');

/**
 * Remaining Routes
 * middleware: auth:sanctum
 * abilities:is-system
 */
Route::middleware(['auth:sanctum', 'abilities:is-system'])->group(function () {
    Route::get('auth', [AuthController::class, 'auth']);
    Route::post('logout', [AuthController::class, 'logout']);
});
//============================================== End: System(Local)-API ==============================================
