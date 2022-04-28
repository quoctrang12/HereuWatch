<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page'); ?>
<main>

    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 mt-2">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-secondary">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="Product.php" class="text-decoration-none text-secondary">Sản phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$productDetail->ten_sp?></li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-8 text-center">
                <img src="assets/images/<?php if ($productDetail->ma_lsp == 'L01') echo 'Male/' . $productDetail->image;
                                        else echo 'Female/' . $productDetail->image ?>" alt="" width="70%" />
            </div>
            <div class="col-lg-4 p-5">
                <form action="/addCart" method="post">
                    <h3 class="pt-3"><?= $productDetail->ten_sp ?></h3>
                    <p class="pt-3 fw-bold h5"><?= $productDetail->gia_sp?>$</p>
                    <div class="pt-3">
                        <button class="btn btn-light me-2 mb-2">Size: 41mm</button>
                        <button class="btn btn-light me-2">Tình trạng: new</button>
                        <button class="btn btn-light me-2">Chất liệu: thép</button>
                    </div>
                    <div class="pt-3"><label>Số lượng: </label>
                        <input type="number" name="soluong" class="text-center ms-4" value="1" min="1" max="20" style="width:50px" />
                    </div>
                    <input type="hidden" value="<?= $productDetail->ma_sp ?>" name="masp" />
                    <div class="pt-3">
                        <span>Thẻ bảo hành: 2022 <br>
                            Bảo hành chính hãng 5 năm trên toàn cầu</span>
                    </div>

                    <div class="pt-3"><button type="submit" class="btn-product py-2 mb-2 w-100">Thêm vào giỏ hàng</button>
                        <a href="/product"><button class="btn-forgot py-2 w-100 mb-2">Tiếp tục mua
                                hàng</button></a>
                    </div>
                </form>
            </div>
        </div>
        <div class="container pt-5">
            <div class="row">
                <div class="p-5">
                    <h1>ĐỒNG HỒ OYSTER PERPETUAL GMT-MASTER II BẰNG OYSTERSTEEL VỚI DÂY ĐEO OYSTER.</h1>
                    <p class="pt-4">Rolex là thương hiệu đồng hồ đã hằn sâu vào tâm trí của rất nhiều người.
                        Cho dù ngành công nghiệp sản xuất đồng hồ có trải qua bao thăng trầm thì cái tên Rolex vẫn luôn toả sáng
                        và dường như thương hiệu này sinh ra là để làm cái mốc chinh phục của những giấc mơ,
                        của những khát khao, đam mê cháy bỏng của một người ưa chuộng đồng hồ.
                        Không ngừng nỗ lực để định hình những tiêu chuẩn kĩ thuật mới,
                        Rolex hân hoan giới thiệu đến giới sưu tập đồng hồ sản phẩm Rolex Datejust 126331 với mặt số màu socola ma mị,
                        cuốn hút mọi ánh nhìn.</p>
                    <div class="p-5">
                        <table class="table table-striped">
                            <thead>
                                <h4>Thông số kỹ thuật</h4>
                            </thead>
                            <tbody class="details-table">
                                <tr>
                                    <td>Tình trạng</td>
                                    <td>Mới 100%</td>
                                </tr>
                                <tr>
                                    <td>Phụ kiện</td>
                                    <td>Hộp, sổ, thẻ bảo hành 2022</td>
                                </tr>
                                <tr>
                                    <td>Kích thước mặt, Size</td>
                                    <td>41mm</td>
                                </tr>
                                <tr>
                                    <td>Xuất xứ</td>
                                    <td>Rolex - Thụy Sĩ</td>
                                </tr>
                                <tr>
                                    <td>Movement</td>
                                    <td>Automatic, Cal. 3235</td>
                                </tr>
                                <tr>
                                    <td>Chất liệu</td>
                                    <td>Thép không gỉ</td>
                                </tr>
                                <tr>
                                    <td>Chống nước</td>
                                    <td>1000m</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>
</main>
<?php $this->stop();?>
