<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->primary('n_of_client');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->char('telefone_number', 10);
            $table->integer('number_of_procedurs');
            $table->foreign('n_share')->references('id_share')->on('share_on_procedures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
