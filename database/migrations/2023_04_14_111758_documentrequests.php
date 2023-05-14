<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('document_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('document_type');
            $table->string('document_path', 2048);
            $table->json('inputs')->nullable();
            $table->enum('status', ['pending', 'approved', 'denied', 'completed'])->default('pending');
            $table->timestamp('requested_at')->useCurrent();
            $table->timestamp('approved_denied_at')->nullable();
            $table->unsignedBigInteger('approved_denied_by')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('approved_denied_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('document_requests');
    }
};