<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page'); ?>
<main>
    <div class="container">
        <div class="row">
            <div class=" justify-content-center text-center pt-5 pb-5">
                <img src="assets/images/logo/hereu_watch_white.jpg" width="20%" alt="">
            </div>
            <div class="col-lg-8 col-12">
                <table class="table table-hover text-end">
                    <thead>
                        <th class="text-start">Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($carts as $cart) {
                            $sum = $cart['gia_sp'] * $cart['so_luong'];
                            $total += $sum;
                            echo '<tr class="align-self-center">
                                <td class="text-start">
                                <a href="/productDetail?masp=' . $cart->ma_sp . '" class="text-decoration-none text-dark"><img src="assets/images/';
                            if ($cart['ma_lsp'] == 'L01') echo 'Male/' . $cart['image'];
                            else echo 'Female/' . $cart['image'];
                            echo '" height="120vh" alt=""></a>
                                    <span class="pt-5">' . $cart['ten_sp'] . '</span>
                                </td>
                                <td class="pt-5">' . $cart['gia_sp'] . '$</td>
                                <td class="pt-5">' . $cart['so_luong'] . '</td>
                                <td class="pt-5">' . $sum . '$</td>
                                <td class="pt-5"><a href = "Cart.php?delete=' . $cart['ma_sp'] . '">
                                <button type="button" class="btn-close" aria-label="Close"></button></a>
                                </td>

                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card shadow-sm" style="max-width: 29rem;">
                    <div class="card-body">
                        <h5 class="card-title border-bottom py-3">Thông tin đơn hàng</h5>
                        <div class="card-subtitle">
                            <div class="d-flex border-bottom py-2">
                                <div class="p-2">Tổng tiền : </div>
                                <div class="ms-auto p-2 text-danger"><?= $total ?> $</div>
                            </div>
                        </div>
                        <p class="card-text py-3">Phí vận chuyển sẽ được tính ở trang thanh toán.
                            Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                        <button type="button" class="btn-submit py-2 w-100 mb-2" data-bs-toggle="modal" data-bs-target="#pay">Đặt hàng</button>

                        <a href="/product"><button class="btn-forgot py-2 w-100 mb-2">Tiếp tục mua
                                hàng</button></a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="pay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <form action="/pay" method="post">
                        <input type="hidden" name="magh" value = "<?=$carts[0]['ma_gh']?>"/>
                        <input type="hidden" name="makh" value = "<?=$makh?>"/>
                        <input type="hidden" name="tongtien" value = "<?= $total ?>"/>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thông tin thanh toán</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label class="form-label">Họ tên</label>
                                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Số điện thoại</label>
                                    <input type="text" name="sdt" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <h6>Phương thức thanh toán</h6>
                                    <button type="button" class="btn-momo py-2">MoMo</button>
                                    <button type="button" class="btn-bank py-2">Thẻ tín dụng</button>
                                    <button type="button" class="btn-pay py-2">Thanh toán trực tiếp</button>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-forgot py-2" data-bs-dismiss="modal">Thoát</button>
                                <button type="submit" class="btn-submit py-2">Thanh toán</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->stop();?>
