<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('facebook_id');
            $table->string('title');
            $table->text('message')->nullable();
            $table->text('full_picture');
            $table->text('created_time');
            $table->text('permalink_url');
            $table->text('tags');
            $table->text('posted_by');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};