<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('category');
            $table->integer('stock');
            $table->decimal('price', 10, 2);
            $table->string('image')->nullable();
            $table->enum('condition', ['new', 'used', 'refurbished'])->default('new');
            $table->boolean('is_visible')->default(true); // Untuk kontrol visibility
            $table->string('sku')->unique(); // Stock Keeping Unit
            $table->integer('minimum_stock')->default(1); // Untuk alert stok minimum
            $table->boolean('notify_low_stock')->default(true);
            $table->timestamps();
            $table->softDeletes(); // Untuk soft delete
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};