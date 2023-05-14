<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('contact_information', function (Blueprint $table) {
            $table->id('contact_id');
            $table->unsignedBigInteger('user_id');
            $table->string('contact_number', 20);
            $table->string('house_number', 30);
            $table->string('street_name', 50);
            $table->string('barangay_name', 50);
            $table->string('city_name', 50);
            $table->string('prov_house_number', 10);
            $table->string('prov_street_name', 50);
            $table->string('prov_barangay_name', 50);
            $table->string('prov_city_name', 50);
            $table->string('province_name', 50);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_information');
    }
};