<?php $this->layout(config('view.admin')) ?>

<?php $this->start('page')?>
<div class="col-lg-10">
    <div class="container">
        <div class="row mb-3 pt-4">
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Sắp xếp theo</option>

                    <option>Email</option>
                    <option>Họ tên</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Tìm theo</option>
                    <option>Họ tên</option>
                    <option>Email</option>
                </select>
            </div>
            
            <div class="col-md-2">
                <button type="button" class="btn-product w-75 mb-2 justify-content-md-end" data-bs-toggle="modal" data-bs-target="#addproduct"><i class="fas fa-plus me-2"></i>Thêm</button>
            </div>


            <div class="modal fade" id="addproduct" tabindex="-1" aria-labelledby="namemodal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="namemodal">Thêm người dùng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="tsp" class="form-label">Tên người dùng</label>
                                <input type="text" class="form-control" id="tsp">
                            </div>
                            <div class="mb-2">
                                <label for="user" class="form-label">Username</label>
                                <input type="text" class="form-control" id="tsp">
                            </div>
                            <div class="mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="money">
                            </div>
                            <div class="mb-2">
                                <label for="img" class="form-label">Password</label>
                                <input type="file" class="form-control" id="img">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn-forgot" data-bs-dismiss="modal">Hủy</button>
                            <button type="button" class="btn-product" id="add">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-3">
            <table class="table table-hover rounded text-center">
                <thead>
                    <th>
                        ID
                    </th>
                    <th>
                        Họ tên
                    </th>
                    <th>
                        Email
                    </th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Thao tác</th>
                    <th></th>
                </thead>
                <tbody class="user-table">
                    <?php 
                        foreach($users as $user){
                            echo '<tr class="align-middle">
                            <td>'.$user['ma_kh'].'</td>
                            <td>'.$user['hoten'].'</td>
                            <td>'.$user['email'].'</td>
                            <td>'.$user['username'].'</td>
                            <td>'.$user['password'].'</td>
                            <td><a href="#"><i class="fas fa-edit text-dark"></i></a></td>
                            <td><a href="#">
                                    <div class="btn btn-close" aria-label="Close"></div>
                                </a></td>
                        </tr>';
                        }
                    ?>
                    
                </tbody>

            </table>
        </div>
    </div>
</div>

<?php $this->stop(); ?>