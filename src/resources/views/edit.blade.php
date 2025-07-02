@extends('layouts.app')

@section('title', 'タスクグループ作成')

@section('styles')
<style>
    body { font-family: sans-serif; padding: 20px; }
    .form-group { margin-bottom: 1em; }
    .error { color: red; }
    .success { color: green; }
    .link_btn{ all: unset; cursor: pointer; }
</style>
@endsection

@section('content')
    <h1>タスクグループの更新</h1>
    <!-- フォームの埋め込み -->
    @include('form', [
        'form_action' => route('task-groups.update', $taskGroup->group_id),
        'is_edit' => true,
        'taskGroup' => $taskGroup
    ])
@endsection