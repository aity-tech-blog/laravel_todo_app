<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Carbon\Carbon;

class TaskGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //　データベースをリセット
        \DB::table('task_groups')->truncate();

        // タスクグループのデータを挿入
        \App\Models\TaskGroup::insert([
            ['group_name' => '仕事','created_at' => Carbon::now(),'updated_at' => Carbon::now(),],
            ['group_name' => 'プライベート','created_at' => Carbon::now(),'updated_at' => Carbon::now(),],
            ['group_name' => 'その他','created_at' => Carbon::now(),'updated_at' => Carbon::now(),]   
        ]);
    }   
}
