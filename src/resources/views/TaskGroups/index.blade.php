@extends('layouts.app')

@section('title', 'タスクグループ一覧')

@section('styles')
    @if (session('show_modal_id') != '')
        <script>
            <!-- 表示するモーダルＩＤを保持 -->
            window.appConfig = {
                showModalId: "{{ session('show_modal_id') }}",
            };
        </script>
        @vite(['resources/js/TaskGroups/index.js'])
    @endif
@endsection

@section('content')

@include('layouts.message')

<div class="container">
    <div class="row mt-4 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="h2 my-1 text-secondary">タスクグループ</h2>
            </div>
            <div>
                <!-- タスクグループ作成ボタン -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center float-end rounded-circle ms-2 py-3 px-3" data-bs-toggle="modal" data-bs-target="#createGroupModal">
                    <svg fill="#FFFFFF" width="17" height="17" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg>
                </button>

                <!-- Modal -->
                @include('TaskGroups.form', [
                    'form_action' => route('task-groups.store'),
                    'modal_id' => 'createGroupModal',
                    'is_edit' => false,
                    'taskGroup' => null
                ])
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- データがない場合 -->
            @if ($taskGroups->isEmpty())
                <p>タスクグループがありません。タスクグループを作成してください。</p>
            @endif
            <!-- データがある場合 -->
            <ul class="list-group list-group-flush">
                @foreach ($taskGroups as $taskGroup)
                    <li class="list-group-item d-flex justify-content-between align-items-center pe-0">
                        <!-- タスクグループ名 -->
                        <div>
                            <a class="btn" href="#">{{ $taskGroup->group_name }}</a>
                        </div>
                        <!-- ドロップダウンメニュー -->
                        <div class="btn-group">
                            <button class="btn rounded-circle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                                <li>
                                    <!-- 更新モーダル表示 -->
                                    <button type="button" class="btn d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#editGroupModal{{ $taskGroup->group_id }}">
                                        <svg fill="#212529" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
                                        <div class="ms-2">編集</div>
                                    </button>
                                </li>
                                <li>
                                    <!-- 削除モーダル表示 -->
                                    <button type="button" class="btn d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $taskGroup->group_id }}">
                                        <svg fill="#212529" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z"/></svg>
                                        <div class="ms-2">削除</div>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- 更新モーダル -->
                    @include('TaskGroups.form', [
                        'form_action' => route('task-groups.update', $taskGroup->group_id),
                        'modal_id' => 'editGroupModal' . $taskGroup->group_id,
                        'is_edit' => true,
                        'taskGroup' => $taskGroup
                    ])
                    <!-- 削除モーダル -->
                    @include('TaskGroups.delete', ['taskGroup' => $taskGroup])
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection