<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id('information_id');
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->enum('gender', ['Male', 'Female', 'Gay', 'Lesbian', 'Bisexual', 'Pansexual', 'Non-binary', 'Others']);
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('nationality');
            $table->enum('religion', ['Roman Catholic', 'Iglesia ni Cristo', 'Muslim', 'Born Again', 'Seventh Day Adventist', 'Saksi ni Jehovah', 'Mormons', 'Buddhist', 'Others', 'Adelegates']);
            $table->enum('civil_status', ['Single', 'Married', 'Widowed', 'Live-in', 'Separated', 'Divorced']);
            $table->string('occupation')->nullable();
            $table->string('educational_attainment')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('personal_information');
    }
};