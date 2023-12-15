<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('marke');
            $table->string('nom');
            $table->double('prix');
            $table->mediumText('image')->nullable();
            $table->date('date_creation');
            $table->integer('nombre_de_km');
            $table->string('type');
            $table->integer('noProprietaire');
            
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
        Schema::dropIfExists('voitures');
    }
}
