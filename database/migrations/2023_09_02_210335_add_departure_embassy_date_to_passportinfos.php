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
        Schema::table('passport_infos', function (Blueprint $table) {
            //
            $table->date('departure_embassy_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('passportinfos', function (Blueprint $table) {
            //
            $table->dropColumn('departure_embassy_date');
        });
    }
};
