<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\Api\NoticiaController;
use App\Http\Controllers\Api\AplicacionController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/usuario/register',[AuthController::class,'register']);
Route::post('/usuario/login',[AuthController::class,'login'])->middleware('exist','actived','verified');

Route::post('/password/email',[ForgotPasswordController::class,'sendResetLinkEmail']);
Route::post('/password/reset',[ResetPasswordController::class,'reset']);
Route::get('/email/resend',[VerificationController::class,'resend'])->name('verification.resend');
Route::get('/email/verify/{id}/{hash}',[VerificationController::class,'verify'])->name('verification.verify');

Route::post('/resend-verify',[AuthController::class,'resendVerify']);

Route::group(['middleware'=>['actived.system','verified','auth:api']],function() {
    //Administrador
    Route::group(['middleware'=>['role']],function() {
        //Registrar usuario
        Route::post('/admin/usuario/register',[AuthController::class,'adminRegister']);
        //Obtener usuarios
        Route::get('/usuario',[AuthController::class,'users']);
        //Borrar Usuario
        Route::delete('/usuario/{id}',[AuthController::class,'destroy']);
        //Actualizar Usuario
        Route::put('/usuario',[AuthController::class,'update']);
        
        //Crear Noticia
        Route::post('/noticias',[NoticiaController::class,'store']);
        //Actualizar Noticia
        Route::put('/noticias/{id}',[NoticiaController::class,'update']);
        //Eliminar Noticia
        Route::delete('/noticias/{id}',[NoticiaController::class,'destroy']);

        //Crear Noticia
        Route::post('/aplicaciones',[AplicacionController::class,'store']);
        //Actualizar Noticia
        Route::put('/aplicaciones/{id}',[AplicacionController::class,'update']);
        //Eliminar Noticia
        Route::delete('/aplicaciones/{id}',[AplicacionController::class,'destroy']);
    });
    Route::get('/logout',[AuthController::class,'logout']);
});

Route::get('/noticias',[NoticiaController::class,'index']);
Route::get('/aplicaciones',[AplicacionController::class,'index']);
