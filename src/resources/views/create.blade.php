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
<h1>タスクグループ作成</h1>
<!-- フォームの埋め込み -->
@include('form', [
    'form_action' => route('task-groups.store'),
    'is_edit' => false,
    'taskGroup' => null
])
@endsection
