<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique()->nullable(false);
            $table->integer('tipoanimal')->nullable(false);
            $table->date('fechanac')->nullable(false);
            $table->Decimal('peso')->nullable(false);
            $table->string('genero', 1)->nullable(false);
            $table->Decimal('alto')->nullable(false);
            $table->string('color')->nullable(false);
            $table->string('descripcion')->nullable(false);
            $table->string('lugarnac')->nullable(false);
            $table->integer('raza')->nullable(false);
            $table->string('imagen')->nullable(false);
            $table->integer('padre');
            $table->integer('madre');
            $table->integer('estado');
            $table->integer('propietario');
            $table->string('criadero');
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
        Schema::dropIfExists('animales');
    }
}
