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
        Schema::create('contratos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('contrato_id', 20)->nullable();//codigo contrato. api: idDeuda (actual)
            $table->string('codigo_medidor', 50)->nullable();//codigo medidor. api: idDeudaAlterno (antiguo)

            $table->unsignedBigInteger('persona_id')->nullable();
            $table->foreign('persona_id')
                    ->references('id')->on('personas')
                    ->onDelete('set null');

            $table->string('detalle_adicional')->nullable();
            $table->string('direccion')->nullable(); //api: direccion
            $table->string('clave_catastral')->nullable(); // api: claveCatastral
            $table->boolean('estado')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contratos');
    }
};
