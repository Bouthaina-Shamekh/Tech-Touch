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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable()->default('Works');
            $table->string('name_ar')->nullable()->default('أعمالنا');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('project_name_en');
            $table->string('project_name_ar');
            $table->text('description_en');
            $table->text('description_ar');
            $table->string('image');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
