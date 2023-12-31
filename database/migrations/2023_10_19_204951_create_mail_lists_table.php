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
        Schema::create('mail_lists', function (Blueprint $table) {
            $table->id();
            $table->text('action');
            $table->text('offer_url')->nullable();
            $table->text('email');
            $table->text('title');
            $table->text('image')->nullable();
            $table->text('alt_text')->nullable();
            $table->text('image_url')->nullable();
            $table->text('content')->nullable();
            $table->text('id_creator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mail_lists');
    }
};
