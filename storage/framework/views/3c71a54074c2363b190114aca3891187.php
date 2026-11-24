
<head>
    <title><?php echo e(env('APP_NAME', 'REPAL MOVIE')); ?></title>

    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="<?php echo e(env('APP_NAME', 'REPAL MOVIE')); ?>" />

    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- CSS -->
    <link href="<?php echo e(asset('template/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo e(asset('template/css/style.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo e(asset('template/css/medile.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('template/css/single.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('template/css/contactstyle.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo e(asset('template/css/faqstyle.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo e(asset('template/css/font-awesome.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('template/css/news.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo e(asset('template/list-css/list.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo e(asset('template/css/owl.carousel.css')); ?>" rel="stylesheet" type="text/css" media="all" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="<?php echo e(asset('template/js/jquery-2.1.4.min.js')); ?>"></script>

    <!-- JavaScript -->
    <script src="<?php echo e(asset('template/js/move-top.js')); ?>"></script>
    <script src="<?php echo e(asset('template/js/easing.js')); ?>"></script>
    <script src="<?php echo e(asset('template/js/owl.carousel.js')); ?>"></script>

    <!-- Smooth Scrolling -->
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>

    <!-- Owl Carousel -->
    <script>
        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                autoPlay: 3000,
                items: 5,
                itemsDesktop: [640, 5],
                itemsDesktopSmall: [414, 4]
            });
        });
    </script>

    <!-- Custom CSS -->
    <?php echo $__env->yieldPushContent('style'); ?>
</head>
<?php /**PATH C:\Users\ASUS\laravel-kelas-xii - Copy\resources\views/templates/component/head.blade.php ENDPATH**/ ?>