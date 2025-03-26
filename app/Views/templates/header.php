<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | Vạn Thiên Hoàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Logo bên trái -->
            <a class="navbar-brand d-flex align-items-center" style="font-family: 'Nunito', sans-serif; font-weight: 800;" href="<?= base_url('/') ?>">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="50" height="50" viewBox="0 0 1061 1061" class="me-2">
                    <g transform="translate(0.000000,1061.000000) scale(0.100000,-0.100000)" fill="#ffffff" stroke="none">
                        <path d="M3775 8890 l-1530 -1530 1025 -1025 1025 -1025 -510 -510 c-280 -281 -514 -510 -520 -510 -6 0 -240 230 -520 511 l-510 511 -1010 -6 c-556 -3 -1010 -6 -1010 -6 -1 0 3043 -3043 3051 -3050 3 -2 465 456 1027 1018 l1022 1022 515 -515 515 -515 -517 -518 -518 -517 6 -1005 c4 -553 8 -1006 9 -1008 1 -1 689 685 1529 1525 l1527 1527 -1023 1023 -1023 1023 515 515 515 515 516 -516 516 -515 1007 2 c554 1 1009 5 1011 9 2 3 -683 693 -1523 1533 l-1527 1527 -1020 -1020 c-561 -561 -1024 -1020 -1030 -1020 -6 0 -240 230 -520 510 l-510 510 513 513 512 512 -2 1018 -3 1017 -1530 -1530z" />
                    </g>
                </svg>
                HOÀNG ANH HUY
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav d-flex align-items-center gap-3">
                    <li class="nav-item"><a class="nav-link" href="/news">📰 Bài viết</a></li>
                    <li class="nav-item"><a class="nav-link" href="/news/new">➕ Đăng bài</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= base_url('assets/images/logo.svg') ?>" alt="Avatar" class="rounded-circle me-2" width="40" height="40">
                            <span>Hoàng Anh Huy</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="/test">🚪 Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid mt-4">
        <h1 class="text-center"><?= esc($title) ?></h1>