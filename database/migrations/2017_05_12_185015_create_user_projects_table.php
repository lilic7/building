<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('building_id')->unsigned();
            $table->integer('windows')->default(0);
            $table->integer('doors')->default(0);
            $table->integer('color_id')->unsigned()->nullable();
            $table->integer('material_id')->unsigned()->nullable();
            $table->boolean('with_works')->default(0);

            $table  ->foreign('user_id')
                    ->references('id')
                    ->on('users');
            $table  ->foreign('building_id')
                    ->references('id')
                    ->on('buildings');
            $table  ->foreign('color_id')
                    ->references('id')
                    ->on('colors');
            $table  ->foreign('material_id')
                    ->references('id')
                    ->on('materials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_projects');
    }
}
