<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default('1');                   // create user_id column
            $table->foreign('user_id')->references('id')->on('users');          // set user_id
            $table->unsignedBigInteger('company_id')->default('1');             // create company_id column
            $table->foreign('company_id')->references('id')->on('company');     // set company_id
            $table->string('title');                                            // titel review
            $table->timestamp('start_date')->nullable();                        // startdate internship
            $table->timestamp('end_date')->nullable();                          // einddate internship
            $table->tinyInteger('rating');                                      // rating between 0 en 10
            $table->string('role');                                             // your role in the company
            $table->string('type');                                             // exploratory-/graduate internship
            $table->string('details');                                          // describe your internship
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
        Schema::dropIfExists('reviews');
    }
}
