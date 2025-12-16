<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('lost_items', function (Blueprint $table) {
            $table->string('contact_number')->nullable();
            $table->enum('status', ['open', 'claimed', 'returned'])->default('open');
        });

        Schema::table('found_items', function (Blueprint $table) {
            $table->string('contact_number')->nullable();
            $table->enum('status', ['open', 'claimed', 'returned'])->default('open');
        });
    }

    public function down()
    {
        Schema::table('lost_items', function (Blueprint $table) {
            $table->dropColumn(['contact_number', 'status']);
        });

        Schema::table('found_items', function (Blueprint $table) {
            $table->dropColumn(['contact_number', 'status']);
        });
    }

};