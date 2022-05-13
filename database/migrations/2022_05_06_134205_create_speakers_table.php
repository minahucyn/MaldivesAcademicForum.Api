<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speakers', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Fullname',100);
            $table->string('Designation',100);
            $table->string('Description',1000);
        });
    }

/*
CREATE TABLE [dbo].[Speakers]
(
	[Id] INT NOT NULL PRIMARY KEY IDENTITY,
	[Fullname] VARCHAR(100) NOT NULL,
	[Designation] VARCHAR(100) NOT NULL,
	[Description] VARCHAR(1000)
)

*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('speakers');
    }
}
