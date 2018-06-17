<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {
  public function show($id){
    $user = User::findOrFail($id);
    return view('user', ['user' => $user]);
  }
  public function post(Request $request, $id){
    $u1 = $request->user()->id;
    $u2 = $id;
    if($u1<$u2){
      $user1 = $u1;
      $user2 = $u2;
    }else{
      $user1 = $u2;
      $user2 = $u1;
    }
    switch($request->relationshipButton){
      case 'friend':
        if(Relationship::where([
          ['user1_id', '=', $user1],
          ['user2_id', '=', $user2]
        ])->doesntExist()){
          $r = new Relationship;
          $r->user1_id = $user1;
          $r->user2_id = $user2;
          $r->status = 0;
          $r->action_user_id = $u2;
          $r->save();
        }
        break;
      case 'block':
        if(Relationship::where([
          ['user1_id', '=', $user1],
          ['user2_id', '=', $user2]
        ])->exists()){
          $r = new Relationship;
          $r->user1_id = $user1;
          $r->user2_id = $user2;
          $r->status = 3;
          $r->action_user_id = $u1;
          $r->save();
        }
    }
  }
}
