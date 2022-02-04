<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('descripcion');
            $table->integer('capacidad');
            $table->string('entidad');
            $table->string('extraescolar')->nullable();
            $table->string('fundado');
            $table->boolean('terminos')->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('user_id')
                ->nullable()
                ->after('id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centros');
    }
}
