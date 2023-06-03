<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_policies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('policy_id');
            $table->string('policy_type');
            $table->string('coverage_amount');
            $table->string('premium_amount');
            $table->string('excess_amount');
            $table->string('policy_duration');
            $table->string('description');
            $table->string('balance');
            $table->string('status')->default('Active');

            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_policies');
    }
};
