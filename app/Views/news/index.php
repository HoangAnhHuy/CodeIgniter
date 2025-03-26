<style>
    .mySwiper {
        width: 100%;
        max-height: 320px;
        min-height: 320px;
        overflow: hidden;
        border-radius: inherit;
    }

    swiper-slide {
        position: relative;
        display: flex;
        min-height: 320px;
        align-items: center;
        justify-content: center;
        /* Đặt chiều cao tối thiểu */
        background-color: #f8f9fa;

        /* Thêm nền để không bị trống */
        /* Bo góc nhẹ */
        img {
            object-fit: cover;
            display: block;
        }

    }
</style>
<div class="container mt-4">
    <h2><?= esc($title) ?></h2>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php if ($news_list !== []): ?>

            <?php foreach ($news_list as $news_item): ?>

                <div class="col">
                    <div class="card h-100 shadow-sm">

                        <?php
                        if (strpos(current_url(), '/news') !== false): ?>
                            <swiper-container class="mySwiper" navigation="true" pagination="true" pagination-clickable="true" class="w-100">
                                <?php if (!empty($news_item['images'])): ?>
                                    <?php foreach ($news_item['images'] as $image): ?>
                                        <swiper-slide lazy="true">
                                            <img class="w-100 h-100 swiper-lazy" loading="lazy" src="<?= base_url('assets/images/fabric_images/') . esc($news_item['slug']) . '/' . esc($image) ?>" alt="Ảnh sản phẩm <?= esc($news_item['slug']) . "/" . esc($image) ?>" class="img-fluid">
                                        </swiper-slide>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <swiper-slide>
                                        <div class="d-flex justify-content-center align-items-center" style="min-height: 320px; background: #f8f9fa;">
                                            Không có ảnh
                                        </div>
                                    </swiper-slide>
                                <?php endif; ?>
                            </swiper-container>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($news_item['title']) ?></h5>
                            <p class="card-text"><?= nl2br(esc($news_item['body'])) ?></p>
                        </div>

                        <!-- Hàng hiển thị giá -->
                        <div class="card-footer bg-light py-2">
                            <div class="d-flex justify-content-around text-center">
                                <div>
                                    <small class="text-muted">Giá mẫu</small>
                                    <p class="mb-0 fw-bold text-info">140.000 VND</p>
                                </div>
                                <div>
                                    <small class="text-muted">Trên 1 tấn</small>
                                    <p class="mb-0 fw-bold text-primary">140.000 VND</p>
                                </div>
                                <div>
                                    <small class="text-muted">Dưới 1 tấn</small>
                                    <p class="mb-0 fw-bold text-muted">140.000 VND</p>
                                </div>
                            </div>
                        </div>

                        <!-- Hàng nút thao tác -->
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

    <h3>Không có sản phẩm</h3>

    <p>Không tìm thấy sản phẩm nào mà bạn cần tìm</p>

<?php endif ?>

<a class="btn btn-outline-primary mt-4" href="<?= base_url('/news/new') ?>">Thêm bài viết mới</a>
</div>