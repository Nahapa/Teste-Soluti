<?php

use App\Http\Controllers\Api\AuthControllerApi;
use App\Http\Controllers\API\CertificateControllerApi;
use App\Http\Controllers\Api\UserControllerApi;
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

Route::post('login', [AuthControllerApi::class, 'login']);
Route::post('register', [AuthControllerApi::class, 'register']);

Route::apiResource('users', UserControllerApi::class);
Route::get('certificates', [CertificateControllerApi::class, 'index']);
Route::post('certificates', [CertificateControllerApi::class, 'store']);
Route::delete('certificates/{id}', [CertificateControllerApi::class, 'destroy']);


Route::group([
    'middleware' => ['auth:sanctum']
], function () {

    Route::get('me', [AuthControllerApi::class, 'me']);
    Route::post('logout', [AuthControllerApi::class, 'logout']);

    // Route::apiResource('users', UserControllerApi::class);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
