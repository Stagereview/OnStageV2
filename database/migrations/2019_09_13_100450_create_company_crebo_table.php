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
            $table->unsignedBigInteger('companyId')->unsigned();
            $table->unsignedBigInteger('creboId')->unsigned();
        });

        Schema::table('company_crebo', function(Blueprint $table) {
            $table->foreign('companyId')
            ->references('id')
            ->on('company');
            $table->foreign('creboId')
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
    