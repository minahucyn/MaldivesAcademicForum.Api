<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Description',200);
            $table->bigInteger('SpeakerId')->unsigned();;
            $table->bigInteger('ConferenceId')->unsigned();;
            $table->string('Location');
            $table->dateTime('StartDate');
            $table->dateTime('EndDate');

            $table->foreign('SpeakerId', 'FK_Topics_Speakers')->references('Id')->on('speakers');
            $table->foreign('ConferenceId', 'FK_Topics_Conferences')->references('Id')->on('conferences');

        });
    }

    /*
     CREATE TABLE [dbo].[Topics]
(
	[Id] INT NOT NULL PRIMARY KEY IDENTITY,
	[Description] VARCHAR(200) NOT NULL,
	[SpeakerId] INT NOT NULL,
	[ConferenceId] INT NOT NULL,
	[Location] VARCHAR(100), -- LEVEL, CONF HALL,
	[StartDate] DATETIME2 NOT NULL,
	[EndDate] DATETIME2 NOT NULL, 
    CONSTRAINT [FK_Topics_Speakers] FOREIGN KEY ([SpeakerId]) REFERENCES [dbo].[Speakers]([Id]), 
    CONSTRAINT [FK_Topics_Conferences] FOREIGN KEY ([ConferenceId]) REFERENCES [dbo].[Conferences]([Id])
)

     */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('FK_Topics_Speakers');
        $table->dropForeign('FK_Topics_Conferences');

        Schema::dropIfExists('topics');
    }
}
