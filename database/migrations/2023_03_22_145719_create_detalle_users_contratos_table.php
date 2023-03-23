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
        Schema::create('detalle_users_contratos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('alias', '120')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            #se referencia el id de la otra tabla
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('set null');

            $table->unsignedBigInteger('contrato_id')->nullable();
            $table->foreign('contrato_id')
                    ->references('id')->on('contratos')
                    ->onDelete('set null');
            
            $table->boolean('estado')->default(1);
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
        Schema::dropIfExists('detalle_users_contratos');
    }
};
