<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'task_name' => '書類作成',
            'description' => 'レポートを作成する',
            'done' => false,
            'start_time' => now(),
            'end_time' => now()->addDay(),
            'group_id' => 1, // 仕事
        ]);
        Task::create([
            'task_name' => '買い物',
            'description' => 'スーパーで食材を買う',
            'done' => false,
            'start_time' => now(),
            'end_time' => now()->addDay(),
            'group_id' => 2, // プライベート
        ]);
        Task::create([
            'task_name' => '未分類タスク',
            'description' => 'group_idがnullのサンプル',
            'done' => false,
            'start_time' => now(),
            'end_time' => now()->addDay(),
            'group_id' => null,
        ]);
    }
}