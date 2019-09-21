<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->bigInteger('role_id')->unsigned();
            $table->bigInteger('permission_id')->unsigned();
        });

        Schema::table('permission_role', function (Blueprint $table) {
           $table->foreign('role_id')
               ->references('id')
               ->on('roles')
               ->onDelete('CASCADE')
               ->onUpdate('CASCADE');

           $table->foreign('permission_id')
               ->references('id')
               ->on('permissions')
               ->onDelete('CASCADE')
               ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
    }
}
