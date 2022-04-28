<?php $this->layout(config('view.admin')) ?>

<?php $this->start('page') ?>
<div class="col-lg-10 pt-5" style="background-color: #DDDDDD;">
    <div class="container">
        <div class="row row-cols-md-4">
            <div class="col-lg-3">
                <div class="card card-admin-product" style="width: 100%;">
                    <div class="card-body p-4">
                        <h6 class="card-title card-text mb-3">PRODUCT</h6>
                        <div class="d-flex mb-3">
                            <div>
                                <h3 class="card-text w-100"><?= $countProduct ?></h3>
                            </div>
                            <div class="ms-auto"><i class="fab fa-product-hunt fs-1 ms-auto"></i></div>
                        </div>
                        <div class="d-flex mb-2">
                            <div><i class="fas fa-arrow-up fs-6 me-1"></i>
                                <span class="card-text">+5</span>
                            </div>
                            <div class="badge card-text text-wrap pt-2 ms-auto " style="width: 7rem;">
                                Since last month
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-admin-user" style="width: 100%;">
                    <div class="card-body p-4">
                        <h6 class="card-title card-text mb-3">USERS</h6>
                        <div class="d-flex mb-3">
                            <div>
                                <h3 class="card-text w-100"><?= $countUser ?></h3>
                            </div>
                            <div class="ms-auto"><i class="fas fa-users fs-1 ms-auto"></i></div>
                        </div>
                        <div class="d-flex mb-2">
                            <div><i class="fas fa-arrow-up fs-6 me-1"></i>
                                <span class="card-text">+5</span>
                            </div>
                            <div class="badge card-text text-wrap pt-2 ms-auto " style="width: 7rem;">
                                Since last month
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-admin-recipt" style="width: 100%;">
                    <div class="card-body p-4">
                        <h6 class="card-title card-text mb-3">RECIPTS</h6>
                        <div class="d-flex mb-3">
                            <div>
                                <h3 class="card-text w-100"><?= $countBill ?></h3>
                            </div>
                            <i class=""></i>
                            <div class="ms-auto"><i class="fas fa-file-invoice-dollar fs-1 ms-auto"></i></div>
                        </div>
                        <div class="d-flex mb-2">
                            <div><i class="fas fa-arrow-up fs-6 me-1"></i>
                                <span class="card-text">+15</span>
                            </div>
                            <div class="badge card-text text-wrap pt-2 ms-auto " style="width: 7rem;">
                                Last 1 minute
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-admin-proceed" style="width: 100%;">
                    <div class="card-body p-4">
                        <h6 class="card-title card-text mb-3">PROCEED</h6>
                        <div class="d-flex mb-3">
                            <div>
                                <h3 class="card-text w-100"><?php $sum = 0;
                                                            foreach ($carts as $cart) {
                                                                if ($cart->trang_thia_don_hang == 'Đã xác nhận') $sum += $cart->tong_tien;
                                                            }
                                                            echo $sum; ?>$</h3>
                            </div>
                            <div class="ms-auto"><i class="fas fa-chart-line fs-1 ms-auto"></i></div>
                        </div>
                        <div class="d-flex mb-2">
                            <div><i class="fas fa-arrow-up fs-6 me-1"></i>
                                <span class="card-text">+500</span>
                            </div>
                            <div class="badge card-text text-wrap pt-2 ms-auto " style="width: 7rem;">
                                Last 1 minute
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <table class="table table-hover rounded text-center">
                <thead>
                    <th>
                        Mã đơn hàng
                    </th>
                    <th>
                        Thời gian đặt hàng
                    </th>
                    <th>
                        Tên người nhận
                    </th>
                    <th>
                        Địa chỉ
                    </th>
                    <th>
                        Trạng thái đơn hàng
                    </th>
                    <th>Thao tác</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($carts as $cart) {
                        echo '<tr>
                            <td>' . $cart['ma_hd'] . '</td>
                            <td>' . $cart['ngay_lap'] . '</td>
                            <td>' . $cart['ho_ten'] . '</td>
                            <td>' . $cart['dia_chi'] . '</td>
                            <td>
                                <div>
                                <p class="badge rounded-pill ';
                                if($cart['trang_thai_don_hang']==='Đã xác nhận') echo "alert-success"; else echo "alert-danger";echo'  text-wrap" id="' . $cart['ma_hd'] . '">' . $cart['trang_thai_don_hang'] . '</p>
                                </div>
                            </td>
                            <td>';
                        if ($cart['trang_thai_don_hang'] == "Đã xác nhận")
                            echo '<a href="/admin?delete=' . $cart['ma_hd'] . '" ><button class="btn p-0"><i class="fas fa-times text-danger"></i></button></a>';
                        else echo '<a href="/admin?accept=' . $cart['ma_hd'] . '" ><button class="btn p-0"><i class="fas fa-check text-success"></i></button></a></td>
                        </tr>';
                    }
                    ?>

                </tbody>

            </table>
        </div>
        <script>
            $(document).ready(function() {
                if ($('#<?= $cart['ma_hd'] ?>').text() === "Đã xác nhận") {
                    $('#<?= $cart['ma_hd'] ?>').removeClass('alert-danger').addClass('alert-success');
                }
            })
        </script>
    </div>
</div>
<?php $this->stop(); ?>