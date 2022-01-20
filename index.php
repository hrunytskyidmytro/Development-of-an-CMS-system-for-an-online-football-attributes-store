<?php
include('config/config.php');
include('core/Core.php');

$core = \core\Core::getInstance();
$core ->init();
$core ->run();
$core ->done();


?>








<!--<!DOCTYPE html>-->
<!--<html lang="en" class="no-js">-->
<!--<head>-->
<!--    <meta charset="utf-8"/>-->
<!--    <title>FootballFan.Shop - футбольний магазин</title>-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta content="width=device-width, initial-scale=1" name="viewport"/>-->
<!--    <meta content="" name="description"/>-->
<!--    <meta content="" name="author"/>-->
<!---->
<!--     GLOBAL MANDATORY STYLES-->
<!--    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">-->
<!--    <link href="vendor/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>-->
<!--    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
<!---->
<!--     PAGE LEVEL PLUGIN STYLES-->
<!--    <link href="css/animate.css" rel="stylesheet">-->
<!--    <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>-->
<!---->
<!--     THEME STYLES-->
<!--    <link href="css/layout.min.css" rel="stylesheet" type="text/css"/>-->
<!---->
<!--     Favicon-->
<!--    <link rel="shortcut icon" href="favicon.ico"/>-->
<!--</head>-->
<!---->
<!--<body>-->
<!--<header class="header navbar-fixed-top">-->
<!--    <nav class="navbar" role="navigation">-->
<!--        <div class="container">-->
<!--             Brand and toggle get grouped for better mobile display-->
<!--            <div class="menu-container">-->
<!--                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">-->
<!--                    <span class="sr-only">Toggle navigation</span>-->
<!--                    <span class="toggle-icon"></span>-->
<!--                </button>-->
<!---->
<!--                Logo-->
<!--                <div class="logo">-->
<!--                    <a class="logo-wrap" href="index.php">-->
<!--                        <img class="logo-img logo-img-main" src="img/Log.png" alt="FootballFan.Shop Logo">-->
<!--                        <img class="logo-img logo-img-active" src="img/Log-dark.png" alt="FootballFan.Shop Logo">-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--             Collect the nav links, forms, and other content for toggling-->
<!--            <div class="collapse navbar-collapse nav-collapse">-->
<!--                <div class="menu-container">-->
<!--                    <ul class="navbar-nav navbar-nav-right">-->
<!--                        <li class="nav-item"><a class="nav-item-child nav-item-hover active" href="index.php">Головна сторінка</a></li>-->
<!--                        <li class="nav-item"><a class="nav-item-child nav-item-hover" href="football_shoes.php">Футбольне взуття</a></li>-->
<!--                        <li class="nav-item"><a class="nav-item-child nav-item-hover" href="kids_football_shoes.php">Дитяче взуття</a></li>-->
<!--                        <li class="nav-item"><a class="nav-item-child nav-item-hover" href="clothing.php">Одяг</a></li>-->
<!--                        <li class="nav-item"><a class="nav-item-child nav-item-hover" href="accessories.php">Аксесуари</a></li>-->
<!--                        <li class="nav-item"><a class="nav-item-child nav-item-hover" href="about_us.php">Про нас</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </nav>-->
<!--</header>-->


