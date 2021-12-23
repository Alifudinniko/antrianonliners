<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomers', function (Blueprint $table) {

            $table->id();
            $table->integer('sesis_id');
            $table->integer('dokter_id');
            $table->string('no');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
        Schema::table('nomers', function (Blueprint $table) {
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
        Schema::dropIfExists('nomers');
    }
}
