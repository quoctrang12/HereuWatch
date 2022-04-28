<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page')?>
<main>
    <!--HomeSlide-->
    <section class="callout position-relative">
        <div class="video-bg">
            <video autoplay loop muted>
                <source src="assets/videos/banner.mp4" type="video/mp4">
            </video>
        </div>
        <div class="video-overlay"></div>
        <div class="callout-inner text-center">
            <h1>HEREU WATCH</h1>
            <h5 class="pt-4">Bộ sưu tập</h5>
        </div>
    </section>

    <!-- Special-->
    <section class="home-special pt-5" style="background-color: #fff;">
        <div class="container text-center">
            <div class="row heading-section pt-5">
                <div class="row fs-4">
                    <div class="col text-end pe-0">
                        <span>SPECIAL</span>
                    </div>
                    <div class="col text-start ps-0">
                        <span class="special ">PRODUCTS</span>
                    </div>
                </div>
            </div>

            <div class="row g-3 py-5  row-cols-1 row-cols-lg-3 text-dark justify-content-center">
                <?php
                foreach ($products as $product) {
                    echo '<div class=" col-12 col-md-6">
                    <a href="/productDetail?masp=' . $product['ma_sp'] . '" class="text-decoration-none text-dark">
                    <div class="card shadow-none">
                        <img src="assets/images/';
                    if ($product['ma_lsp'] == 'L01') echo 'Male/' . $product['image'];
                    else echo 'Female/' . $product['image'];
                        echo '" class="img-fluid card-img-top " alt="">
                            <div class="card-body text-center">
                            <h6 class="card-text">' . $product['ten_sp'] . '</h6>
                            <p>' . $product['gia_sp'] . '$</p>
                            <a href = "/addCart?masp=' . $product['ma_sp'] . '"><button class="btn-product w-50">Add Cart</button></a>
                            </div>
                    </div>
                    </a>
                    </div>';
                }
                ?>
            </div>

        </div>
    </section> 
    <section class="callout position-relative">
        <div class="video-bg">
            <video autoplay loop muted>
                <source src="assets/videos/banner2.mp4" type="video/mp4">
            </video>
        </div>
        <div class="video-overlay"></div>
        <div class="callout-inner">
            <h1 class="mb-4">ĐỒNG HỒ MỚI NĂM 2022</h1>
            <a href="#"> <button class="btn btn-callout w-25 mb-3 py-2 rounded-pill">Tìm hiểu thêm </button></a>
        </div>
    </section>
    <section class="bg-light pt-5 home-material">
        <div class="container">
            <div class="row">
                <div class="title-material mb-5">
                    <h3>TIÊN PHONG TRONG HÀNH TRÌNH CHẾ TÁC ĐỒNG HỒ ĐEO TAY, KHỞI NGUỒN CỦA NHIỀU SÁNG KIẾN CHẾ TẠO ĐỒNG HỒ VĨ ĐẠI.</h3>
                </div>
                <div class="col-lg-12 title-material">
                    <div class="img-bg"><img src="assets/images/Logo/banner.png" class="img-fluid img-material" alt="..."></div>
                    <h5 class="m-0 mt-4">HUYỀN THOẠI CỦA TIÊU CHUẨN XUẤT SẮC</h5>
                    <p>Chế tác đồng hồ</p>
                </div>
                <div class="col-lg-6 title-material mt-5">
                    <div class="img-bg"><img src="assets/images/Logo/banner5.png" class="w-100" alt=""></div>
                    <h5 class="m-0 mt-4">DÂY ĐEO VÀ KHÓA CÀI</h5>
                    <p>Đáng tin cậy, thoải mái, thanh lịch</p>
                </div>
                <div class="col-lg-6 title-material mt-5">
                    <div class="img-bg"><img src="assets/images/Logo/banner1.png" class="w-100" alt=""></div>
                    <h5 class="m-0 mt-4">MẶT ĐỒNG HỒ</h5>
                    <p>Đồng hồ có nhiều mặt số</p>
                </div>
                <div class="col-lg-12 title-material mt-5">
                    <div class="img-bg"><img src="assets/images/Logo/banner4.png" class="img-fluid" alt="..."></div>
                    <h5 class="m-0 mt-4">VẬT LIỆU</h5>
                    <p>Nguồn gốc của sự vượt trội</p>
                </div>
                <div class="col-lg-6 title-material mt-5">
                    <div class="img-bg"><img src="assets/images/Logo/banner3.png" class="w-100" alt=""></div>
                    <h5 class="m-0 mt-4">DÂY ĐEO VÀ KHÓA CÀI</h5>
                    <p>Đáng tin cậy, thoải mái, thanh lịch</p>
                </div>
                <div class="col-lg-6 title-material mt-5 mb-5">
                    <div class="img-bg"><img src="assets/images/Logo/banner2.png" class="w-100" alt=""></div>
                    <h5 class="m-0 mt-4">MẶT ĐỒNG HỒ</h5>
                    <p>Đồng hồ có nhiều mặt số</p>
                </div>
            </div>
        </div>
        <section class="callout callout-img position-relative">
            <div class="img-bg">
                <img src="assets/images/Logo/banner6.png" class="img-fluid" alt="">
            </div>
            <div class="img-overlay"></div>
            <div class="callout-inner text-center">
            <h1 class="mb-4">HEREU WATCH</h1>
            <a href="#"> <button class="btn btn-inner mb-3 py-2 rounded-pill">Tìm hiểu thêm </button></a>
            </div>
        </section>

    </section>
</main>
<?php $this->stop()?>