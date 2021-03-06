<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitScoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitscouts', function (Blueprint $table) {
            $table->integer('scout_id')->unsigned()->unique();
            $table->char('unit_id', 4);
            $table->char('stage', 4);
            $table->tinyInteger('sixfold_num', 2);

            $table->foreign('scout_id')->references('assurance_num')->on('scouts')->onDelete('cascade');
            $table->foreign('unit_id')->references('unit_id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
