<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;

Route::post('/get-tasks', [FirebaseController::class, 'getTasks']);
