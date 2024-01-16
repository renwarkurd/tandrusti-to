<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseDataController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ViewPatientController;
use App\Http\Controllers\RestApi\RestApiPatientController;

//============================================== Begin: Provider-API ============================================
/**
 * Remaining Routes
 * middleware: auth:sanctum
 * abilities:is-provider
 * Example Routes should be started with: /api/provider/.....
 */
Route::middleware(['auth:sanctum', 'abilities:is-provider'])->prefix('provider')->group(function () {
    // Patient
    Route::post('patient', [RestApiPatientController::class, 'storePatient']);
    Route::post('patient/history', [RestApiPatientController::class, 'storeHistory']);
    Route::post('patient/operation', [RestApiPatientController::class, 'storeOperation']);
    Route::post('patient/diagnosis', [RestApiPatientController::class, 'storeDiagnosis']);
    Route::post('patient/medication', [RestApiPatientController::class, 'storeMedication']);
    Route::post('patient/physiotherapy', [RestApiPatientController::class, 'storePhysiotherapy']);
    Route::post('patient/laboratory', [RestApiPatientController::class, 'storeLaboratory']);
    Route::post('patient/radiology', [RestApiPatientController::class, 'storeRadiology']);
    Route::post('patient/general', [RestApiPatientController::class, 'storeGeneral']);

    // Base Data
    Route::get('base-data', [BaseDataController::class, 'index']);
});
//============================================== End: Provider-API ==============================================

//============================================== Begin: System(Local)-API ============================================
/**
 * Login
 * No middleware (Guest)
 */
Route::post('login', [AuthController::class, 'login']);

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

    // Patient
    Route::get('patient/{code}', [PatientController::class, 'show']);
    Route::post('patient', [PatientController::class, 'storePatient']);
    Route::post('patient/search', [PatientController::class, 'searchPatient']);
    Route::post('patient/history', [PatientController::class, 'storeHistory']);
    Route::post('patient/operation', [PatientController::class, 'storeOperation']);
    Route::post('patient/diagnosis', [PatientController::class, 'storeDiagnosis']);
    Route::post('patient/medication', [PatientController::class, 'storeMedication']);
    Route::post('patient/physiotherapy', [PatientController::class, 'storePhysiotherapy']);
    Route::post('patient/laboratory', [PatientController::class, 'storeLaboratory']);
    Route::post('patient/radiology', [PatientController::class, 'storeRadiology']);
    Route::post('patient/general', [PatientController::class, 'storeGeneral']);

    // Base Data
    Route::get('base-data', [BaseDataController::class, 'index']);
});
//============================================== End: System(Local)-API ==============================================

//============================================== Begin: Guest-API ============================================
// Show patient data
Route::get('patient/{code}', [ViewPatientController::class, 'show']);

// Show laboratory & radiology attachments
Route::get('patient/{patient}/laboratory-attachment/{fileName?}', [ViewPatientController::class, 'showLaboratoryAttachment']);
Route::get('patient/{patient}/radiology-attachment/{fileName?}', [ViewPatientController::class, 'showRadiologyAttachment']);
//============================================== End: Guest-API ==============================================
