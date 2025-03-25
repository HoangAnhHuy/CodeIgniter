<div class="container mt-4">
    <h2><?= esc($title) ?></h2>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php if ($news_list !== []): ?>

            <?php foreach ($news_list as $news_item): ?>

                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($news_item['title']) ?></h5>
                            <p class="card-text"><?= nl2br(esc($news_item['body'])) ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="/news/<?= esc($news_item['slug'], 'url') ?>" class="btn btn-primary">📖 Xem</a>
                            <a href="/news/edit/<?= esc($news_item['id']) ?>" class="btn btn-warning">✏ Sửa</a>
                            <a href="/news/delete/<?= esc($news_item['id']) ?>"
                                onclick="return confirm('Bạn có chắc muốn xóa bài này không?');"
                                class="btn btn-danger">🗑 Xóa</a>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
    </div>
<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>

<a class="btn btn-outline-primary mt-4" href="<?= base_url('/news/new') ?>">Thêm bài viết mới</a>
</div>