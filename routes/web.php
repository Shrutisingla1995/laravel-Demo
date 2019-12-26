<?php
use App\Task;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Profile', function () {
    return view('profile');
});

Route::get('/Tasks', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks', [
        'tasks' => $tasks
    ]);
});
Route::post('/new', function (Request $request) {
    $task = new Task;
    $task->name = request('name');
    $task->save();
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('newTask', [
        'tasks' => $tasks
    ]);
});


/**
 * Delete Task
 */
 Route::delete('/task/{task}', function (Task $task) {
     $task->delete();
     return redirect('/Tasks');
 });

 Route::get('/Products', 'ProductController@getProducts' , function(){
   return view('products');
 });
