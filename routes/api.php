<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ViewPatientController;
use App\Http\Controllers\RestApi\RestApiPatientController;

//============================================== Begin: Provider-API ============================================
/**
 * View attachment
 * middleware: auth_is_provider
 * Example Route should be started with: /api/provider/.....
 */
Route::get('provider/attachment/{file_name?}', function ($file_name) {
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
})->middleware(['auth_is_provider'])->where('file_name', '.*');

/**
 * Remaining Routes
 * middleware: auth:sanctum
 * abilities:is-provider
 * Example Routes should be started with: /api/provider/.....
 */
Route::middleware(['auth:sanctum', 'abilities:is-provider'])->prefix('provider')->group(function () {
    Route::post('patient', [RestApiPatientController::class, 'storePatient']);
    Route::post('patient/history', [RestApiPatientController::class, 'storeHistory']);
    Route::post('patient/operation', [RestApiPatientController::class, 'storeOperation']);
    Route::post('patient/diagnosis', [RestApiPatientController::class, 'storeDiagnosis']);
    Route::post('patient/medication', [RestApiPatientController::class, 'storeMedication']);
    Route::post('patient/physiotherapy', [RestApiPatientController::class, 'storePhysiotherapy']);
    Route::post('patient/laboratory', [RestApiPatientController::class, 'storeLaboratory']);
    Route::post('patient/radiology', [RestApiPatientController::class, 'storeRadiology']);
    Route::post('patient/general', [RestApiPatientController::class, 'storeGeneral']);
});
//============================================== End: Provider-API ==============================================

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
    // Auth & Logout
    Route::get('auth', [AuthController::class, 'auth']);
    Route::post('logout', [AuthController::class, 'logout']);

    // Provider (list, create, update)
    Route::get('provider', [ProviderController::class, 'index']);
    Route::post('provider', [ProviderController::class, 'store']);
    Route::put('provider/{provider}', [ProviderController::class, 'update']);
});
//============================================== End: System(Local)-API ==============================================

//============================================== Begin: Guest-API ============================================
Route::get('patient/{code}', [ViewPatientController::class, 'show']);
//============================================== End: Guest-API ==============================================
