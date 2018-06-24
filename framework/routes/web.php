<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });


Route::get('/', ['uses' => 'QuizController@getWelcome'])->name('get-welcome');

Route::get('/quiz', ['uses' => 'QuizController@getQuiz'])->name('get-quiz');

Route::post('/quiz', ['uses' => 'QuizController@postQuiz'])->name('post-quiz');

Route::get('/result', ['uses' => 'QuizController@getShownResult'])->name('get-shown-result');

Route::post('/user', ['uses' => 'QuizController@postAddUser'])->name('post-add-user');

Route::get('/play-again', ['uses' => 'QuizController@getClearSession'])->name('get-play-again');

Route::get('/thankyou', ['uses' => 'QuizController@getThankyou'])->name('get-thank-you');
