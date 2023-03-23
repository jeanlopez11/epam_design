<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_deudas_contratos', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';
            $table->string('fecha_max_pago')->nullable(); //api: fechaMaxPago
            $table->date('fecha_max_pago_date')->nullable();
            $table->string('valor')->nullable(); //api: valor
            $table->string('abono')->nullable();
            $table->string('saldo')->nullable();

            $table->unsignedBigInteger('deuda_id')->nullable();
            $table->foreign('deuda_id')
                    ->references('id')->on('deudas')
                    ->onDelete('set null');

            $table->unsignedBigInteger('contrato_id')->nullable();
            $table->foreign('contrato_id')
                    ->references('id')->on('contratos')
                    ->onDelete('set null');
                    
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
        Schema::dropIfExists('detalle_deudas_contratos');
    }
};
