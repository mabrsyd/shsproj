<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('laptop_brand');
            $table->text('issue_description');
            $table->decimal('total_price', 8, 2);
            $table->enum('status', ['not_started','in_progess','completed'])->default('not_started');
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
