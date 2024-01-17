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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
			$table->string('title');
			$table->string('alias');
            $table->integer('section_id')->nullable();
			$table->text('preview_text')->nullable();
			$table->text('image')->nullable();
			$table->longText('detail_text')->nullable();
			$table->text('meta_title')->nullable();
			$table->text('meta_description')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
