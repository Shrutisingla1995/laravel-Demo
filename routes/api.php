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
  $user = Register::where('email', $request->email)->get();
  if(sizeof($user)> 0){
    return response()->json(['success'=>false, 'message' => 'User Already Exists!']);
  }else{
    $register->save();
    return response()->json(['success'=>true, 'message' => 'Register Success']);
  }
});
Route::post('/login', function (Request $request) {
  $email = $request->input('email');
  $password = $request->input('password');
  $user = Register::where('email', '=', $email)->first();
  if (!$user) {
    return response()->json(['success'=>false, 'message' => 'Login Fail, Incorrect email']);
  }else{
    Session::put('email', $email);
    return response()->json(['success'=>true, 'message' => 'Login Success','user'=> $user]);
  }
});
Route::get('logout', function(){
  Session::forget('email');
});
Route::middleware('auth:api')->get('get-profile', function(Request $request){
  $currentEmail = \Request::get('email');
  $userDetail = Register::where('email', '=', $currentEmail)->first();
  if (!$userDetail) {
    return response()->json(['success'=> false, 'message' => 'Data Failure']);
  }else{
    return response()->json(['success'=> true, 'message' => 'Data success','user'=> $userDetail]);
  }
});
Route::post('/save-profile', function (Request $request) {
  $userDetail = Register::where('email', '=',  request('email'))->first();
  if($userDetail){
    $userDetail->name = request('name');
    $userDetail->branch = request('branch');
    $userDetail->about = request('about');
    $userDetail->profile = request('profile');
    $userDetail->address = request('address');
    $userDetail->contact = request('contact');
    $userDetail->save();
    return response()->json(['success'=>true, 'message' => 'Profile updated successfully.']);
  }else{
    return response()->json(['success'=>false, 'message' => 'Unable to update profile!']);
  }
});
Route::post('/delete-photo', function (Request $request) {
  $userDetail = Register::where('email', '=',  request('email'))->first();
  if($userDetail){
    $userDetail->photos = request('photos');
    $userDetail->save();
    return response()->json(['success'=>true, 'message' => 'Photos updated successfully.']);
  }else{
    return response()->json(['success'=>false, 'message' => 'Unable to update photos!']);
  }
});
Route::post('/upload-photo', function (Request $request) {
  if ($request->hasFile('image')){
        $file      = $request->file('image');
        $filename  = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $picture   = date('His').'-'.$filename;
        $file->move(public_path('img'), $picture);
        $currentEmail = session()->get('email');
        $user = Register::where('email', '=', $currentEmail)->first();
        if($user){
          if($user->first()->photos){
            $readData = json_decode($user->photos ,true);
            $pic = array(
              'url' => $picture
            );
            array_push($readData, $pic);
            $user->photos = json_encode(($readData), true);
          }else{
            $pic[]= array(
              'url' => $picture
            );
            $user->photos = json_encode($pic, true);
          }
          $user->save();
          return response()->json(['success'=>true, "message" => "Image Uploaded Succesfully"]);
        }else{
          return response()->json(["message" => "Unable to upload"]);
        }
  } 
  else{
        return response()->json(["message" => "Select image first."]);
  }
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
