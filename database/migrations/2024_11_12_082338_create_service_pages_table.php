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
        Schema::create('service_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->text('description');
            $table->string("sevice_image")->nullable();
            $table->string('link')->nullable();
            $table->string('feature_icon')->nullable();
            $table->string('feature_title')->nullable();
            $table->json('feature_description')->nullable();
            $table->string('why_title')->nullable();
            $table->text('why_description')->nullable();
            $table->string('why_image')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('package_id')->nullable();
            $table->unsignedBigInteger('faq_id')->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->foreign('faq_id')->references('id')->on('f_a_q_s')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_pages');
    }
};
