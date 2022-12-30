<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo',['Ingreso', 'Egreso']);
            $table->string('concepto');
            $table->decimal('valor',15);
            $table->foreignId('rol_pago_id')->constrained('rol_pagos')->onDelete('cascade');
            $table->foreignId('user_created_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('user_updated_id')->nullable()->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('balances');
    }
}
