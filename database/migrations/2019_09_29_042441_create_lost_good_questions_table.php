<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostGoodQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_good_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lost_good_id')->unsigned();
            $table->text('question_text');
            $table->timestamps();
        });

        Schema::table('lost_goods_questions', function (Blueprint $table) {
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
        Schema::dropIfExists('lost_good_questions');
    }
}
