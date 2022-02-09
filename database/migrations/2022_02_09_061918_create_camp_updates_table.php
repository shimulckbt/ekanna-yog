<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camp_updates', function (Blueprint $table) {
            $table->id();
            $table->integer('camp_id');
            $table->string('title')->nullable();
            $table->string('date')->nullable();
            $table->string('image')->nullable();
            $table->longText('short_description')->nullable();
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
        Schema::dropIfExists('camp_updates');
    }
}
