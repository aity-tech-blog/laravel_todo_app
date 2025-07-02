<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskGroup;

class TaskGroupController extends Controller
{
    /**
     * タスクグループの一覧を表示する
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $groups = TaskGroup::all(); // 全グループ取得
        $taskGroups = TaskGroup::select('group_id','group_name')->get(); // グループ名のみ取得
        return view('index', compact('taskGroups'));
    }

    /**
     * 登録フォームを表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('create');
    }

    // 登録処理
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'group_name' => 'required|max:255',
        ], [
            'group_name.required' => 'グループ名は必須です。',
            'group_name.max' => 'グループ名は255文字以内で入力してください。',
        ]);

        // タスクグループの作成
        TaskGroup::create([
            'group_name' => $validated['group_name'],
        ]);

        return redirect()->route('task-groups.index')->with('success', 'グループを作成しました。');
    }

    /**
     * 更新フォームを表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $taskGroup = TaskGroup::findOrFail($id);
        return view('edit', compact('taskGroup'));
    }

    /**
     * タスクグループの更新フォームを表示する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // バリデーション
        $validated = $request->validate([
            'group_name' => 'required|max:255',
        ], [
            'group_name.required' => 'グループ名は必須です。',
            'group_name.max' => 'グループ名は255文字以内で入力してください。',
        ]);
        // タスクグループの更新
        $taskGroup = TaskGroup::findOrFail($id);
        $taskGroup->update([
            'group_name' => $validated['group_name'],
        ]);
        return redirect()->route('task-groups.index')->with('success', 'グループを更新しました。');
    }
    /**
     * タスクグループの削除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taskGroup = TaskGroup::findOrFail($id);
        $taskGroup->delete();
        return redirect()->route('task-groups.index')->with('success', 'グループを削除しました。');
    }
}