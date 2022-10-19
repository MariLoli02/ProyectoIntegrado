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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_game')->unique();
            $table->enum('plataforma', ['Xbox', 'PlayStation', 'Pc', 'Nintendo']);
            $table->text('contenido_game');
            
            $table->foreignId('image_game');
            $table->foreign('image_game')->references('id')->on('images')->onDelete('cascade');
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
        Schema::dropIfExists('games');
    }
};
