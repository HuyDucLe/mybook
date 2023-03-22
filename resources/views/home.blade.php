@extends('templates.default')

@section('css')
<link rel="stylesheet" href="{{asset('')}}public/css/home.css">
@endsection

@section('content')
<!-- banner slider -->
<section class="header bg-light">
    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col-md-12 px-0">
                <div id="carouselId" class="carousel slide" data-ride="carousel">
                    <ol class="nutcarousel carousel-indicators rounded-circle">
                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>
                        <li data-target="#carouselId" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="#">
                                <img src="{{asset('')}}public/images/banner-sach-moi.jpg" class="img-fluid" style="height: 386px;" width="100%" alt="First slide">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="#">
                                <img src="{{asset('')}}public/images/banner-beethoven.jpg" class="img-fluid" style="height: 386px;" width="100%" alt="Second slide">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="#">
                                <img src="{{asset('')}}public/images/neu-toi-biet-duoc-khi-20-full-banner.jpg" class="img-fluid" style="height: 386px;" alt="Third slide">
                            </a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselId" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselId" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- khoi sach moi  -->
<section class="_1khoi sachmoi bg-white">
    <div class="container">
        <div class="noidung" style=" width: 100%;">
            <div class="row">
                <!--header-->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                    <h1 class="header text-uppercase" style="font-weight: 400;">SÁCH MỚI TUYỂN CHỌN</h1>
                    <a href="{{asset('')}}news" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                </div>
            </div>
            <div class="khoisanpham" style="padding-bottom: 2rem;">
                <!-- 1 san pham -->
                @foreach ($news as $item)
                    @include('templates.card')
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- khoi sach combo hot  -->
<section class="_1khoi combohot mt-4">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="row">
                <!--header -->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                    <h2 class="header text-uppercase" style="font-weight: 400;">COMBO SÁCH HOT - GIẢM ĐẾN 25%</h2>
                    <a href="{{asset('')}}combos" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                </div>
            </div>
            <div class="khoisanpham">
                @foreach ($combos as $item)
                    @include('templates.card')
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- khoi sach sap phathanh  -->
<section class="_1khoi sapphathanh mt-4">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="row">
                <!--header-->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                    <h2 class="header text-uppercase" style="font-weight: 400;">SÁCH SẮP PHÁT HÀNH / ĐẶT TRƯỚC</h2>
                    <a href="{{asset('')}}releases" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                </div>
            </div>
            <div class="khoisanpham">
                <!-- 1 san pham -->
                @foreach ($releases as $item)
                    @include('templates.card')
                @endforeach

            </div>
        </div>
    </div>
</section>
@endsection