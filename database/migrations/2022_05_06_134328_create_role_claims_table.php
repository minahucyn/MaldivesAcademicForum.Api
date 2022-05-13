<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_claims', function (Blueprint $table) {
            $table->id('Id');
            $table->bigInteger('RoleId')->unsigned();;
            $table->bigInteger('ClaimsId')->unsigned();;

            $table->foreign('RoleId', 'FK_RoleClaims_Roles')->references('Id')->on('roles');
            $table->foreign('ClaimsId', 'FK_RoleClaims_Claims')->references('Id')->on('claims');
        });
    }
/*
CREATE TABLE [dbo].[RoleClaims]
(
	[Id] INT NOT NULL PRIMARY KEY IDENTITY,
	[RoleId] INT NOT NULL,
	[ClaimsId] INT NOT NULL, 
    CONSTRAINT [FK_RoleClaims_Roles] FOREIGN KEY ([RoleId]) REFERENCES [dbo].[Roles]([Id]), 
    CONSTRAINT [FK_RoleClaims_Claims] FOREIGN KEY ([ClaimsId]) REFERENCES [dbo].[Claims]([Id])
)

*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('FK_RoleClaims_Roles');
        $table->dropForeign('FK_RoleClaims_Claims');

        Schema::dropIfExists('role_claims');
    }
}
