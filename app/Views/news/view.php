<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title"><?= esc($news['title']) ?></h2>
            <p class="card-text"><?= nl2br(esc($news['body'])) ?></p>
        </div>
        <div class="card-footer text-end">
            <a href="/news" class="btn btn-secondary">⬅ Quay lại</a>
        </div>
    </div>

</div>
