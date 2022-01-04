<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSprintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint', function (Blueprint $table) {
            $table->bigIncrements('sprint_id');
            $table->String('sprint_name');
            $table->String('sprint_desc');
            $table->date('start_sprint');
            $table->date('end_sprint');
            $table->string('proj_name');
            $table->string('users_name');
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
        Schema::dropIfExists('sprint');
    }
}