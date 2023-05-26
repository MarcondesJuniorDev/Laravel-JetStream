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
        Schema::create('local', function (Blueprint $table) {
            $table->id('id_local');
            $table->integer('id_local_school'); //tabela escola
            $table->integer('id_cliente'); //tabela cliente
            $table->string('local_description');
            $table->string('local_alias');
            $table->string('local_address');
            $table->string('local_district');
            $table->string('local_community');
            $table->string('local_postal_code');
            $table->string('local_reference');
            $table->string('local_vsat');
            $table->string('local_ip');
            $table->string('local_mask');
            $table->string('local_gateway');
            $table->string('local_dns1');
            $table->string('local_dns2');
            $table->boolean('local_power_generator');
            $table->string('local_kit');
            $table->string('local_situation');
            $table->date('id_local_mmplementation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('local');
    }
};
