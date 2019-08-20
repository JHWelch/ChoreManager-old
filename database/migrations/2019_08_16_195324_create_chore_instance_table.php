<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoreInstanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chore_instance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('chore_id');
            $table->date('due_date');
            $table->date('completed_date');
            $table->foreign('chore_id')->references('id')->on('chores')->onDelete('cascade');
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
        Schema::dropIfExists('chore_instance');
    }
}
