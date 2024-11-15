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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('image');
            $table->longText('description');
            $table->boolean('status')->default(0);
            $table->boolean('is_true')->default(0);
            $table->date('start_date');
            $table->string('name1');
            $table->string('email1');
            $table->string('password1');
            $table->string('image1');
            $table->longText('description1');
            $table->boolean('status1')->default(0);
            $table->boolean('is_true1')->default(0);
            $table->date('start_date1');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
