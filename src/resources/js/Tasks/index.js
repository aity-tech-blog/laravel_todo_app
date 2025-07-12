document.querySelectorAll('input[name="done"][data-task-id]').forEach(cb => {
  cb.addEventListener('change', function() {
    fetch(`/tasks/${this.dataset.taskId}/done`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      },
      body: JSON.stringify({ done: this.checked })
    });

    // 行要素を取得（例: チェックボックスの親tr）
    const row = this.closest('tr');
    if (row) {
      if (this.checked) {
        row.classList.add('table-secondary', 'text-decoration-line-through');
      } else {
        row.classList.remove('table-secondary', 'text-decoration-line-through');
      }
    }
  });
});