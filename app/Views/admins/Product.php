<?php $this->layout(config('view.admin')) ?>

<?php $this->start('page') ?>
<div class="col-lg-10">
    <div class="container">
        <div class="row mb-3 pt-4">
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Sắp xếp theo</option>
                    <option>Loại sản phẩm</option>
                    <option>Tên</option>
                    <option>Giá</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Tìm theo</option>
                    <option>Loại sản phẩm</option>
                    <option>Tên</option>
                    <option>Giá</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn-product w-75 mb-2 justify-content-md-end"><i class="fas fa-plus me-2"></i>Thêm</button>
            </div>


        </div>

        <div class="row pt-3">
            <table class="table table-hover rounded text-center">
                <thead>
                    <th>
                        ID
                    </th>
                    <th>
                        Hình ảnh
                    </th>
                    <th>
                        Tên
                    </th>
                    <th>Giá</th>
                    <th>
                        Thao tác
                    </th>
                    <th></th>
                </thead>
                <tbody class="product-table">
                    <?php
                    foreach ($products as $product) {
                        echo '<tr class="align-middle">
                            <td>' . $product['ma_sp'] . '</td>
                            <td class="w-25"><img src="assets/images/';
                        if ($product['ma_lsp'] == 'L01') echo 'Male/' . $product['image'];
                        else echo 'Female/' . $product['image'];
                        echo '" width="45%" alt=""></td>
                            <td>' . $product['ten_sp'] . '</td>
                            <td>' . $product['gia_sp'] . '$</td>
                            <td><a  data-bs-toggle="modal" data-bs-target="#' . $product['ma_sp'] . '"><i class="fas fa-edit text-dark"></i></a></td>
                            <td><a href="#">
                                    <div class="btn btn-close" aria-label="Close"></div>
                                </a></td>
                        </tr>
                        <div class="modal fade" id="' . $product['ma_sp'] . '" tabindex="-1" aria-labelledby="namemodal" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="/adminProduct" method="post"><div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="namemodal">Edit sản phẩm</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label class="form-label">Mã sản phẩm: ' . $product['ma_sp'] . '</label>
                                <input type="hidden" class="form-control" name="masp" value="' . $product['ma_sp'] . '">
                            </div>
                            <div class="mb-2">
                                <label for="tsp" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="tensp" value="' . $product['ten_sp'] . '">
                            </div>
                            <div class="mb-2">
                                <label for="money" class="form-label">Giá sản phẩm</label>
                                <input type="text" class="form-control" name="giasp" value="' . $product['gia_sp'] . '" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn-forgot" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn-product" id="add">Cập nhật</button>
                        </div>
                    </div></form>
                </div>
            </div>
    </div>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <?php $this->stop(); ?>