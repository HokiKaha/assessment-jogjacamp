<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApproverController;
use App\Http\Controllers\ApprovalStageController;
use App\Http\Controllers\ExpenseController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post('/approvers', 'ApproverController@store');
// Route::post('/approval-stages', 'ApprovalStageController@store');
// Route::put('/approval-stages/{id}', 'ApprovalStageController@update');

Route::post('/approvers', [ApproverController::class, 'store']);
Route::post('/approval-stages', [ApprovalStageController::class, 'store']);
Route::put('/approval-stages/{id}', [ApprovalStageController::class, 'update']);
Route::post('/expenses', [ExpenseController::class, 'store']);
Route::patch('/expenses/{id}/approve', [ExpenseController::class, 'approve']);
Route::get('/expenses/{id}', [ExpenseController::class, 'show']);

