<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conferences', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Description', 100);
            $table->string('Venue', 200);
            $table->dateTime('RegistrationStartDate');
            $table->dateTime('RegistrationEndDate');
            $table->dateTime('StartDate');
            $table->dateTime('EndDate');
        });
    }

//     CREATE TABLE [dbo].[Conferences]
// (
// 	[Id] INT NOT NULL PRIMARY KEY IDENTITY,
// 	[Description] VARCHAR(100) NOT NULL,
// 	[Venue] VARCHAR(200) NOT NULL,
// 	[RegistrationStartDate] DATETIME2 NOT NULL,
// 	[RegistrationEndDate] DATETIME2 NOT NULL,
// 	[StartDate] DATETIME2 NOT NULL,
// 	[EndDate] DATETIME2 NOT NULL,
// )


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conferences');
    }
}
