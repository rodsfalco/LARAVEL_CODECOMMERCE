<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('endereco', 100);
            $table->string('numero', 10);
            $table->string('complemento', 20);
            $table->string('bairro', 30);
            $table->string('cidade', 30);
            $table->string('estado', 2);
            $table->string('cep', 8);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('endereco');
            $table->removeColumn('numero');
            $table->removeColumn('complemento');
            $table->removeColumn('bairro');
            $table->removeColumn('cidade');
            $table->removeColumn('estado');
            $table->removeColumn('cep');
        });
    }
}
