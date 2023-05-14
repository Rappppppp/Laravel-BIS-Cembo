<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name_of_respondent');
            $table->string('nature_of_complaint');
            $table->string('location');
            $table->text('description');
            $table->string('supporting_evidence')->nullable();
            $table->enum('status', ['pending', 'under investigation', 'resolved', 'denied'])->default('pending');
            $table->unsignedBigInteger('approved_denied_by')->nullable();
            $table->timestamp('approved_denied_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('approved_denied_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('complaints');
    }
};