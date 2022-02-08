<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camps', function (Blueprint $table) {
            $table->id();
            $table->string('camp_title')->nullable();
            $table->string('location')->nullable();
            $table->string('organizer')->nullable();
            $table->integer('member')->nullable();
            $table->string('camp_image')->nullable();
            $table->string('blog_title')->nullable();
            $table->string('blog_image')->nullable();
            $table->longText('blog')->nullable();
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
        Schema::dropIfExists('camps');
    }
}
