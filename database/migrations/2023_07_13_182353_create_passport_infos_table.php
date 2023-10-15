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

        Schema::create('passport_infos', function (Blueprint $table) {
            $table->id();
            $table->string('pass_num')->nullable();
            $table->text('name')->nullable();
            $table->text('agency_name')->nullable();
            $table->text('state_info')->nullable();
            $table->text('office_name')->nullable();

            $table->date('received_date')->nullable();
            $table->date('sending_embassy_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passport_infos');
    }
};
