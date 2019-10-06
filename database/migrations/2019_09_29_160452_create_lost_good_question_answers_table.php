<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostGoodQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_good_question_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lost_good_claim_id')->unsigned();
            $table->bigInteger('lost_good_question_id')->unsigned();
            $table->text('answer_text');
            $table->timestamps();
        });

        Schema::table('lost_good_question_answers', function (Blueprint $table) {
            $table->foreign('lost_good_claim_id')
                ->references('id')
                ->on('lost_good_claims')
                ->onDelete('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('lost_good_question_id')
                ->references('id')
                ->on('lost_good_questions')
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
        Schema::dropIfExists('lost_good_question_answers');
    }
}
