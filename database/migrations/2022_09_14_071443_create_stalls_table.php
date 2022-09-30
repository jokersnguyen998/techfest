<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stalls', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('video_path')->nullable();
            $table->string('stall_image_path')->nullable();
            $table->string('logo')->nullable();
            $table->string('standy')->nullable();
            $table->text('description');
            $table->string('contact')->nullable();
            $table->integer('position')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stalls');
    }
}
