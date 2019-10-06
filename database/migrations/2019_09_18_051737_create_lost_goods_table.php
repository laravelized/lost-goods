<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_goods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')
                ->unsigned()
                ->nullable();
            $table->string('name');
            $table->text('information');
            $table->tinyInteger('type');
            $table->text('place_details');
            $table->dateTime('date');
            $table->string('mobile_number');
            $table->boolean('is_resolved')
                ->default(false);
            $table->timestamps();
        });

        Schema::table('lost_goods', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL')
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
        Schema::dropIfExists('lost_goods');
    }
}
