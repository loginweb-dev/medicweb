<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specialist_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->decimal('amount', 10, 2)->default(0)->nullable();
            $table->integer('count_appointment')->default(0)->nullable();
            $table->string('time_frame')->nullable();
            $table->text('observations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments_payments');
    }
}
