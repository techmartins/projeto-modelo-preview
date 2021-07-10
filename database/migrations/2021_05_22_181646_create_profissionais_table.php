<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissionaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissionais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parceiro',100);
            $table->string('cpf',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('nascimento');
            $table->string('telefone');
            $table->string('area_atuacao',100);
            $table->string('chave_pix')->nullable();
            $table->string('cep',50)->nullable();
            $table->string('endereco',100)->nullable();
            $table->string('bairro',50)->nullable();
            $table->string('uf',50)->nullable();
            $table->string('cidade',50)->nullable();
            $table->string('perfil',100);
            $table->string('password',50)->nullable();
            $table->string('pontuacao',100);
            $table->dateTime('created_at')->date_timestamp_set;
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profissionais');
    }
}
