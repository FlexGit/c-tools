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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
			$table->string('title');
			$table->string('alias');
			$table->longText('detail_text')->nullable();
			$table->text('meta_title')->nullable();
			$table->text('meta_description')->nullable();
            $table->smallInteger('sort')->default(0);
            $table->boolean('top_nav')->default(true);
            $table->boolean('bottom_nav')->default(true);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
