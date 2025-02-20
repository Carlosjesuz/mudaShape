<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pessoa_id');
            $table->boolean('sexo1');
            $table->boolean('sexo2');
            $table->string('braco');
            $table->string('peito');
            $table->string('barriga');
            $table->string('coxa');
            $table->string('gluteo');
            $table->string('panturrilha');
            $table->string('peso');
            $table->string('altura');
            $table->string('idade');
            $table->timestamps();

            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medidas');
    }
};
