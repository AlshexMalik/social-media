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
        Schema::create('requistforfriend', function (Blueprint $table) {
            $table->id();
            $table->string('id_user_sender');
            $table->enum('state', ['friend', 'unfriend'])->default('unfriend');
            $table->string('reciver');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
