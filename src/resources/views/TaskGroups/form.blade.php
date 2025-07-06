<!-- タスク入力モーダル -->
<div class="modal fade" id="{{ $modal_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="{{ $modal_id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="{{ $modal_id }}Label">タスクグループ{{ $is_edit ? '編集' : '作成' }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 入力フォーム -->
                <form method="POST" action="{{ $form_action }}">
                    @csrf
                    @if($is_edit)
                        @method('PUT')
                    @endif

                    @php
                        $errorBag = $errors->getBag('error_' . $modal_id);
                    @endphp

                    <div class="d-flex flex-column mb-3">
                        <label class="form-label" for="group_name">グループ名：</label>
                        <input 
                            class="form-control {{ $errorBag->has('group_name') ? 'is-invalid' : '' }}"
                            type="text"
                            id="group_name"
                            name="group_name" value="{{ $is_edit ? $taskGroup->group_name : '' }}" />
                    </div>
                    <!-- エラーメッセージ -->
                    @if($errorBag!='t')
                        <ul class="error ps-1">
                            @foreach($errorBag->all() as $error)
                                <li class="text-danger" style="list-style:none;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn btn-primary">{{ $is_edit ? '編集' : '作成' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>