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
        Schema::create('room_item_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_item_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('quantity');
            $table->enum('status', ['hilang', 'rusak']);
            $table->string('note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_item_reports');
    }
};
