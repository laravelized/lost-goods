<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryLostGoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_lost_good', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('lost_good_id')->unsigned();
        });

        Schema::table('category_lost_good', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('lost_good_id')
                ->references('id')
                ->on('lost_goods')
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
        Schema::dropIfExists('category_lost_good');
    }
}
