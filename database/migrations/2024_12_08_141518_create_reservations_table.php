<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('reservations', function (Blueprint $table) {
        $table->id();
        $table->string('fullname');
        $table->string('email');
        $table->string('contact_number');
        $table->date('date');
        $table->time('time');
        $table->string('special_occasion')->nullable();
        $table->string('item');
        $table->integer('quantity');
        $table->string('payment_method');
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