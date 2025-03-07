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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->foreignId('employe_id')->constrained('employes')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->enum('type', ['pdf', 'docx', 'xlsx'])->default('pdf');
            $table->string('chemin');
            $table->timestamp('date_creation')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
