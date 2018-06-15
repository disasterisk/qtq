<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller{
    public function show($id){
      $question = Question::findOrFail($id);
      $responses = \DB::table('responses')->where('question_id', $id)->get();
      $compact=array('question', 'responses');
      $data=array('question'=>$question, 'responses'=>$responses);
      return view('question', compact($compact));
      return view('question')->with($data);
    }
}
