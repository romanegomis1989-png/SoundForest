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
        Schema::create('avis', function (Blueprint $table) {
            $table->id();
            $table->string('avis');
            $table->integer('note')->unsigned()->nullable(); // Note de 1 à 5
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->foreignId('son_id')->constrained()->onDelete('restrict');
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->unique(['son_id', 'user_id']); // Un utilisateur ne peut donner qu'un seul avis par son
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
