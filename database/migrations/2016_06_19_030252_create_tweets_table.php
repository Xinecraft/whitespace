<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('tw_created_at');
            $table->string('tw_id')->nullable();
            $table->longText('tw_text')->nullable();
            $table->string('tw_source')->nullable();
            $table->string('tw_retweet_count')->nullable();
            $table->string('tw_favorite_count')->nullable();
            $table->string('tw_lang')->nullable();
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
        Schema::drop('tweets');
    }
}
