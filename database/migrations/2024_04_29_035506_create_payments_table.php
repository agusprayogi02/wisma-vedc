<?php

use App\Enums\PaymentTypeEnum;
use App\Models\Orderer;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Reservation::class);
            $table->foreignIdFor(Orderer::class, 'payment_person_id')->nullable();
            $table->dateTime('date');
            $table->enum('payment_type', [PaymentTypeEnum::DP->name, PaymentTypeEnum::PELUNASAN->name]);
            $table->string('descript', 500)->nullable();
            $table->decimal('amount', 9, 2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
