<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('event_id')->unique();
            $table->string('name');
            $table->string('picture_url');
            $table->string('location');
            $table->string('description')->nullable();
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->dateTime('create_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('update_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
