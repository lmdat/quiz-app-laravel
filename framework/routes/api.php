<?php

// use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(
    [
        'prefix' => 'v1',
    ], function(){

        Route::post('/quiz', ['uses' => 'V1Controller@postRandomQuiz'])->name('post-random-quiz');

        Route::post('/result', ['uses' => 'V1Controller@postResult'])->name('post-result');

        Route::post('/user', ['uses' => 'V1Controller@postAddUser'])->name('post-user');
});

