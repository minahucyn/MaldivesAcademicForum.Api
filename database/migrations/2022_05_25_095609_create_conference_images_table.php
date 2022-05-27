<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferenceImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference_images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('image_path', 200);
            $table->bigInteger('conference_id')->unsigned();
            $table->foreign('conference_id', 'FK_Conferences_ConferenceImages')->references('Id')->on('conferences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conference_images');
    }
}
