<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produit_id');
            $table->unsignedBigInteger('user_id')->nullable(); // Ajoutez cette colonne si vous avez un système d'authentification
            $table->integer('stock');
            $table->decimal('prix', 8, 2);
            $table->timestamps();
            
            // Ajoutez d'autres colonnes si nécessaire
            
            // Définissez les clés étrangères si nécessaire
            $table->foreign('produit_id')->references('id')->on('produits');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
