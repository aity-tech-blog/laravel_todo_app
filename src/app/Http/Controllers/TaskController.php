<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\TaskGroup;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * TODOリストページを表示する
     *
     * @return \Illuminate\Http\Response
     */
    function index($group_id = null){
        if (is_numeric($group_id)) {
            // タスクグループ指定の場合
            $taskGroup = TaskGroup::where('group_id', $group_id)->first();
            if (!$taskGroup) {
                // TaskGroupが存在しない場合はリクエストステータス404
                abort(404);
            } else {
                $title = $taskGroup->group_name;
            }
            
            $tasks = Task::select('tasks.task_id', 'tasks.task_name', 'tasks.description', 'tasks.done', 'tasks.start_time', 'tasks.end_time')
            ->join('task_groups', 'tasks.group_id', '=', 'task_groups.group_id')
            ->where('tasks.group_id', $group_id)
            ->get();
        } elseif (is_string($group_id)) {
            if ($group_id === 'uncategorized') {
                // 未分類指定の場合
                $tasks = Task::select('task_id','task_name','description','done','start_time','end_time')
                ->whereNull('group_id')
                ->get();
                $title = '未分類';
            } else {
                // 指定URL以外の場合はリクエストステータス404
                abort(404);
            }
        } else {
            // 指定なしの場合 ※すべてのタスク表示
            $tasks = Task::select('task_id','task_name','description','done','start_time','end_time')->get();
            $title = 'ALL';
        }
        return view('Tasks.index', compact('tasks', 'title'));
    }

    /**
     * タスクの完了状態を更新する
     *
     * @param Request $request
     * @param int $task_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateDone(Request $request, $task_id)
    {
        $task = Task::findOrFail($task_id);
        $task->done = $request->input('done') ? true : false;
        $task->save();
        return response()->json(['success' => true, 'done' => $task->done]);
    }
}