<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title">✏ Chỉnh sửa bài viết</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="/news/update/<?= esc($news['id']) ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="title" class="form-label">📝 Tiêu đề</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?= esc($news['title']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">📜 Nội dung</label>
                    <textarea class="form-control" name="body" id="body" rows="5" required><?= esc($news['body']) ?></textarea>
                </div>

                <button type="submit" class="btn btn-success">💾 Cập nhật</button>
                <a href="/news" class="btn btn-secondary">❌ Hủy</a>
            </form>
        </div>
    </div>
</div>
