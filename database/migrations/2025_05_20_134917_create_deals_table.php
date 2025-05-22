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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->string('reference_number')->nullable();
            
            $table->string('project_type')->nullable();
            $table->string('project_name')->nullable();
            $table->string('developer')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->longText('project_description')->nullable();

            $table->string('agent_name')->nullable();
            $table->string('brokerage_name')->nullable();
            $table->string('brokerage_license_no')->nullable();

            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->string('swift_number')->nullable();
            $table->string('iban_number')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('bank_country')->nullable();

            $table->string('client_name')->nullable();
            $table->string('is_dld')->nullable();

            $table->string('project_value')->nullable();
            $table->string('commission_percentage')->nullable();
            $table->string('commission_amount')->nullable();

            $table->string('deal_status')->default('pending');
            $table->string('closing_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
