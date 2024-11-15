<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index()->constrained()->onDelete('cascade'); // Bigint with index, nullable
            $table->string('ip_address', 45)->nullable(); // IP address max length for IPv6
            $table->text('user_agent')->nullable(); // Browser user agent
            $table->longText('payload'); // Session data payload
            $table->integer('last_activity')->index(); // Last activity timestamp
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
