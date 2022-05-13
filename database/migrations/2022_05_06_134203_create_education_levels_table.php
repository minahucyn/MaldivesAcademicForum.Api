<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_levels', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Description', 100);
        });
    }

    /*
    CREATE TABLE [dbo].[EducationLevels]
    (
        [Id] INT NOT NULL PRIMARY KEY IDENTITY,
        [Description] VARCHAR(100) NOT NULL
    )

    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_levels');
    }
}
