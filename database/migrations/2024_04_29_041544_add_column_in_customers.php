<?php

use App\Enums\StateReservationEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->enum("state", [StateReservationEnum::BOOKING->name, StateReservationEnum::CANCEL->name])
                ->after('room_id')
                ->default(StateReservationEnum::BOOKING->name);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('state');
        });
    }
};
