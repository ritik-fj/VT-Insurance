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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('policy_id');
            $table->string('claim_type');
            $table->string('claim_amount');
            $table->text('description');
            $table->date('incident_date');
            $table->binary('image')->nullable();
            $table->string('status')->default('Pending');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('policy_id')->references('id')->on('customer_policies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
