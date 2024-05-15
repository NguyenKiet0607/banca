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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['email']);
            $table->integer('phone_zalo')->nullable()->after('phone');
            $table->string('tenant_code', 50)->nullable()->after('phone_zalo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email', 50)->unique()->nullable();
            $table->dropColumn(['phone_zalo', 'tenant_code']);
        });
    }
};
