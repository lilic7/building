<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->integer('work_id')->unsigned();
            $table->integer('work_category_id')->unsigned();

            $table  ->foreign('project_id')
                    ->references('id')
                    ->on('user_projects')->onDelete('cascade');
            $table  ->foreign('work_id')
                    ->references('id')
                    ->on('works')->onDelete('cascade');
            $table  ->foreign('work_category_id')
                    ->references('category_id')
                    ->on('works')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works_lists');
    }
}
