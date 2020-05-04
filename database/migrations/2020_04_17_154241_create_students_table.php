<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('bod');
            $table->bigInteger('phone');
            $table->string('photo')->nullable();
            $table->string('address');
            $table->string('last_degree')->nullable();
            $table->bigInteger('wallet_id')->nullable();
            $table->bigInteger('program_id')->nullable();
            $table->string('rating')->nullable();
            $table->bigInteger('pearint_id')->unsigned();
            $table->foreign('pearint_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('students');
    }
}
