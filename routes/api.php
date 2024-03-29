<?php

use App\Models\User;
use App\Services\BMTService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user/{user}/nasabah', function (Request $request,User $user,BMTService $bMTService) {
    return response($bMTService->fetchNasabahByUser($user));
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
