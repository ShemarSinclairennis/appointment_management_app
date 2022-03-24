<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->text('first_name');
            $table->text('last_name');
            $table->text('middle_initial');
            $table->enum('marital_status',['Married','Widowed','Seperated','Divorced','Single']);
            $table->enum('gender',['Male','Female']);
            $table->date('dob');
            $table->text('street_address');
            $table->text('city');
            $table->enum('parish',['St.Andrew','Kingston','St.Mary','St.Ann','St.Thomas','St.Elizabeth','Portland','St.Catherine','Manchester','Clarendon','Hanover','Westmoreland','St.James','Trelawny']);
            $table->integer('home_phone');
            $table->integer('cell_phone');
            $table->text('email');
            $table->text('occupation');
            $table->text('employer');
            $table->integer('employer_number');
            $table->text('emergency_name');
            $table->integer('emergency_home_phone');
            $table->integer('emergency_cell_phone');
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
        Schema::dropIfExists('patients');
    }
};
