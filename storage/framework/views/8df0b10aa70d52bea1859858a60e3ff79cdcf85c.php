<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <link href=" <?php echo e(asset('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap')); ?> " rel="stylesheet">
    <link href=" <?php echo e(asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css')); ?>" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href=" <?php echo e(asset('https://use.fontawesome.com/releases/v5.12.0/css/all.css')); ?>">
    <link rel="stylesheet" href=" <?php echo e(asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href=" <?php echo e(asset('fonts/fontawesome5-overrides.min.css')); ?>">
    <link rel="stylesheet" href=" <?php echo e(asset('https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css')); ?>" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href=" <?php echo e(asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')); ?> ">
    <link rel="stylesheet" href=" <?php echo e(asset('https://use.fontawesome.com/releases/v5.12.0/css/all.css')); ?>">
    <link href=" <?php echo e(asset('css/styles.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href=" <?php echo e(asset('https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css')); ?>">

    <link href = <?php echo e(asset("css/bootstrap.css")); ?> rel="stylesheet" />
    <link href = <?php echo e(asset("css/bootstrap.min.css")); ?> rel="stylesheet" />

    <script src= " <?php echo e(asset('https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js')); ?>"></script>
    <script src=" <?php echo e(asset('https://code.jquery.com/jquery-3.6.0.js')); ?>"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>

    <link href= " <?php echo e(asset('asset/toastr.css')); ?>" rel="stylesheet"/>
    <script src = " <?php echo e(asset('asset/toastr.js')); ?>"></script>
    <script src="js/script.js"></script>
    <style>

        body {
            font-family: 'Nunito', sans-serif;
        }
        .my-custom-scrollbar {
            position: relative;
            height: 700px;
            overflow: auto;
        }
        .table-wrapper-scroll-y {
            display: block;
        }

        <?php echo $__env->yieldContent('style'); ?>
    </style>
</head>



<body class="sb-nav-fixed">
<div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-dark p-0">
        <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-text mx-3"><span>Firma İsmi</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('products')); ?>"><i class="fas fa-shopping-bag"></i><span>Ürünler</span></a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('orders')); ?>"><i class="fas fa-clipboard-list"></i><span>Siparişler</span></a></li>
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#"><i class="fas fa-sliders-h"></i><span>Ayarlar</span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="nav-link" style="color: #686868" href="<?php echo e(route('settings')); ?>"><i style="color: #686868" class="fas fa-clipboard-list"></i><span>Siparişler</span></a>
                        </li>
                        <li>
                            <a class="nav-link" style="color: #686868" href="<?php echo e(route('settings')); ?>"><i style="color: #686868" class="fas fa-clipboard-list"></i><span></span></a>
                        </li>
                        <li>
                            <a class="nav-link" style="color: #686868" href="<?php echo e(route('api')); ?>"><i style="color: #686868" class="fas fa-cogs"></i><span>API- Entegrasyon</span></a>
                        </li>
                        <li>
                            <a class="nav-link" style="color: #686868" href="<?php echo e(route('updates')); ?>"><i style="color: #686868" class="fas fa-cloud-download-alt"></i><span>Güncelleme Servisi</span></a>
                        </li>

                    </ul>

                </li>
            </ul>
            <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        </div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-dark shadow mb-4 topbar static-top">
                <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <ul class="navbar-nav flex-nowrap ms-auto">
                        <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                            <div class="nav-item dropdown no-arrow">
                                <div class="nav-link">
                                    <i id="network" class="fas fa-network-wired" style="color: limegreen"></i>
                                </div>
                            </div>
                        </li>

                        <div class="d-none d-sm-block topbar-divider"></div>

                        <li class="nav-item dropdown no-arrow">
                            <div class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="d-none d-lg-inline me-2 text-gray-600 small">Hasan ALTINKARA</span><img class="border rounded-circle img-profile" src=""></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profilim</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Ayarlar</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="{{}}"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Çıkış</a>
                                </div>
                            </div>

                        </li>
                    </ul>
                </div>

            </nav>

            <div class="container-fluid my-5">
                <div id="app">
                </div>
                    <?php echo $__env->yieldContent('content'); ?>
                    <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000" style="position: absolute; top: 5rem; right: 1rem; min-width: 500px;">
                        <div class="toast-header">
                            <strong class="mr-auto">Bildirimler</strong>
                        </div>
                        <div class="toast-body" id="message"></div>
                    </div>
                </div>
            </div>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; <a href="/"></a> 2021 Firma İsmi</div>
                    </div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!--https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="js/script.min.js"></script>
<script>



</script>
<?php echo $__env->yieldContent('script'); ?>

</body>
</html>
<?php /**PATH C:\laravel\pazaryeri\pazaryeri\resources\views/themes/master.blade.php ENDPATH**/ ?>