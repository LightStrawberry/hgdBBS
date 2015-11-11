<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->text('bio');
            $table->string('avatar_path',100);
            $table->timestamp('last_seen_time');
            $table->timestamp('read_time');
        });
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('topic_id')->unsigned();
            $table->integer('number');
            $table->integer('user_id')->unsigned();;
            $table->string('content');
            $table->string('type');
            $table->timestamps('time');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
