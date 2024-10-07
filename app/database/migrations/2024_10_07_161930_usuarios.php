<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\UsuarioModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('Extension');
            $table->string('Departamento');
            $table->string('Nombre');
            $table->string('Puesto');
            $table->string('Email');
            $table->string('Area');
            $table->string('Campus');
        });
        UsuarioModel::create(
            [
                'id' => 1,
                'Extension' => 6010,
                'Departamento' => 'Direccion',
                'Nombre' => 'Juan Pérez',
                'Puesto' => 'Profesor',
                'Email' => 'juan@gmail.com',
                'Area' => 'Direccion',
                'Campus' => 'Guaymas',
            ],
        );

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
