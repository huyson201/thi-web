<?php
include "./LoadClass.php";
$categories = $category->getAll();
$cate = 0;
if (isset($_GET['category'])) {
    $cate = $_GET['category'];
}
$postDefault = $post->getByCategory($cate);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./public/styles/style.css">

</head>

<body>
    <div class="wrapper">
        <header>
            <div class="container">

            </div>
            <nav class="navbar navbar-expand-md navbar-light bg-dark">
                <div class="container-fluid">
                    <div class="logo-box">
                        <a href="#"> <img src="./public/images/logo.png" alt="logo"></a>
                    </div>
                    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarID" aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarID">
                        <div class="navbar-nav me-auto">
                            <a class="nav-link <?php echo $cate == 0 ? 'active' : 'text-light'; ?> " aria-current="page" href="./">Trang chủ</a>
                            <?php foreach ($categories as $value) : ?>
                                <a class="nav-link <?php echo $cate == $value['category_id'] ? 'active' : 'text-light'; ?> " aria-current="page" href="?category=<?php echo $value['category_id']; ?>"><?php echo $value['category_name']; ?></a>
                            <?php endforeach ?>

                        </div>
                        <form action="#" class="d-flex">
                            <input type="search" class="form-control me-2 shadow-none" id="ip-search" placeholder="search" aria-label="search">
                            <button class="btn " id="btn-search">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>

        <section class="main-content">
            <div class=" container-xl container-sm">
                <div class="box-title">
                    <h2 class="title">Recently News</h2>
                </div>
                <div class="posts">
                    <div class="row gy-3" data-masonry='{"percentPosition": true }'>
                        <?php foreach ($postDefault as $key => $post) : ?>

                            <div class="col-md-4 col-sm-6">
                                <aside class="card">
                                    <a href="#">
                                        <div class="img-box">
                                            <img src="./public/images/<?php echo $post['post_image']; ?>" class="card-img-top" alt="image">
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <a href="#">
                                            <h5 class="card-title"><?php echo $post['post_title']; ?></h5>
                                        </a>
                                        <p class="card-text mb-0">
                                            <?php echo substr($post['post_content'], 0, 150) . '...'; ?>
                                        </p>
                                        <div class="post-like d-flex align-items-center p-0 m-0">
                                            <button class="btn like-btn p-0 m-0 ">
                                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                            </button>
                                            <span class="like-number ms-1">1235</span>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        <?php endforeach ?>

                    </div>
                </div>
                <div class="btn-box">
                    <button class="btn btn-view-more shadow-none">Views more</button>
                </div>
            </div>
        </section>

        <footer class="footer bg-dark py-3">
            <div class="container-xl container-sm">

                <div class="">
                    <a href="./">
                        <div class="footer__logo text-center">
                            <img src="./public/images/logoThanhDoanTP.png" alt="logo">
                        </div>
                    </a>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <div class="info text-light ">
                        <div class="info-title">Thành Đoàn Thành phố Hồ Chí Minh:</div>
                        <div>
                            Địa chỉ: Số 1 Phạm Ngọc Thạch, Quận 1, TP HCM
                        </div>
                        <div>
                            Email: thanhdoan@tphcm.gov.vn
                        </div>

                    </div>
                </div>

                <div class="coppyright ">
                    &copy; 2022 Bản quyền thuộc về Thành Đoàn Thành phố Hồ Chí Minh
                </div>
            </div>
        </footer>
    </div>
    <script>
        let cate = +<?php echo $cate ?>;
    </script>
    <script src="./public/js/jquery-3.6.0.min.js"></script>
    <script src="./public/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="./public/js/masonry.pkgd.min.js"></script>
    <script src="./public/fontawesome/js/all.min.js"></script>
    <script src="./public/js/script.js"></script>

</body>

</html>