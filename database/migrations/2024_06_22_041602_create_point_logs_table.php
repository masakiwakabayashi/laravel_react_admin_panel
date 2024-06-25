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
        Schema::create('point_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('obtained_point')->nullable();
            $table->integer('consumed_point')->nullable();
            $table->integer('charged_money')->nullable();
            $table->string('platform')->nullable();
            $table->string('consumed_point_purpose')->nullable();
            $table->timestamps();

            // 外部キーの設定
            $table->foreign('user_id')->references('id')->on('users')->cascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('point_logs');
    }
};
