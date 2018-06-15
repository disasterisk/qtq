<?php
use Illuminate\Http\Request;

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
Route::get('/', function(){
  if (Auth::check()){
    return redirect('/home');
  }else{
    return view('welcome');
  }
});
/*
Route::get('/', function () {
  $links = \App\Link::all();
  return view('welcome', ['links' => $links]);
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/submit', function(){
  if(Auth::check()){
    return view('submit');
  }else{
    return redirect('/');
  }
});
Route::post('/submit', function(Request $request) {

  $data = $request->validate([
    'title' => 'required|max:50',
    'text' => 'required|max:1800'
  ]);
  $question = new App\Question;
  $question->asker_id = $request->user()->id;
  $question->title = $data['title'];
  $question->text = $data['text'];

  $question->save();
  return redirect('/');
});

Route::get('/question/{id}', 'QuestionController@show');
Route::get('/question/{id}/reply', 'ResponseController@show');
Route::post('/question/{id}/reply', 'ResponseController@post');
