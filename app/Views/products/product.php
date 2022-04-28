<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page'); ?>
<main class="container-fluid">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 mt-2">
            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-secondary">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-3 pt-3 text-center menu">
            <ul class="list-group position-sticky" style="top: 12%; z-index: 1000;">
                <li class="p-2 title-list-group text-title border-0 justify-content-between align-items-center ">
                    <h3 class="">Menu</h3>
                </li>
                <?php
                foreach ($typeProduct as $type) {
                    echo '<a href="/product?malsp=' . $type['ma_lsp'] . '" class="text-decoration-none">
                            <li
                                class="list-group-item p-3 d-flex border-0 border-bottom justify-content-between align-items-center">
                                <span>' . $type['ten_lsp'] . '</span> 
                                <span class="badge text-menu rounded-pill">';
                                if($type['ma_lsp']=='L01') echo $male;else echo $female;
                                echo '</span>
                            </li>
                        </a>';
                }
                ?>

            </ul>
        </div>
        <div class="col-9">
            <div class="pt-3">
                <div class="row row-cols-md-3 row-cols-sm-2 row-cols-1">
                    <?php
                    foreach ($products as $product) {
                        echo '<div class="col-sm">
                                <a href="/productDetail?masp=' . $product->ma_sp . '" class="text-decoration-none text-dark">
                                    <div class="card">
                                        <img src="assets/images/';
                        if ($product->ma_lsp == 'L01') echo 'Male/' . $product->image;
                        else echo 'Female/' . $product->image;
                        echo '" class="img-fluid card-img-top " alt="">
                                        <div class="card-body text-center">
                                            <h6 class="card-text">' . $product->ten_sp . '</h6>
                                            <p>' . $product->gia_sp . '$</p>
                                            <a href = "/addCart?masp=' . $product->ma_sp . '"><button class="btn-product w-50">Add Cart</button></a>
                                        </div>
                                    </div>
                                </a>
                            </div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->stop();?>
