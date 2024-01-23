<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Todo;
use App\Http\Controllers\TodoController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [TodoController::class, 'index']);
    Route::post('/todos', [TodoController::class, 'store']);
    Route::patch('/todos/update', [TodoController::class, 'update']);
    Route::delete('/todos/delete', [TodoController::class, 'destroy']);
});


// Route::get('/', [TodoController::class, 'index']);


/* 取り出しOKその2 */
// Route::get('/', function(){
//     $test_users = User::all();
//     foreach($test_users as $test_user){
//         $tests = $test_user->todos;
//         foreach($tests as $test){
//             dd($test->id);
//         }
//     }
// });


/* 取り出しOKその1 */
// Route::get('/', function (){
//     $test_user = User::find(1);
//     $tests = $test_user->todos;
//     foreach($tests as $item){
//         dd($my_action = $item->action);
//     }
// });

// Route::get('/', function () {
//     return view('welcome');
// });
