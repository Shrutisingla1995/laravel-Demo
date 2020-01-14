<?php
use App\Task;
use App\Register;
use Illuminate\Http\Request;

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

Route::get('/Profile', function () {
    return view('profile');
});
Route::post('/register', function (Request $request) {
  $register = new Register;
  $register->name = request('name');
  $register->branch = request('branch');
  $register->email = request('email');
  $register->password = request('password');
  $register->save();
});
Route::get('sample-restful-apis', function()
{
    return response()->json([
        [
            'name' => 'Google',
            'domain' => 'Google.com'
        ],[
            'name' => 'Google',
            'domain' => 'Google.com'
        ],[
            'name' => 'Google',
            'domain' => 'Google.com'
        ],[
            'name' => 'Google',
            'domain' => 'Google.com'
        ],[
            'name' => 'Google',
            'domain' => 'Google.com'
            ]
        ]);
});
