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
        Schema::create('recalls', function (Blueprint $table) {
            $table->id();
            $table->string("address_1")->nullable();
            $table->string("address_2")->nullable();
            $table->string("country")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("reason_for_recall")->nullable();
            $table->string("product_quantity")->nullable();
            $table->string("code_info")->nullable();
            $table->date("center_classification_date")->nullable();
            $table->string("distribution_pattern")->nullable();
            $table->string("product_description")->nullable();
            $table->date("report_date")->nullable();
            $table->string("classification")->nullable();
            $table->json("openfda")->nullable();
            $table->string("recalling_firm")->nullable();
            $table->string("recall_number")->nullable();
            $table->string("initial_firm_notification")->nullable();
            $table->string("product_type")->nullable();
            $table->string("event_id")->nullable();
            $table->date("termination_date")->nullable();
            $table->date("recall_initiation_date")->nullable();
            $table->string("postal_code")->nullable();
            $table->string("voluntary_mandated")->nullable();
            $table->string("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recalls');
    }
};
