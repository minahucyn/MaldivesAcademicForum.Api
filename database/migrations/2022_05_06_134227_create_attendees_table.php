<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendees', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Fullname',100);
            $table->string('NidPp',20);
            $table->dateTime('Birthdate');
            $table->string('ContactNumber'); 
            $table->string('Email',100);
            $table->bigInteger('EducationId')->unsigned();;

            $table->unique('Email', 'AK_Attendees_Email');
            $table->unique('NidPp', 'AK_Attendees_NidPp');
            $table->foreign('EducationId', 'FK_Attendee_EducationLevels')->references('Id')->on('education_levels');
        });
    }

/*
 CREATE TABLE [dbo].[Attendee]
(
	[Id] INT NOT NULL PRIMARY KEY IDENTITY,
	[Fullname] VARCHAR(100) NOT NULL,
	[NidPp] VARCHAR(50) NOT NULL,
	[Birthdate] DATETIME2 NOT NULL,
	[ContactNumber] INT NOT NULL,
	[Email] VARCHAR(100) NOT NULL,
	[EducationId] INT NOT NULL,
	[PaymentSlipName] VARCHAR(34) NOT NULL DEFAULT NEWID(), 
	CONSTRAINT [AK_Users_Email] UNIQUE ([Email]), 
    CONSTRAINT [FK_Attendee_EducationLevels] FOREIGN KEY ([EducationId]) REFERENCES [dbo].[EducationLevels]([Id]),
)
 */


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropUnique('AK_Users_Email');
        $table->dropForeign('FK_Attendee_EducationLevels');
        Schema::dropIfExists('attendees');
    }
}
