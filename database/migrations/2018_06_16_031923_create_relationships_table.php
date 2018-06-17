<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationships', function (Blueprint $table) {
            $table->UnsignedInteger('user1_id');
            $table->foreign('user1_id')->references('id')->on('users');
            $table->UnsignedInteger('user2_id');
            $table->foreign('user2_id')->references('id')->on('users');
            $table->tinyInteger('status');
            $table->UnsignedInteger('action_user_id');
            $table->foreign('action_user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
    }
}
