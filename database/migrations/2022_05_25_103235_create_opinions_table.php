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
        Schema::create('opinions', function (Blueprint $table) {
            $table->id();     
            $table->string('opinionTypes');        
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('userpoke_id')
            ->on('pokes');
            $table->unsignedBigInteger('revieweduser_id');
            $table->foreign('revieweduser_id')
            ->references('id')
            ->on('users');            
            $table->unsignedBigInteger('poke_id');
            $table->foreign('poke_id')
            ->references('id')
            ->on('pokes');
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
        Schema::dropIfExists('opinions');
    }
};
