<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chief_id')->unsigned()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('position',99);
            $table->date('employment_date');
            $table->decimal('income_monthly', 19, 2);
            $table->timestamps();

            $table->foreign('chief_id')->references('id')->on('employees')->onDelete('RESTRICT');
            $table->foreign('position')->references('key')->on('catalog_position');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
