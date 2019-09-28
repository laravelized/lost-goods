<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostGoodImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_good_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lost_good_id')->unsigned();
            $table->text('url');
            $table->text('path');
            $table->text('file_name');
            $table->string('uploader_class');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lost_good_images');
    }
}
