<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\V1\LeadController;
use App\Http\Controllers\Admin\Api\V1\UnitController;
use App\Http\Controllers\Admin\Api\V1\FaqController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(
    ['middleware' => ['auth:api']],
    function () {
        // API Endspoints for units
        Route::apiResource('/units', UnitController::class);
        // API Endspoints for faqs
        Route::apiResource('/faqs', FaqController::class);
    }
);
// API Endpoints for Leads user
Route::apiResource('/leads', LeadController::class);
