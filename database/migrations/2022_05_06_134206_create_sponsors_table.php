<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Description',100);
            $table->string('LogoUri',200);
        });
    }

    /*
    CREATE TABLE [dbo].[Sponsors]
(
	[Id] INT NOT NULL PRIMARY KEY IDENTITY,
	[Description] VARCHAR(100) NOT NULL,
	[LogoUri] VARCHAR(200) NOT NULL
)

    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsors');
    }
}
