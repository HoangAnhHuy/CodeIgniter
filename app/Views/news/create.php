<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title">➕ Tạo bài viết mới</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <?= validation_list_errors() ?>

            <form action="/news" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="title" class="form-label">📝 Tiêu đề</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?= set_value('title') ?>" required placeholder="Nhập tiêu đề">
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">🔗 Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" value="<?= set_value('slug') ?>" placeholder="Tự động tạo nếu để trống">
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">📜 Nội dung</label>
                    <textarea class="form-control" name="body" id="body" rows="5" required style="resize: none;"><?= set_value('body') ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">✅ Đăng bài</button>
                <a href="/news" class="btn btn-secondary">❌ Hủy</a>
            </form>
        </div>
    </div>
</div>