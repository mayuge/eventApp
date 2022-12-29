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
            $table->string('image_path1', 100);
            $table->string('image_path2', 100);
            $table->string('image_path3', 100);
            $table->string('description', 200);
            $table->string('message', 200);
            $table->string('others', 200);
            $table->integer('max_num');
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
        Schema::dropIfExists('events');
    }
};
