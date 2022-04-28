<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/Style.css">
    <link rel="stylesheet" href="assets/css/Signin.css">
    <title><?= config('app.APP_NAME') ?></title>
</head>

<body>
    <!-- Header section -->
    <?= $this->insert('layouts/header'); ?>

    <!-- Content section -->
    <?= $this->section('page') ?>
    <div class="position-fixed" style="bottom:50px;right:50px;z-index:1000;">
        <i class="fas fa-chevron-circle-up fs-2" style="color:#FFD07F;" id="on-top"></i>
    </div>
    <!-- Footer section -->
    <?= $this->insert('layouts/footer'); ?>
</body>
<script>
    $(document).ready(function() {
        $('#on-top').hide();
        $(window).scroll(function() {
            if ($(window).scrollTop() < 200)
                $('#on-top').hide();
            else $('#on-top').show();
        })
        $('#on-top').click(function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        })
    })
</script>

</html>