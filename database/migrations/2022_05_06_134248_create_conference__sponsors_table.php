<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferenceSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conference__sponsors', function (Blueprint $table) {
            $table->id('Id');
            $table->bigInteger('ConferenceId')->unsigned();;
            $table->bigInteger('SponsorId')->unsigned();;

            $table->unique(['ConferenceId', 'SponsorId'], 'AK_ConferenceId_SponsorsId');
            $table->foreign('ConferenceId', 'FK_Conference-Sponsors_Conference')->references('Id')->on('conferences');
            $table->foreign('SponsorId', 'FK_Conference-Sponsors_Sponsors')->references('Id')->on('sponsors');

        });
    }

    // CREATE TABLE [dbo].[Conference_Sponsors]
    // (
    //     [Id] INT NOT NULL PRIMARY KEY IDENTITY,
    //     [ConferenceId] INT NOT NULL,
    //     [SponsorId] INT NOT NULL, 
    //     CONSTRAINT [AK_ConferenceId_SponsorsId] UNIQUE ([ConferenceId],[SponsorId]), 
    //     CONSTRAINT [FK_Conference-Sponsors_Conference] FOREIGN KEY ([ConferenceId]) REFERENCES [dbo].[Conferences]([Id]), 
    //     CONSTRAINT [FK_Conference-Sponsors_Sponsors] FOREIGN KEY ([SponsorId]) REFERENCES [dbo].[Sponsors]([Id])
    // )
    


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropUnique('AK_ConferenceId_SponsorsId');
        $table->dropForeign('FK_Conference-Sponsors_Conference');
        $table->dropForeign('FK_Conference-Sponsors_Sponsors');
        
        Schema::dropIfExists('conference__sponsors');
    }
}
