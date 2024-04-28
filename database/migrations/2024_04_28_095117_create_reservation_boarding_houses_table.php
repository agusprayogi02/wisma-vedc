<?php

use App\Models\BoardingHouse;
use App\Models\Reservation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservation_boarding_houses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Reservation::class);
            $table->foreignIdFor(BoardingHouse::class);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_boarding_houses');
    }
};
