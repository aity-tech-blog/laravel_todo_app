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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id');
            $table->string('task_name', 100);
            $table->text('description')->nullable();
            $table->boolean('done')->default(false);
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->unsignedBigInteger('group_id')->index();
            $table->foreign('group_id')->references('group_id')->on('task_groups')->onDelete('cascade'); // 外部キー
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
