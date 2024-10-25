<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/approvers', 'ApproverController@store');
Route::post('/approval-stages', 'ApprovalStageController@store');
Route::put('/approval-stages/{id}', 'ApprovalStageController@update');
Route::post('/expenses', [ExpenseController::class, 'store']);
Route::patch('/expenses/{id}/approve', [ExpenseController::class, 'approve']);
Route::get('/expenses/{id}', [ExpenseController::class, 'show']);
