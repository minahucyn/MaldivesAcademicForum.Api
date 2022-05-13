<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id('Id');
            $table->bigInteger('UserId')->unsigned();;
            $table->bigInteger('RoleId')->unsigned();;
            
            $table->unique(['UserId','RoleId'], 'AK_UserRoles_UserId_RoleId');
            $table->foreign('RoleId', 'FK_UserRoles_Roles')->references('Id')->on('roles');
            $table->foreign('UserId', 'FK_UserRoles_Users')->references('Id')->on('users');
        });

    }

    /*
CREATE TABLE [dbo].[UserRoles]
(
	[Id] INT NOT NULL PRIMARY KEY IDENTITY,
	[UserId] INT NOT NULL,
	[RoleId] INT NOT NULL, 
    CONSTRAINT [AK_UserRoles_UserId_RoleId] UNIQUE ([UserId],[RoleId]), 
    CONSTRAINT [FK_UserRoles_Roles] FOREIGN KEY ([RoleId]) REFERENCES [dbo].[Roles]([Id]), 
    CONSTRAINT [FK_UserRoles_Users] FOREIGN KEY ([UserId]) REFERENCES [dbo].[Users]([Id])
)

     */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropUnique('AK_UserRoles_UserId_RoleId');
        $table->dropForeign('FK_UserRoles_Roles');
        $table->dropForeign('FK_UserRoles_Users');


        Schema::dropIfExists('user_roles');
    }
}
