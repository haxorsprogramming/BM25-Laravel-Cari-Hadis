<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Aplikasi pencarian hadis metode BM25 - Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/izitoast/css/iziToast.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/datatables/datatables.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/css/style.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/css/components.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="#!" style="height:30px;">
                            <img src="{{ asset('ladun/img/uinsu.png') }}" style="width: 50px;">
                        </a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="#!">HS</a>
                    </div>
                    <ul class="sidebar-menu">

                        <li class="menu-header">Menu</li>
                        <li><a class="nav-link" @click="dashboardAtc" href="#!"><i class="fas fa-newspaper"></i> <span>Dashboard</span></a></li>
                        <li><a class="nav-link" href="#!"><i class="fas fa-newspaper"></i> <span>Cari Hadis (Kata)</span></a></li>
                        <li><a class="nav-link" href="#!"><i class="fas fa-newspaper"></i> <span>Cari Hadis (Status)</span></a></li>

                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div style="text-align: center;">
                    <img src="{{ asset('ladun/img/uinsu.png') }}" style="width: 100px;">
                        <h3 id="capUtama">Aplikasi pencarian hadis dengan metode BM25</h3>
                    </div>
                    <div id="divUtama">

                    </div>
                </section>

            </div>
        </div>

        <footer class="main-footer"> Develop By Riska Junainah</footer>
        <!-- General JS Scripts -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/popper.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/moment.min.js"></script>
    <script src="https://demo.getstisla.com/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- <script src="https://demo.getstisla.com/asset/modules/jquery.simpleWeather.min.js"></script> -->
    <!-- <script src="https://demo.getstisla.com/asset/modules/Chart.min.js"></script> -->
    <!-- <script src="https://demo.getstisla.com/asset/modules/jquery.vmap.min.js"></script> -->
    <!-- <script src="https://demo.getstisla.com/asset/maps/jquery.vmap.world.js"></script> -->
    <!-- <script src="https://demo.getstisla.com/assets/modules/summernote/summernote-bs4.js"></script> -->
    <!-- <script src="https://demo.getstisla.com/asset/modules/jquery.chocolat.min.js"></script> -->
    <script src="https://demo.getstisla.com/assets/modules/datatables/datatables.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/izitoast/js/iziToast.min.js"></script>

    <!-- Template JS File -->
    <script src="https://demo.getstisla.com/assets/js/scripts.js"></script>

    <!-- Page Specific JS File -->
    <!-- <script src="https://demo.getstisla.com/assets/js/page/index.js"></script> -->
    <script>
        const server = "{{ url('') }}/";
    </script>
    <script src="{{ asset('ladun/js/main.js') }}"></script>
</body>

</html>