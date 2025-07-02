<!-- 入力フォーム -->
<form method="POST" action="{{ $form_action }}">
    @csrf
    @if($is_edit)
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="group_name">グループ名：</label>
        <input type="text" id="group_name" name="group_name" value="{{ $is_edit ? $taskGroup->group_name : '' }}"></input>
    </div>
    <!-- エラーメッセージ -->
    @if($errors->any())
        <ul class="error">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button type="submit">{{ $is_edit ? '更新' : '作成' }}</button>
</form>

<!-- 戻るボタン -->
<button>
    <a class="link_btn" href="{{ route('task-groups.index') }}">戻る</a>
</button>