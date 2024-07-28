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
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->string('numero_d_adhesion')->unique();
            $table->string('prenom');
            $table->string('nom');
            $table->string('post_nom');
            $table->enum('sexe', ['F', 'M']);
            $table->string('lieu_de_naissance');
            $table->string('province_d_origine');
            $table->string('territoire_d_origine');
            $table->text('etudes');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('photo_de_profil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membres');
    }
};
