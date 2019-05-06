<?php

use Illuminate\Http\Request;
use App\User;
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
Route::post('register', 'Auth\RegisterController@create');

Route::middleware('jwt.auth')->get('/users', function (Request $request) {
    return auth()->user();
});
Route::middleware('auth:api')->group( function(){
   Route::get('/mm1',function(){

       $user = User::find(4);
        $token = JWTAuth::fromUser($user);

	 return Response()->json( compact('token'));

});

   Route::get('/posts', 'PostController@index')->name('posts');

 Route::get('logout', 'Users@logout')->middleware('auth:api');
} );
Route::get('/mm',function(){

       $user = User::find(3);
        $token = JWTAuth::fromUser($user);

	 return response()->json( compact('token'));
});