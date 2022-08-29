<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stadistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_visitor');
            $table->unsignedBigInteger('id_post');
            
            $table->bigInteger('click_image')->nullable();
            $table->bigInteger('click_title')->nullable();
            $table->bigInteger('click_content')->nullable();
            $table->timestamps();

            $table->foreign('id_visitor')->references('id')->on('visitors');
            $table->foreign('id_post')->references('id')->on('posts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stadistics');
    }
};
