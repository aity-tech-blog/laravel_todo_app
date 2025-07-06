// バリデーション時、モーダルの再表示イベント
document.addEventListener('DOMContentLoaded', () => {
    const modalId = window.appConfig?.showModalId;
    if (modalId) {
        const modal = new bootstrap.Modal(document.getElementById(modalId));
        modal.show();
    }
});

// モーダルがユーザーによって閉じられたときにエラーメッセージを削除
document.addEventListener('DOMContentLoaded', function () {
    // すべてのモーダルに対して適用
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.addEventListener('hidden.bs.modal', function () {
            // モーダル内のエラーメッセージ（ul.error）を削除
            const errorList = modal.querySelector('ul.error');
            if (errorList) {
                errorList.remove();
            }

            // 入力欄のエラースタイル（is-invalid）もリセット
            modal.querySelectorAll('.is-invalid').forEach(el => {
                el.classList.remove('is-invalid');
            });
        });
    });
});