<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('valor',100);
            $table->string('cliente',100);
            $table->string('contato',100);
            $table->string('indicador',100);
            $table->string('indicado',100);
            $table->string('id_indicado',11);
            $table->string('pontuacao_indicador',100);
            $table->string('descricao_servico',250);
            $table->string('caed',100);
            $table->dateTime('created_at')->date_timestamp_set;
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
