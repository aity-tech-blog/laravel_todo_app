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
        // 外部キー(group_id)をNULL許容するように変更
        Schema::table('tasks', function (Blueprint $table) {
        $table->unsignedBigInteger('group_id')->nullable()->change();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // upの操作を取り消したいときの処理
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id')->nullable(false)->change();
        });
    }
};
