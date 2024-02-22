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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderer_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('quantity');
            $table->enum('type', ["PNBP", "DIPA"]);
            $table->timestamp('date_order');
            $table->date('date_ci');
            $table->date('date_co');
            $table->string('note');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
