<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makatizen_registry', function (Blueprint $table) {
            $table->id('registry_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('registered_voter')->default(false)->nullable();
            $table->boolean('head_of_household')->default(false)->nullable();
            $table->enum('social_sector', ['NA', 'Education', 'Health', 'Social Welfare', 'Sports'])->nullable();
            $table->enum('vaccine_status', ['Single Dose', 'Fully vaccinated', 'Unvaccinated', 'Vaccine Exempt'])->nullable();
            $table->integer('years_makati')->nullable();
            $table->integer('years_barangay_cembo')->nullable();
            $table->integer('years_current_address')->nullable();
            $table->integer('num_household')->nullable();
            $table->integer('num_families_household')->nullable();
            $table->integer('num_family_members')->nullable();
            $table->enum('relationship_head_family', ['Self', 'Spouse/Husband', 'Sibling', 'Parent', 'Other'])->nullable();
            $table->boolean('yellow_card')->default(false)->nullable();
            $table->boolean('blue_card')->default(false)->nullable();
            $table->boolean('white_card')->default(false)->nullable();
            $table->boolean('makatizen_card')->default(false)->nullable();
            $table->boolean('philhealth_card')->default(false)->nullable();
            $table->integer('monthly_household_income')->nullable();
            $table->integer('monthly_household_expenses')->nullable();
            $table->integer('monthly_mean_income')->nullable();
            $table->integer('monthly_net_income')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('makatizen_registry');
    }
};