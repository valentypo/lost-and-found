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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id'); // lost OR found
            $table->unsignedBigInteger('claimer_id'); // user who requests
            $table->unsignedBigInteger('owner_id');   // owner of the item
            $table->string('type'); // 'lost' or 'found'
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->text('message')->nullable(); // optional note
            $table->timestamps();
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
