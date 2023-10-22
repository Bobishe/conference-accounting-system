<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->timestamps();
            $table->string('name_ivent')->nullable();
            $table->string('organaizer')->nullable();
            $table->string('last_line')->nullable();
            $table->string('deadlines')->nullable();
            $table->string('email')->nullable();
            $table->string('name_participant')->nullable();
            $table->string('name_meneger')->nullable();
            $table->string('form')->nullable();
            $table->string('specialization')->nullable();
            $table->string('cost')->nullable();
            $table->string('date_of_delivery')->nullable();
            $table->string('result_name')->nullable();
            $table->string('file')->nullable();
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
