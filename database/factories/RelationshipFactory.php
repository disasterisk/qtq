<?php

use Faker\Generator as Faker;
use App\Relationship;

$factory->define(App\Relationship::class, function (Faker $faker) {
  $user_ids = App\User::all()->pluck('id')->toArray();
  $loop = true;
  while($loop){
    $u1 = $faker->randomElement($user_ids);
    $u2 = $faker->randomElement($user_ids);
    $user1;
    $user2;
    if($u1!=$u2){
      if($u1<$u2){
        $user1 = $u1;
        $user2 = $u2;
      }else{
        $user1 = $u2;
        $user2 = $u1;
      }
      if(Relationship::where([
        ['user1_id', '=', $user1],
        ['user2_id', '=', $user2]
      ])->doesntExist()){
        $loop = false;
      }
    }
  }
  return [
      'user1_id' => $user1,
      'user2_id' => $user2,
      'status' => $faker->numberBetween(0,3),
      'action_user_id' => $faker->randomElement([$user1, $user2])
  ];
});
