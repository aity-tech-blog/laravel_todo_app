<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskGroupController;
use App\Http\Controllers\TaskController;

/**
 * task_groupsテーブル
*/
// 一覧表示
Route::get('/', [TaskGroupController::class, 'index'])->name('task-groups.index');  // タスクグループの一覧表示
// 登録処理用
// Route::get('/task-groups/create', [TaskGroupController::class, 'create'])->name('task-groups.create'); // タスクグループの登録フォーム表示
Route::post('/task-groups/store', [TaskGroupController::class, 'store'])->name('task-groups.store'); // タスクグループの登録処理
// 更新処理用
// Route::get('/task-groups/{id}/edit', [TaskGroupController::class, 'edit'])->name('task-groups.edit'); // タスクグループの編集フォーム表示
Route::put('/task-groups/{id}', [TaskGroupController::class, 'update'])->name('task-groups.update'); // タスクグループの更新処理
// 削除処理用
Route::delete('/task-groups/{id}', [TaskGroupController::class, 'destroy'])->name('task-groups.destroy'); // タスクグループの削除処理

/**
 * tasksテーブル
*/
// 一覧表示
Route::get('/tasks/all', [TaskController::class, 'index'])->name('tasks.index.all');  		// 全てのタスク
Route::get('/tasks/{group_id}', [TaskController::class, 'index'])->name('tasks.index');		// 指定グループのタスク
// タスクチェックボックスの更新
Route::post('/tasks/{task_id}/done', [TaskController::class, 'updateDone'])->name('tasks.updateDone'); // タスクの完了状態を更新