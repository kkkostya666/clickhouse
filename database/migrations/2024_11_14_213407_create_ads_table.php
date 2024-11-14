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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->enum('status', ['active', 'pending', 'archived'])->default('pending');
            $table->string('url');
            $table->integer('impressions_count')->default(0);
            $table->decimal('cpm');
            $table->decimal('budget', 10, 2);
            $table->enum('button_text', ['watch', 'apply', 'download', 'learn_more'])->default('learn_more');
            $table->foreignId('campaign_id')->constrained('campaigns')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
