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
        //ajouter la ligne ci-dessous pour eviter un problème lors de l'ajout de clef etranger à son ajout
        Schema::disableForeignKeyConstraints();
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->year('year');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('category_id')
            ->constrained()
            ->onUpdate('restrict')
            ->onDelete('restrict');       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
