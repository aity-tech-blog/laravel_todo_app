@extends('layouts.app')

@section('title', 'タスクグループ一覧')

@section('styles')
    <style>
        .success { color: green; }
        .link_btn{ all: unset; cursor: pointer; }
    </style>
@endsection

@section('content')
    <h1>タスクグループ一覧</h1>
    <!-- グループ作成へのリンクボタン -->
    <button>
        <a class="link_btn" href="{{ route('task-groups.create') }}">タスクを作成</a>
    </button>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif
    <!-- データがない場合 -->
    @if ($taskGroups->isEmpty())
        <p>タスクグループがありません。タスクグループを作成してください。</p>
    @endif
    <!-- データがある場合 -->
    <ul>
        @foreach ($taskGroups as $taskGroup)
            <li style="margin-bottom: 10px;">
            {{ $taskGroup->group_name }}
            <button style="margin-left:10%">
                <a class="link_btn" href="{{ route('task-groups.edit', $taskGroup->group_id) }}">
                    編集
                </a>
            </button>
            <form action="{{ route('task-groups.destroy', $taskGroup->group_id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button style="margin-left: 10px;" type="submit" onclick="return confirm('本当に削除しますか？')">
                    削除
                </button>
            </form>
            </li>
        @endforeach
    </ul>
@endsection