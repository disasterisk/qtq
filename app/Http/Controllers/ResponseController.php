<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Question;
use App\Response;

class ResponseController extends Controller{
    public function show($id) {
      if(Auth::check()){
        $question = Question::findOrFail($id);
        return view('reply', ['question' => $question]);
      }

    }
    public function post(Request $request, $id){
      $data = $request->validate([
        'text' => 'required|max:1800'
      ]);
      $response = new Response;
      $response->question_id = $id;
      $response->respondent_id = $request->user()->id;
      $response->text = $request->text;

      $response->save();
      return redirect("/question/{$id}");
    }
}
