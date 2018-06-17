<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user()->id;
      $questions = \App\Question::where('asker_id', $user)->get();
      $friends = [];
      $friendRequests = [];

      $friends = \App\Relationship::where(function($query){
        $user = Auth::user()->id;
        $query->where('user1_id', $user)
          ->orWhere('user2_id', $user);
      })->where('status', 1)->get();
      $friendRequests = \App\Relationship::where([
        ['action_user_id', '=', $user],
        ['status', '=', '0' ]
      ])->get();
      return view('home', ['questions' => $questions, 'friends' => $friends, 'friendRequests' => $friendRequests]);
    }
}
