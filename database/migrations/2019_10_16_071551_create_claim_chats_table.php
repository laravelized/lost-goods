<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_good_claim_chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('claim_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->text('content');
            $table->timestamps();
        });

        Schema::table('lost_good_claim_chats', function (Blueprint $table) {
            $table->foreign('claim_id')
                ->references('id')
                ->on('lost_good_claims')
                ->onDelete('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lost_good_claim_chats');
    }
}
