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
        Schema::create('folhas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_funcionario')->contrained('funcionarios')->nullable();
            $table->integer('mes');
            $table->integer('ano');
            $table->integer('horas');
            $table->decimal('valor');
            $table->boolean('enviada')->default(false);
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
        Schema::dropIfExists('folhas');
    }
};
