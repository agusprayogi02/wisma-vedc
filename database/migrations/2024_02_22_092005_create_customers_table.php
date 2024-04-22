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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained(); // id_xkelas
            $table->foreignId('room_id')->nullable()->constrained();
            $table->bigInteger('id_xcalonpeserta')->nullable();
            $table->bigInteger('id_xkelas')->nullable();
            $table->string('nik', 16)->nullable();
            $table->string('name', 150)->nullable(); // nama
            $table->string('npsn', 16)->nullable();
            $table->string('sekolah', 150)->nullable(); // sekolah
            $table->enum('gender', ['L', 'P'])->nullable(); // jenis_kelamin
            $table->string('address')->nullable();
            $table->string('phone', 15)->nullable(); // hp
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
