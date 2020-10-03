<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_parents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titleReport');
            $table->string('detailsReport');
            $table->bigInteger('student')->unsigned();
            $table->foreign('student')->references('id')->on('users')
                ->onDelete('cascade');
            $table->bigInteger('byUser')->unsigned();
            $table->foreign('byUser')->references('id')->on('users')
                ->onDelete('cascade');
            $table->bigInteger('parent')->unsigned();
            $table->foreign('parent')->references('id')->on('users')
                ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('students_parents');
    }
}
