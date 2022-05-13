<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id('Id');
            $table->String('LogoUri', 200);
            $table->String('ContactType', 50);
            $table->String('ContactValve', 50);
        });
    }

/*
CREATE TABLE [dbo].[Contacts]
(
	[Id] INT NOT NULL PRIMARY KEY IDENTITY,
	[LogoUri] VARCHAR(200),
	[ContactType] VARCHAR(50),
	[ContactValve] VARCHAR(50)
)

*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
