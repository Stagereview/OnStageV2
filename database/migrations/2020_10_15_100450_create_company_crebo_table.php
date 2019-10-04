<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyCreboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_crebo', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->unsigned();
            $table->unsignedBigInteger('crebo_id')->unsigned();
        });

        Schema::table('company_crebo', function(Blueprint $table) {
            $table->foreign('company_id')
            ->references('id')
            ->on('company');
            $table->foreign('crebo_id')
            ->references('id')
            ->on('crebo');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_crebo');
    }
}
    