<!--========== SLIDER ==========-->
<!--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">-->
<!--    <div class="container">-->
<!--         Indicators -->
<!--        <ol class="carousel-indicators">-->
<!--            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>-->
<!--            <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
<!--            <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
<!--        </ol>-->
<!--    </div>-->
<!---->
<!--     Wrapper for slides -->
<!--    <div class="carousel-inner" role="listbox">-->
<!--        <div class="item active">-->
<!--            <img class="img-responsive" src="img/1920x1080/001.jpg" alt="Slider Image">-->
<!--            <div class="container">-->
<!--                <div class="carousel-centered">-->
<!--                    <div class="margin-b-40">-->
<!--                        <h1 class="carousel-title">Nike Motivation Pack</h1>-->
<!--                        <p>Lorem ipsum dolor amet consectetur adipiscing dolore magna aliqua <br/> enim minim estudiat veniam siad venumus dolore</p>-->
<!--                    </div>-->
<!--                    <a href="#" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">Перейти</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="item">-->
<!--            <img class="img-responsive" src="img/1920x1080/002.jpg" alt="Slider Image">-->
<!--            <div class="container">-->
<!--                <div class="carousel-centered">-->
<!--                    <div class="margin-b-40">-->
<!--                       <h2 class="carousel-title">Hi-Tech Design</h2>-->
<!--                        <p>Lorem ipsum dolor amet consectetur adipiscing dolore magna aliqua <br/> enim minim estudiat veniam siad venumus dolore</p>-->
<!--                    </div>-->
<!--                  <a href="#" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">Explore</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="item">-->
<!--            <img class="img-responsive" src="img/1920x1080/003.jpg" alt="Slider Image">-->
<!--            <div class="container">-->
<!--                <div class="carousel-centered">-->
<!--                    <div class="margin-b-40">-->
<!--                        <h2 class="carousel-title">Hi-Tech Design</h2>-->
<!--                       <p>Lorem ipsum dolor amet consectetur adipiscing dolore magna aliqua <br/> enim minim estudiat veniam siad venumus dolore</p>-->
<!--                    </div>-->
<!--                    <a href="#" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">Explore</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--========== SLIDER ==========-->
<!---->
<!--========== PAGE LAYOUT ==========-->
<!-- Service -->
<!--<div class="bg-color-sky-light" data-auto-height="true">-->
<!--    <div class="content-lg container">-->
<!--        <div class="row row-space-1 margin-b-2">-->
<!--            <div class="col-sm-4 sm-margin-b-2">-->
<!--                <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">-->
<!--                    <div class="service" data-height="height">-->
<!--                        <div class="service-element">-->
<!--                            <i class="service-icon icon-chemistry"></i>-->
<!--                        </div>-->
<!--                        <div class="service-info">-->
<!--                            <h3>Art Of Coding</h3>-->
<!--                            <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>-->
<!--                        </div>-->
<!--                        <a href="#" class="content-wrapper-link"></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-4 sm-margin-b-2">-->
<!--                <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".2s">-->
<!--                    <div class="service" data-height="height">-->
<!--                        <div class="service-element">-->
<!--                            <i class="service-icon icon-screen-tablet"></i>-->
<!--                        </div>-->
<!--                        <div class="service-info">-->
<!--                            <h3>Responsive Design</h3>-->
<!--                            <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>-->
<!--                        </div>-->
<!--                        <a href="#" class="content-wrapper-link"></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-4">-->
<!--                <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">-->
<!--                    <div class="service" data-height="height">-->
<!--                        <div class="service-element">-->
<!--                            <i class="service-icon icon-badge"></i>-->
<!--                        </div>-->
<!--                        <div class="service-info">-->
<!--                            <h3>Feature Reach</h3>-->
<!--                            <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>-->
<!--                        </div>-->
<!--                        <a href="#" class="content-wrapper-link"></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        // end row -->
<!---->
<!--        <div class="row row-space-1">-->
<!--            <div class="col-sm-4 sm-margin-b-2">-->
<!--                <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".4s">-->
<!--                    <div class="service" data-height="height">-->
<!--                        <div class="service-element">-->
<!--                            <i class="service-icon icon-notebook"></i>-->
<!--                        </div>-->
<!--                        <div class="service-info">-->
<!--                            <h3>Useful Documentation</h3>-->
<!--                            <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>-->
<!--                        </div>-->
<!--                        <a href="#" class="content-wrapper-link"></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-4 sm-margin-b-2">-->
<!--                <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".5s">-->
<!--                    <div class="service" data-height="height">-->
<!--                        <div class="service-element">-->
<!--                            <i class="service-icon icon-speedometer"></i>-->
<!--                        </div>-->
<!--                        <div class="service-info">-->
<!--                            <h3>Fast Delivery</h3>-->
<!--                            <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>-->
<!--                        </div>-->
<!--                        <a href="#" class="content-wrapper-link"></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-4">-->
<!--                <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".6s">-->
<!--                    <div class="service" data-height="height">-->
<!--                        <div class="service-element">-->
<!--                            <i class="service-icon icon-badge"></i>-->
<!--                        </div>-->
<!--                        <div class="service-info">-->
<!--                            <h3>Free Plugins</h3>-->
<!--                            <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>-->
<!--                        </div>-->
<!--                        <a href="#" class="content-wrapper-link"></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        // end row -->
<!--    </div>-->
<!--</div>-->
<!-- End Service -->
<!---->
<!-- Latest Products -->
<!--<div class="content-lg container">-->
<!--    <div class="row margin-b-40">-->
<!--        <div class="col-sm-6">-->
<!--            <h2>Latest Products</h2>-->
<!--            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incididunt ut laboret dolore magna aliqua enim minim veniam exercitation</p>-->
<!--        </div>-->
<!--    </div>-->
<!--    // end row -->
<!---->
<!--    <div class="row">-->
<!--         Latest Products -->
<!--        <div class="col-sm-4 sm-margin-b-50">-->
<!--            <div class="margin-b-20">-->
<!--                <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">-->
<!--                    <img class="img-responsive" src="img/970x647/01.jpg" alt="Latest Products Image">-->
<!--                </div>-->
<!--            </div>-->
<!--            <h4><a href="#">Triangle Roof</a> <span class="text-uppercase margin-l-20">Management</span></h4>-->
<!--            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>-->
<!--            <a class="link" href="#">Read More</a>-->
<!--        </div>-->
<!--         End Latest Products -->
<!---->
<!--         Latest Products -->
<!--        <div class="col-sm-4 sm-margin-b-50">-->
<!--            <div class="margin-b-20">-->
<!--                <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">-->
<!--                    <img class="img-responsive" src="img/970x647/02.jpg" alt="Latest Products Image">-->
<!--                </div>-->
<!--            </div>-->
<!--            <h4><a href="#">Curved Corners</a> <span class="text-uppercase margin-l-20">Developmeny</span></h4>-->
<!--            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>-->
<!--            <a class="link" href="#">Read More</a>-->
<!--        </div>-->
<!--         End Latest Products -->
<!---->
<!--         Latest Products -->
<!--        <div class="col-sm-4 sm-margin-b-50">-->
<!--            <div class="margin-b-20">-->
<!--                <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">-->
<!--                    <img class="img-responsive" src="img/970x647/03.jpg" alt="Latest Products Image">-->
<!--                </div>-->
<!--            </div>-->
<!--            <h4><a href="#">Bird On Green</a> <span class="text-uppercase margin-l-20">Design</span></h4>-->
<!--            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>-->
<!--            <a class="link" href="#">Read More</a>-->
<!--        </div>-->
<!--         End Latest Products -->
<!--    </div>-->
<!--    // end row -->
<!--</div>-->
<!-- End Latest Products -->
<!---->
<!-- Clients -->
<!--<div class="bg-color-sky-light">-->
<!--    <div class="content-lg container">-->
<!--         Swiper Clients -->
<!--        <div class="swiper-slider swiper-clients">-->
<!--             Swiper Wrapper -->
<!--            <div class="swiper-wrapper">-->
<!--                <div class="swiper-slide">-->
<!--                    <img class="swiper-clients-img" src="img/clients/puma.jpg" alt="Clients Logo">-->
<!--                </div>-->
<!--                <div class="swiper-slide">-->
<!--                    <img class="swiper-clients-img" src="img/clients/adidas.jpg" alt="Clients Logo">-->
<!--                </div>-->
<!--                <div class="swiper-slide">-->
<!--                    <img class="swiper-clients-img" src="img/clients/nike.png" alt="Clients Logo">-->
<!--                </div>-->
<!--                <div class="swiper-slide">-->
<!--                    <img class="swiper-clients-img" src="img/clients/new%20balance.png" alt="Clients Logo">-->
<!--                </div>-->
<!--                <div class="swiper-slide">-->
<!--                    <img class="swiper-clients-img" src="img/clients/reebok.png" alt="Clients Logo">-->
<!--                </div>-->
<!--               <div class="swiper-slide">-->
<!--                    <img class="swiper-clients-img" src="img/clients/06.png" alt="Clients Logo">-->
<!--                </div>-->
<!--            </div>-->
<!--             End Swiper Wrapper -->
<!--        </div>-->
<!--         End Swiper Clients -->
<!--    </div>-->
<!--</div>-->
<!-- End Clients -->
<!---->
<!-- Testimonials -->
<!--<div class="content-lg container">-->
<!--    <div class="row">-->
<!--        <div class="col-sm-9">-->
<!--            <h2>Customer Reviews</h2>-->
<!---->
<!--             Swiper Testimonials -->
<!--            <div class="swiper-slider swiper-testimonials">-->
<!--                 Swiper Wrapper -->
<!--                <div class="swiper-wrapper">-->
<!--                    <div class="swiper-slide">-->
<!--                        <blockquote class="blockquote">-->
<!--                            <div class="margin-b-20">-->
<!--                                Заняття спортом зараз набувають небувалої популярності, і футбол тому не виняток. Ця командна гра підкорила багатьох та має мільйони фанатів у всьому світі. Хтось захищає честь збірної чи футбольного клубу, хтось грає на своє задоволення. Але для результативної та ефектної гри необхідно почуватися комфортно, а допоможе в цьому Інтернет-магазин футбольної атрибутики!-->
<!--                            </div>-->
<!--                            <div class="margin-b-20">-->
<!--                                Не варто недооцінювати себе і недбало ставитися до спортивної форми чи взуття: футбольне екіпірування може відіграти вирішальну роль у відповідальний момент. Як колись влучно висловився великий футболіст Валерій Васильович Лобановський: «Футбол – це, перш за все, творчий процес». Як будь-який іменитий художник відомий своїм мазком пензля, екіпірування та аксесуари підкреслюють індивідуальність кожного гравця, який творить гру.-->
<!--                            </div>-->
<!--                            <p><span class="fweight-700 color-link">Дмитро Груницький</span>, студент державного університету "Житомирська політехніка"</p>-->
<!--                        </blockquote>-->
<!--                    </div>-->
<!---->
<!--                    <div class="swiper-slide">-->
<!--                        <blockquote class="blockquote">-->
<!--                            <div class="margin-b-20">-->
<!--                                Футбольний Інтернет-магазин має лише найякісніший товар за демократичними цінами від брендів, що зарекомендували себе в спортивній індустрії. Ми цінуємо кожного клієнта, тому будь-хто має можливість поставити запитання, висловити свою думку та ознайомитися з думками інших. Багатство асортименту не зможе не порадувати навіть найвибагливіших: у наявності футбольна форма та взуття, воротарське екіпірування, м'ячі та обладнання, аксесуари та термобілизна – перед вами відкривається чудовий футбольний світ.-->
<!--                            </div>-->
<!--                            <div class="margin-b-20">-->
<!--                                Зручний інтерфейс, сортування за заданими параметрами, докладна характеристика кожного товару дозволить купити футбольне екіпірування за запитами, буквально в один клік миші, не виходячи з дому. Ви не тільки економите час і нерви на пошуки, але й гарантовано отримуєте тільки найкраще.-->
<!--                            </div>-->
<!--                            <div class="margin-b-20">-->
<!--                                Любіть футбол, реєструйтесь, шукайте те, що потрібно, купуйте, відчуйте себе справжнім футболістом, перемагайте та насолоджуйтесь грою!-->
<!--                            </div>-->
<!--                          <p><span class="fweight-700 color-link">Любіть футбол</span>, реєструйтесь, шукайте те, що потрібно, купуйте, відчуйте себе справжнім футболістом, перемагайте та насолоджуйтесь грою!</p>-->
<!--                        </blockquote>-->
<!--                    </div>-->
<!--                </div>-->
<!--              End Swiper Wrapper -->
<!---->
<!--                 Pagination -->
<!--                <div class="swiper-testimonials-pagination"></div>-->
<!--            </div>-->
<!--            End Swiper Testimonials -->
<!--        </div>-->
<!--    </div>-->
<!--   // end row -->
<!--</div>-->
<!-- End Testimonials -->
<!---->
<!---->
<!---->
<!---->
<!---->
<!-- Work -->
<!--<div class="bg-color-sky-light overflow-h">-->
<!--    <div class="content-lg container">-->
<!--        <div class="row margin-b-40">-->
<!--            <div class="col-sm-6">-->
<!--                <h2>Категорія товарів</h2>-->
<!--               <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incididunt ut laboret dolore magna aliqua enim minim veniam exercitation</p>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!---->
<!--         Masonry Grid -->
<!--        <div class="masonry-grid">-->
<!--            <div class="masonry-grid-sizer col-xs-6 col-sm-6 col-md-1"></div>-->
<!--            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-8">-->
<!--                <div class="work wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">-->
<!--                    <div class="work-overlay">-->
<!--                        <img class="full-width img-responsive" src="img/800x400/001.jpg" alt="Portfolio Image">-->
<!--                    </div>-->
<!--                    <div class="work-content">-->
<!--                        <h3 class="color-white margin-b-5">Футбольні м'ячі Nike</h3>-->
<!--                       <p class="color-white margin-b-0">Lorem ipsum dolor sit amet consectetur adipiscing</p>-->
<!--                    </div>-->
<!--                    <a class="content-wrapper-link" href="accessories.php"></a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div class="masonry-grid-item col-xs-6 col-sm-6 col-md-4">-->
<!--                <div class="work wow fadeInUp" data-wow-duration=".3" data-wow-delay=".2s">-->
<!--                    <div class="work-overlay">-->
<!--                        <img class="full-width img-responsive" src="img/397x400/001.png" alt="Portfolio Image">-->
<!--                    </div>-->
<!--                    <div class="work-content">-->
<!--                        <h3 class="color-white margin-b-5">Для дітей</h3>-->
<!--                       <p class="color-white margin-b-0">Lorem ipsum dolor sit amet consectetur adipiscing</p>-->
<!--                    </div>-->
<!--                    <a class="content-wrapper-link" href="kids_football_shoes.php"></a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div class="masonry-grid-item col-xs-6 col-sm-6 col-md-4">-->
<!--                <div class="work wow fadeInUp" data-wow-duration=".3" data-wow-delay=".3s">-->
<!--                    <div class="work-overlay">-->
<!--                        <img class="full-width img-responsive" src="img/397x300/001.png" alt="Portfolio Image">-->
<!--                    </div>-->
<!--                    <div class="work-content">-->
<!--                        <h3 class="color-white margin-b-5">Бутси Adidas Elite</h3>-->
<!--                       <p class="color-white margin-b-0">Lorem ipsum dolor sit amet consectetur adipiscing</p>-->
<!--                    </div>-->
<!--                    <a class="content-wrapper-link" href="#"></a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div class="masonry-grid-item col-xs-6 col-sm-6 col-md-4">-->
<!--                <div class="work wow fadeInUp" data-wow-duration=".3" data-wow-delay=".5s">-->
<!--                    <div class="work-overlay">-->
<!--                        <img class="full-width img-responsive" src="img/397x300/002.png" alt="Portfolio Image">-->
<!--                    </div>-->
<!--                    <div class="work-content">-->
<!--                        <h3 class="color-white margin-b-5">Футзалки</h3>-->
<!--                        <p class="color-white margin-b-0">Lorem ipsum dolor sit amet consectetur adipiscing</p>-->
<!--                    </div>-->
<!--                    <a class="content-wrapper-link" href="football_shoes.php"></a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div class="masonry-grid-item col-xs-6 col-sm-6 col-md-4">-->
<!--                <div class="work wow fadeInUp" data-wow-duration=".3" data-wow-delay=".4s">-->
<!--                    <div class="work-overlay">-->
<!--                        <img class="full-width img-responsive" src="img/397x300/003.png" alt="Portfolio Image">-->
<!--                    </div>-->
<!--                    <div class="work-content">-->
<!--                        <h3 class="color-white margin-b-5">Бутси Nike Elite</h3>-->
<!--                                                <p class="color-white margin-b-0">Lorem ipsum dolor sit amet consectetur adipiscing</p>-->
<!--                    </div>-->
<!--                    <a class="content-wrapper-link" href="#"></a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div class="masonry-grid-item col-xs-6 col-sm-6 col-md-4">-->
<!--                <div class="work wow fadeInUp" data-wow-duration=".3" data-wow-delay=".2s">-->
<!--                    <div class="work-overlay">-->
<!--                        <img class="full-width img-responsive" src="img/397x400/002.png" alt="Portfolio Image">-->
<!--                    </div>-->
<!--                    <div class="work-content">-->
<!--                        <h3 class="color-white margin-b-5">Футбольні м'ячі Adidas</h3>-->
<!--                                               <p class="color-white margin-b-0">Lorem ipsum dolor sit amet consectetur adipiscing</p>-->
<!--                    </div>-->
<!--                    <a class="content-wrapper-link" href="accessories.php"></a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div class="masonry-grid-item col-xs-12 col-sm-6 col-md-8">-->
<!--                <div class="work wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">-->
<!--                    <div class="work-overlay">-->
<!--                        <img class="full-width img-responsive" src="img/800x400/002.png" alt="Portfolio Image">-->
<!--                    </div>-->
<!--                    <div class="work-content">-->
<!--                        <h3 class="color-white margin-b-5">Для воротарів</h3>-->
<!--                                                <p class="color-white margin-b-0">Lorem ipsum dolor sit amet consectetur adipiscing</p>-->
<!--                    </div>-->
<!--                    <a class="content-wrapper-link" href="accessories.php"></a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- End Work -->
<!---->
<!--========== FOOTER ==========-->
<!--<footer class="footer">-->
<!--    Links -->
<!--    <div class="footer-seperator">-->
<!--        <div class="content-lg container">-->
<!--            <div class="row">-->
<!--                <div class="col-sm-2 sm-margin-b-50">-->
<!--                    <ul class="list-unstyled footer-list">-->
<!--                        <li class="footer-list-item"><a class="footer-list-link" href="#">Головна сторінка</a></li>-->
<!--                        <li class="footer-list-item"><a class="footer-list-link" href="#">Футбольне взуття</a></li>-->
<!--                        <li class="footer-list-item"><a class="footer-list-link" href="#">Дитяче взуття</a></li>-->
<!--                        <li class="footer-list-item"><a class="footer-list-link" href="#">Одяг</a></li>-->
<!--                        <li class="footer-list-item"><a class="footer-list-link" href="#">Аксесуари</a></li>-->
<!--                        <li class="footer-list-item"><a class="footer-list-link" href="#">Про нас</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="col-sm-4 sm-margin-b-30">-->
<!--                     List -->
<!--                    <ul class="list-unstyled footer-list">-->
<!--                        <li class="footer-list-item"><a class="footer-list-link" href="#">Twitter</a></li>-->
<!--                        <li class="footer-list-item"><a class="footer-list-link" href="#">Facebook</a></li>-->
<!--                        <li class="footer-list-item"><a class="footer-list-link" href="#">Instagram</a></li>-->
<!--                        <li class="footer-list-item"><a class="footer-list-link" href="#">YouTube</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="col-sm-5 sm-margin-b-30">-->
<!--                    <h2 class="color-white">Логін / Реєстрація</h2>-->
<!--                    <input type="text" class="form-control footer-input margin-b-20" placeholder="Ім'я користувача" required>-->
<!--                    <input type="email" class="form-control footer-input margin-b-20" placeholder="Email" required>-->
<!--                    <input type="password" class="form-control footer-input margin-b-20" placeholder="Пароль" required>-->
<!--                    <button type="submit" class="btn-theme btn-theme-sm btn-base-bg text-uppercase">Увійти</button>-->
<!--                    <button type="submit" class="btn-theme btn-theme-sm btn-base-bg text-uppercase">Зареєструватися</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--     Copyright -->
<!--    <div class="content container">-->
<!--        <div class="row">-->
<!--            <div class="col-xs-6">-->
<!--                <img class="footer-logo" src="img/Log-dark.png" alt="FootballFan.Shop Logo">-->
<!--            </div>-->
<!--            <div class="col-xs-6 text-right">-->
<!--                <p class="margin-b-0"><a class="color-base fweight-700" href="http://keenthemes.com/preview/asentus/">FootballFan.Shop</a> Theme Powered by: <a class="color-base fweight-700" href="http://www.keenthemes.com/">KeenThemes.com</a></p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</footer>-->
<!--========== END FOOTER ==========-->
<!---->
<!---->
<!---->
<!-- Back To Top -->
<!--<a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>-->
<!---->
<!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!--CORE PLUGINS -->
<!--<script src="vendor/jquery.min.js" type="text/javascript"></script>-->
<!--<script src="vendor/jquery-migrate.min.js" type="text/javascript"></script>-->
<!--<script src="vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
<!---->
<!-- PAGE LEVEL PLUGINS -->
<!--<script src="vendor/jquery.easing.js" type="text/javascript"></script>-->
<!--<script src="vendor/jquery.back-to-top.js" type="text/javascript"></script>-->
<!--<script src="vendor/jquery.smooth-scroll.js" type="text/javascript"></script>-->
<!--<script src="vendor/jquery.wow.min.js" type="text/javascript"></script>-->
<!--<script src="vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>-->
<!--<script src="vendor/masonry/jquery.masonry.pkgd.min.js" type="text/javascript"></script>-->
<!--<script src="vendor/masonry/imagesloaded.pkgd.min.js" type="text/javascript"></script>-->
<!---->
<!-- PAGE LEVEL SCRIPTS -->
<!--<script src="js/layout.min.js" type="text/javascript"></script>-->
<!--<script src="js/components/wow.min.js" type="text/javascript"></script>-->
<!--<script src="js/components/swiper.min.js" type="text/javascript"></script>-->
<!--<script src="js/components/masonry.min.js" type="text/javascript"></script>-->
<!---->
<!--</body>-->
<!--</html>-->



