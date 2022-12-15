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
        Schema::create('pokes', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->unsignedBigInteger('pokestatus_id');
            $table->foreign('pokestatus_id')
            ->references('id')
            ->on('poke_statuses');
            $table->date('date');                       
            $table->unsignedBigInteger('userpoke_id');
            $table->foreign('userpoke_id')
            ->references('id')
            ->on('users');
            $table->unsignedBigInteger('userpoked_id');
            $table->foreign('userpoked_id')
            ->references('id')
            ->on('users');
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
        Schema::dropIfExists('pokes');
    }
};
