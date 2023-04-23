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
        Schema::create('fishing_vessels', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('contact_person');

            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->integer('account_number')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fishing_vessels');
    }
};
