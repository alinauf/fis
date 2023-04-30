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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();


            $table->foreignId('collection_id');
            $table->foreignId('invoice_id');
            $table->foreignId('fish_id');
            $table->foreignId('variant_id');


            $table->integer('quantity')->default(1);
            $table->decimal('price', 9, 2)->default(0.00);
            $table->decimal('total', 9, 2)->default(0.00);
            $table->boolean('is_frozen')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
