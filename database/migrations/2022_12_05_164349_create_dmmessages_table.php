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
        Schema::create('dmmessages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message');
            $table->string('editedmessage')->nullable();;
            $table->string('sender');
            $table->string('receiver');
            $table->timestamps();
            $table->integer('dm_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dmmessages');
    }
};
