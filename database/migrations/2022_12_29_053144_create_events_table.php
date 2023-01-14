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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('user_id', 50);
            $table->string('address', 50);
            $table->string('image_path1')->nullable();
            $table->string('image_path2')->nullable();
            $table->string('image_path3')->nullable();
            $table->string('image_url1')->nullable();
            $table->string('image_url2')->nullable();
            $table->string('image_url3')->nullable();
            $table->dateTime('date');
            $table->string('description', 200);
            $table->string('message', 200);
            $table->string('others', 200)->nullable();
            $table->integer('max_num');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
