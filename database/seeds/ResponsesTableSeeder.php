<?php

use Illuminate\Database\Seeder;

class ResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Response::class, rand(1000,5000))->create();
    }
}
