<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collection_id');
            $table->foreignId('collection_vessel_id');
            $table->foreignId('fishing_vessel_id');

            $table->decimal('total', 9, 2)->default(0.00);
            $table->decimal('paid', 9, 2)->default(0.00);
            $table->decimal('balance', 9, 2)->default(0.00);

            $table->string('comments')->nullable();
            $table->string('payment_reference')->nullable();

            $table->boolean('is_collected')->default(false);
            $table->boolean('is_settled')->default(false);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
