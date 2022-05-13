<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id('Id');
            $table->bigInteger('AttendeeId')->unsigned();;
            $table->bigInteger('ConferenceId')->unsigned();;
            $table->uuid('PaymentSlipName')->default(DB::raw('(UUID())'));
            $table->tinyInteger('IsApproved')->default(0); //0 REVIEW REQUESTED | -1 REJECTED | 1 APPROVED
            
            $table->foreign('AttendeeId', 'FK_Registrations_Attendee')->references('Id')->on('attendees');
            $table->foreign('ConferenceId', 'FK_Registrations_Conference')->references('Id')->on('conferences');


        });
    }
/*
CREATE TABLE [dbo].[Registrations]
(
	[Id] INT NOT NULL PRIMARY KEY IDENTITY,
	[AttendeeId] INT NOT NULL,
	[ConferenceId] INT NOT NULL,
	IsApproved BIT NULL DEFAULT NULL, -- NULL NOT APPROVED/REJECTED | 0 REJECTED | 1 APPROVED 
    CONSTRAINT [FK_Registrations_Attendee] FOREIGN KEY ([AttendeeId]) REFERENCES [dbo].[Attendee]([Id]), 
    CONSTRAINT [FK_Registrations_Conference] FOREIGN KEY ([ConferenceId]) REFERENCES [dbo].[Conferences]([Id])
)

*/


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('FK_Registrations_Attendee');
        $table->dropForeign('FK_Registrations_Conference');

        Schema::dropIfExists('registrations');
    }
}
