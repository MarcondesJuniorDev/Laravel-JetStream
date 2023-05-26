<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user_created'); //tabela user
            $table->integer('id_contract'); //tabela contratos
            $table->integer('id_type_of_contract'); //tabela contratos
            $table->integer('id_local'); //tabela local
            $table->integer('id_occurrence'); //tabela ocorrencias
            $table->string('contact_phone');
            $table->string('requester');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
