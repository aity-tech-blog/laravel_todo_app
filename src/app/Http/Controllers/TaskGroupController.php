<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        return view('TaskGroups.index', compact('taskGroups'));
    }

    /**
     * タスクグループの登録フォームを表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーションルール
        $validator = Validator::make($request->all(), [
            'group_name' => 'required|max:255',
        ], [
            'group_name.required' => 'グループ名は必須です。',
            'group_name.max' => 'グループ名は255文字以内で入力してください。',
        ]);

        // バリデーションエラー時の処理
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'error_'.'createGroupModal')
                ->withInput()
                ->with('show_modal_id', 'createGroupModal'); // モーダル再表示用のフラグ
        }

        // タスクグループの作成
        TaskGroup::create([
            'group_name' => $request->input('group_name'),
        ]);

        return redirect()->route('task-groups.index')->with('success', 'グループ：「' . $request->input('group_name') . '」を作成しました。');
    }

    /**
     * タスクグループの更新処理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'group_name' => 'required|max:255',
        ], [
            'group_name.required' => 'グループ名は必須です。',
            'group_name.max' => 'グループ名は255文字以内で入力してください。',
        ]);
        // バリデーションエラー時の処理
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'error_'.'editGroupModal'.$id)
                ->withInput()
                ->with('show_modal_id', 'editGroupModal'.$id); // モーダル再表示用のフラグ
        }

        // タスクグループの更新
        $taskGroup = TaskGroup::findOrFail($id);
        $beforeName = $taskGroup->group_name; // 更新前のグループ名を保存
        // 更新処理
        $taskGroup->update([
            'group_name' => $request->input('group_name'),
        ]);
        return redirect()->route('task-groups.index')->with('success', 'グループ：「' . $beforeName . '」を「' . $request->input('group_name') . '」に更新しました。');
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
        return redirect()->route('task-groups.index')->with('success', 'グループ：「' . $taskGroup->group_name . '」を削除しました。');
    }
}