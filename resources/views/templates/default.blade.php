@if(Session::has('name'))
@php ($login = 1)
@php ($name = session()->get('name'))
@php ($role = session()->get('role'))
@else 
@php ($login = 0)
@endif
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{Session::get('success')}}</strong>
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(Session::has('fail'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  	<strong>{{Session::get('fail')}}</strong>
  	<p>@error('name'){{$message}}@enderror</p>
    <p>@error('email'){{$message}}@enderror</p>
    <p>@error('password'){{$message}}@enderror</p>
    <p>@error('password_confirmation'){{$message}}@enderror</p>
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<!DOCTYPE html>
<html lang="vi">
    <head>
        <title>MyBook-Mua sách trực tuyến giá rẻ nhất</title>
        <meta name="description" content="Mua sách online hay, giá tốt nhất, combo sách hot bán chạy, giảm giá cực khủng cùng với những ưu đãi như miễn phí giao hàng, quà tặng miễn phí, đổi trả nhanh chóng. Đa dạng sản phẩm, đáp ứng mọi nhu cầu.">
        <meta name="keywords" content="nhà sách online, mua sách hay, sách hot, sách bán chạy, sách giảm giá nhiều">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        @yield('css')
        <script type="text/javascript" src="{{asset('')}}public/js/main.js"></script>
        <link rel="stylesheet" href="{{asset('')}}public/fontawesome_free_5.13.0/css/all.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('')}}public/slick/slick.css" />
        <link rel="stylesheet" type="text/css" href="{{asset('')}}public/slick/slick-theme.css" />
        <script type="text/javascript" src="{{asset('')}}public/slick/slick.min.js"></script>
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
        <link rel="canonical" href="http://mybook.com/">
        <meta name="google-site-verification" content="urDZLDaX8wQZ_-x8ztGIyHqwUQh2KRHvH9FhfoGtiEw" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('')}}public/favicon_io/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('')}}public/favicon_io/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('')}}public/favicon_io/favicon-16x16.png">
        <link rel="manifest" href="{{asset('')}}public/favicon_io/site.webmanifest">
        <style>
            img[alt="www.000webhost.com"] {
                display: none;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-white navbar-light">
            <div class="container">
                <!-- logo  -->
                <a class="navbar-brand" href="{{asset('')}}public" style="color: #CF111A;">
                    <b>MyBook</a>
                <!-- navbar-toggler (khung ngoài phần đầu) -->
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse header-search" id="collapsibleNavId">
                    <!-- @form (tìm kiếm ) -->
                    <!--thanh tìm kiếm-->
                    <form class="form-inline ml-auto my-2 my-lg-0 mr-3" id="header-search" method="post" action="{{asset('')}}search">
                    	{{ csrf_field() }}
                        <div class="input-group" style="width: 600px;">
                            <input type="text" class="form-control m-input" aria-label="Small" placeholder="Nhập sách cần tìm kiếm..." name="search">
                            <!--kính lúp-->
                            <div class="input-group-append">
                                <button type="submit" class="btn" style="background-color: #CF111A; color: white;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                            <div id="search-suggest" class="s-suggest"></div>
                        </div>
                    </form>
                    <!-- ô đăng nhập đăng ký giỏ hàng trên header  -->
                    <!--  Tài khoản -->
                    <ul class="navbar-nav mb-1 ml-auto">
                        <div class="dropdown">
                            <li class="nav-item account" type="button" class="btn dropdown" data-toggle="dropdown">
                                <a href="{{asset('')}}public/#" class="btn btn-secondary rounded-circle">
                                    <i class="fa fa-user"></i>
                                </a>
                                <a class="nav-link text-dark text-uppercase" href="{{asset('')}}public/#" style="display:inline-block">
                                @if($login) Hi {{$role}} {{$name}} @else Tài khoản @endif
                                </a>
                            </li>
                            <!-- Đăng nhập/ Đăng ký -->
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            	@if($login)
                            	<a class="dropdown-item text-center mb-2" href="{{asset('')}}logout">Đăng xuất</a>
                            	@if($role = 'admin')<a class="dropdown-item text-center mb-2" href="{{asset('')}}admin">Dashboard</a>@endif
                            	@else
                                <a class="dropdown-item nutdangky text-center mb-2" href="#" data-toggle="modal" data-target="#formdangky">Đăng ký</a>
                                <a class="dropdown-item nutdangnhap text-center" href="#" data-toggle="modal" data-target="#formdangnhap">Đăng nhập</a>
                                @endif
                            </div>
                        </div>
                        <!-- Giỏ-->
                        <li class="nav-item giohang">
                            <a href="{{asset('')}}public/gio-hang.html" class="btn btn-secondary rounded-circle">
                                <i class="fa fa-shopping-cart"></i>
                                <div class="cart-amount">0</div>
                            </a>
                            <a class="nav-link text-dark giohang text-uppercase" href="{{asset('')}}cart" style="display:inline-block">Giỏ Hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- @form dang ky khi click vao button tren header-->
        <div class="modal fade mt-5" id="formdangky" data-backdrop="static" tabindex="-1" aria-labelledby="dangky_tieude" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <ul class="tabs d-flex justify-content-around list-unstyled mb-0">                            
                            <li class="tab tab-dangky text-center">
                                <a class="text-decoration-none">Đăng ký</a>
                                <hr>
                            </li>
                            <li class="tab tab-dangnhap text-center">
                                <a class=" text-decoration-none">Đăng nhập</a>
                                <hr>
                            </li>
                        </ul>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-signup" class="form-signin mt-2" method="post" action="{{asset('')}}register">
                            @csrf
                            <div class="form-label-group">
                                <input type="text" class="form-control" placeholder="Nhập họ và tên" name="name" value='{{old('name')}}' required autofocus>
                            </div>
<!--                             <div class="form-label-group"> -->
<!--                                 <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="phone" required> -->
<!--                             </div> -->
                            <div class="form-label-group">
                                <input type="email" class="form-control" placeholder="Nhập địa chỉ email" name="email" value='{{old('email')}}' required>
                            </div>
                            <div class="form-label-group">
                                <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password" required>
                            </div>
                            <div class="form-label-group mb-4">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                            </div>
                            <button class="btn btn-lg btn-block btn-signin text-uppercase text-white mt-3" type="submit" style="background: #F5A623" action>Đăng ký</button>
                            <hr class="mt-3 mb-2">
                            <div class="custom-control custom-checkbox">
                                <p class="text-center">Bằng việc đăng ký, bạn đã đồng ý với MyBook về</p>
                                <a href="{{asset('')}}public/#" class="text-decoration-none text-center" style="color: #F5A623">Điều khoản dịch vụ & Chính sách bảo mật</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- @form dang nhap khi click vao button tren header-->
        <div class="modal fade mt-5" id="formdangnhap" data-backdrop="static" tabindex="-1" aria-labelledby="dangnhap_tieude" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <ul class="tabs d-flex justify-content-around list-unstyled mb-0">
                        	<li class="tab tab-dangky text-center">
                                <a class="text-decoration-none">Đăng ký</a>
                                <hr>
                            </li>
                            <li class="tab tab-dangnhap text-center">
                                <a class=" text-decoration-none">Đăng nhập</a>
                                <hr>
                            </li>                            
                        </ul>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-signin" class="form-signin mt-2" method="post" action="{{asset('')}}login">
                            @csrf
                            <div class="form-label-group">
                                <input type="email" class="form-control" placeholder="Nhập địa chỉ email" name="email" required autofocus>
                            </div>
                            <div class="form-label-group">
                                <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Nhớ mật khẩu</label>
                                <a href="{{asset('')}}public/#" class="float-right text-decoration-none" style="color: #F5A623">Quên mật khẩu</a>
                            </div>
                            <button class="btn btn-lg btn-block btn-signin text-uppercase text-white" type="submit" style="background: #F5A623">Đăng nhập</button>
                            <hr class="my-4">
                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit">
                                <i class="fab fa-google mr-2"></i> Đăng nhập bằng Google </button>
                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit">
                                <i class="fab fa-facebook-f mr-2"></i> Đăng nhập bằng Facebook </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- thanh "danh muc sach" đã được ẩn bên trong + hotline + ho tro truc tuyen -->
        <section class="duoinavbar">
            <div class="container text-white">
                <div class="row justify">
                    <div class="col-lg-3 col-md-5">
                        <div class="categoryheader">
                            <div class="noidungheader text-white">
                                <i class="fa fa-bars"></i>
                                <span class="text-uppercase font-weight-bold ml-1">Danh mục sách</span>
                            </div>
                            <!-- CATEGORIES -->
                            <div class="categorycontent">
                                <ul>
                                    <li>
                                        <a href="{{asset('')}}group/1"> Sách Kinh Tế - Kỹ Năng</a>
                                        <i class="fa fa-chevron-right float-right"></i>
                                        <ul>
                                            <li class="liheader">
                                                <a href="{{asset('')}}group/1" class="header text-uppercase">Sách Kinh Tế - Kỹ Năng</a>
                                            </li>
                                            <div class="content trai">
                                                <li>
                                                    <a href="{{asset('')}}group/2">Kinh Tế - Chính Trị</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/3">Sách Khởi Nghiệp</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/4">Sách Tài Chính, Kế Toán</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/5">Sách Quản Trị Nhân Sự</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/6">Sách Kỹ Năng Làm Việc</a>
                                                </li>
                                            </div>
                                            <div class="content phai">
                                                <li>
                                                    <a href="{{asset('')}}group/7">Nhân Vật - Bài Học Kinh Doanh</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/8">Sách Quản Trị - Lãnh Đạo</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/9">Sách Kinh Tế Học</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/10">Sách Chứng Khoán - Bất Động Sản - Đầu Tư</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/11">Sách Marketing - Bán Hàng</a>
                                                </li>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{asset('')}}group/12">Nghệ Thuật Sống - Tâm Lý </a>
                                        <i class="fa fa-chevron-right float-right"></i>
                                        <ul>
                                            <li class="liheader">
                                                <a href="{{asset('')}}group/12" class="header text-uppercase">Nghệ Thuật Sống - Tâm Lý</a>
                                            </li>
                                            <div class="content trai">
                                                <li>
                                                    <a href="{{asset('')}}group/13">Sách Nghệ Thuật Sống</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/14">Sách Tâm Lý</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/15">Sách Hướng Nghiệp</a>
                                                </li>
                                            </div>
                                            <div class="content phai">
                                                <li>
                                                    <a href="{{asset('')}}group/16">Sách Nghệ Thuật Sống Đẹp</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/17">Sách Tư Duy </a>
                                                </li>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{asset('')}}group/18">Sách Văn Học Việt Nam</a>
                                        <i class="fa fa-chevron-right float-right"></i>
                                        <ul>
                                            <li class="liheader">
                                                <a href="{{asset('')}}group/18" class="header text-uppercase">Sách Văn Học Việt Nam</a>
                                            </li>
                                            <div class="content trai">
                                                <li>
                                                    <a href="{{asset('')}}group/19">Truyện Ngắn - Tản Văn </a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/20">Tiểu Thuyết lịch Sử </a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/21">Phóng Sự - Ký Sự - Du ký - Tùy Bút</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/22">Thơ</a>
                                                </li>
                                            </div>
                                            <div class="content phai">
                                                <li>
                                                    <a href="{{asset('')}}group/23">Tiểu thuyết</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/24">Tiểu sử - Hồi ký</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/25">Phê Bình Văn Học</a>
                                                </li>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{asset('')}}group/26">Sách Văn Học Nước Ngoài</a>
                                        <i class="fa fa-chevron-right float-right"></i>
                                        <ul>
                                            <li class="liheader">
                                                <a href="{{asset('')}}group/26" class="header text-uppercase">Sách Văn Học Nước Ngoài</a>
                                            </li>
                                            <div class="content trai">
                                                <li>
                                                    <a href="{{asset('')}}group/27">Văn Học Hiện Đại</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/28">Tiểu Thuyết </a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/29">Truyện Trinh Thám</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/30">Thần Thoại - Cổ Tích</a>
                                                </li>
                                            </div>
                                            <div class="content phai">
                                                <li>
                                                    <a href="{{asset('')}}group/31">Văn Học Kinh Điển</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/32">Sách Giả Tưởng - Kinh Dị</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/33">Truyện Kiếm Hiệp</a>
                                                </li>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{asset('')}}group/34">Sách Thiếu Nhi</a>
                                        <i class="fa fa-chevron-right float-right"></i>
                                        <ul>
                                            <li class="liheader">
                                                <a href="{{asset('')}}group/35" class="header text-uppercase">Sách Thiếu Nhi</a>
                                            </li>
                                            <div class="content trai">
                                                <li>
                                                    <a href="{{asset('')}}group/36">Mẫu Giáo</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/37">Thiếu Niên</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/38">Kiến Thức - Bách Khoa</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/39">Truyện Cổ Tích</a>
                                                </li>
                                            </div>
                                            <div class="content phai">
                                                <li>
                                                    <a href="{{asset('')}}group/40">Nhi Đồng</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/41">Văn Học Thiếu Nhi</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/42">Kỹ Năng Sống</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/43">Truyện Tranh</a>
                                                </li>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{asset('')}}group/44">Sách Giáo Dục - Gia Đình</a>
                                        <i class="fa fa-chevron-right float-right"></i>
                                        <ul>
                                            <li class="liheader">
                                                <a href="{{asset('')}}group/44" class="header text-uppercase">Sách Giáo Dục - Gia Đình</a>
                                            </li>
                                            <div class="content trai">
                                                <li>
                                                    <a href="{{asset('')}}group/45">Giáo dục</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/46">Thai Giáo</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/47">Sách Dinh Dưỡng - Chăm Sóc Trẻ</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/48">Ẩm Thực - Nấu Ăn</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/49">Sách Tham Khảo</a>
                                                </li>
                                            </div>
                                            <div class="content phai">
                                                <li>
                                                    <a href="{{asset('')}}group/50">Giới Tính</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/51">Sách Làm Cha Mẹ</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/52">Kiến Thức - Kỹ Năng Cho Trẻ</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/53">Ngoại Ngữ - Từ Điển</a>
                                                </li>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{asset('')}}group/54">Sách Lịch Sử</a>
                                        <i class="fa fa-chevron-right float-right"></i>
                                        <ul>
                                            <li class="liheader">
                                                <a href="{{asset('')}}group/55" class="header text-uppercase">Sách Lịch Sử</a>
                                            </li>
                                            <div class="content trai">
                                                <li>
                                                    <a href="{{asset('')}}group/56">Lịch Sử Việt Nam</a>
                                                </li>
                                            </div>
                                            <div class="content phai">
                                                <li>
                                                    <a href="{{asset('')}}group/57">Lịch Sử Thế Giới</a>
                                                </li>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{asset('')}}group/58">Sách Văn Hóa - Nghệ Thuật</a>
                                        <i class="fa fa-chevron-right float-right"></i>
                                        <ul>
                                            <li class="liheader">
                                                <a href="{{asset('')}}group/58" class="header text-uppercase">Sách Văn Hóa - Nghệ Thuật</a>
                                            </li>
                                            <div class="content trai">
                                                <li>
                                                    <a href="{{asset('')}}group/59">Văn Hóa</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/60">Phong Tục Tập Quán</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/61">Phong Thủy</a>
                                                </li>
                                            </div>
                                            <div class="content phai">
                                                <li>
                                                    <a href="{{asset('')}}group/62">Nghệ Thuật</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/63">Kiến Trúc</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/64">Du Lịch</a>
                                                </li>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{asset('')}}group/65">Sách Khoa Học - Triết Học</a>
                                        <i class="fa fa-chevron-right float-right"></i>
                                        <ul>
                                            <li class="liheader">
                                                <a href="{{asset('')}}group/65" class="header text-uppercase">Sách Khoa Học - Triết Học</a>
                                            </li>
                                            <div class="content trai">
                                                <li>
                                                    <a href="{{asset('')}}group/66">Triết Học Phương Tây</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/67">Khoa Học Cơ Bản</a>
                                                </li>
                                            </div>
                                            <div class="content phai">
                                                <li>
                                                    <a href="{{asset('')}}group/68">Minh Tiết Phương Đông</a>
                                                </li>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{asset('')}}group/69">Sách Tâm Linh - Tôn Giáo</a>
                                        <i class="fa fa-chevron-right float-right"></i>
                                    </li>
                                    <li>
                                        <a href="{{asset('')}}group/70">Sách Y Học - Thực Dưỡng</a>
                                        <i class="fa fa-chevron-right float-right"></i>
                                        <ul>
                                            <li class="liheader">
                                                <a href="{{asset('')}}group/70" class="header text-uppercase">Sách Y Học - Thực Dưỡng</a>
                                            </li>
                                            <div class="content trai">
                                                <li>
                                                    <a href="{{asset('')}}group/71">Chăm Sóc Sức Khỏe</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/72">Y Học</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/73">Thiền - Yoga</a>
                                                </li>
                                            </div>
                                            <div class="content phai">
                                                <li>
                                                    <a href="{{asset('')}}group/74">Thực Dưỡng</a>
                                                </li>
                                                <li>
                                                    <a href="{{asset('')}}group/75">Đông Y - Cổ Truyền</a>
                                                </li>
                                            </div>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 ml-auto contact d-none d-md-block">
                        <div class="benphai float-right">
                            <div class="hotline">
                                <i class="fa fa-phone"></i>
                                <span>Hotline: <b>1900 1999</b>
                                </span>
                            </div>
                            <i class="fas fa-comments-dollar"></i>
                            <a href="{{asset('')}}public/#">Hỗ trợ trực tuyến </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @yield('content')

        <!-- div _1khoi -- khoi sachnendoc -->
        <section class="_1khoi sachnendoc bg-white mt-4">
            <div class="container">
                <div class="noidung" style=" width: 100%;">
                    <div class="row">
                        <!--header-->
                        <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                            <h2 class="header text-uppercase" style="font-weight: 400;">SÁCH HAY NÊN ĐỌC</h2>
                            <a href="{{asset('')}}public/#" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                        </div>
                        <!-- 1 san pham -->
                        <div class="col-lg col-sm-4">
                            <div class="card">
                                <a href="{{asset('')}}public/#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Từng bước chân nở hoa: Khi câu kinh bước tới">
                                    <img class="card-img-top anh" src="{{asset('')}}public/images/21.jpg" alt="tung-buoc-chan-no-hoa">
                                    <div class="card-body noidungsp mt-3">
                                        <h3 class="card-title ten">Từng bước chân nở hoa: Khi câu kinh bước tới</h3>
                                        <small class="thoigian text-muted">03/04/2020</small>
                                        <div>
                                            <a class="detail" href="{{asset('')}}public/#">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg col-sm-4">
                            <div class="card">
                                <a href="{{asset('')}}public/#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Cảm ơn vì đã được thương">
                                    <img class="card-img-top anh" src="{{asset('')}}public/images/22.jpg" alt="cam-on-vi-da-duoc-thuong">
                                    <div class="card-body noidungsp mt-3">
                                        <h3 class="card-title ten">Cảm ơn vì đã được thương</h3>
                                        <small class="thoigian text-muted">31/03/2020</small>
                                        <div>
                                            <a class="detail" href="{{asset('')}}public/#">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg col-sm-4">
                            <div class="card">
                                <a href="{{asset('')}}public/#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Hào quang của vua Gia Long trong mắt Michel Gaultier">
                                    <img class="card-img-top anh" src="{{asset('')}}public/images/23.jpg" alt="vua-gia-long">
                                    <div class="card-body noidungsp mt-3">
                                        <h3 class="card-title ten">Hào quang của vua Gia Long trong mắt Michel Gaultier</h3>
                                        <small class="thoigian text-muted">21/03/2020</small>
                                        <div>
                                            <a class="detail" href="{{asset('')}}public/#">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg col-sm-4">
                            <div class="card">
                                <a href="{{asset('')}}public/#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Suối nguồn” và cái tôi hiện sinh trong từng cá thể">
                                    <img class="card-img-top anh" src="{{asset('')}}public/images/24.jpg" alt="suoi-nguon-va-cai-toi-trong-tung-ca-the">
                                    <div class="card-body noidungsp mt-3">
                                        <h3 class="card-title ten">"Suối nguồn” và cái tôi hiện sinh trong từng cá thể</h3>
                                        <small class="thoigian text-muted">16/03/2020</small>
                                        <div>
                                            <a class="detail" href="{{asset('')}}public/#">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg col-sm-4">
                            <div class="card cuoicung">
                                <a href="{{asset('')}}public/#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Đại dịch trên những con đường tơ lụa">
                                    <img class="card-img-top anh" src="{{asset('')}}public/images/25.jpg" alt="dai-dich-tren-con-duong-to-lua">
                                    <div class="card-body noidungsp mt-3">
                                        <h3 class="card-title ten">Đại dịch trên những con đường tơ lụa</h3>
                                        <small class="thoigian text-muted">16/03/2020</small>
                                        <div>
                                            <a class="detail" href="{{asset('')}}public/#">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </section>
        <!-- thanh cac dich vu :mien phi giao hang, qua tang mien phi ........ -->
        <section class="abovefooter text-white" style="background-color: #CF111A;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="dichvu d-flex align-items-center">
                            <img src="{{asset('')}}public/images/icon-books.png" alt="icon-books">
                            <div class="noidung">
                                <h3 class="tieude font-weight-bold">HƠN 14.000 TỰA SÁCH HAY</h3>
                                <p class="detail">Tuyển chọn bởi MyBook</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="dichvu d-flex align-items-center">
                            <img src="{{asset('')}}public/images/icon-ship.png" alt="icon-ship">
                            <div class="noidung">
                                <h3 class="tieude font-weight-bold">MIỄN PHÍ GIAO HÀNG</h3>
                                <p class="detail">Từ 150.000đ ở Hà Nội</p>
                                <p class="detail">Từ 300.000đ ở tỉnh thành khác</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="dichvu d-flex align-items-center">
                            <img src="{{asset('')}}public/images/icon-gift.png" alt="icon-gift">
                            <div class="noidung">
                                <h3 class="tieude font-weight-bold">QUÀ TẶNG MIỄN PHÍ</h3>
                                <p class="detail">Tặng Bookmark</p>
                                <p class="detail">Bao sách miễn phí</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="dichvu d-flex align-items-center">
                            <img src="{{asset('')}}public/images/icon-return.png" alt="icon-return">
                            <div class="noidung">
                                <h3 class="tieude font-weight-bold">ĐỔI TRẢ NHANH CHÓNG</h3>
                                <p class="detail">Hàng bị lỗi được đổi trả nhanh chóng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer  -->
        <footer>
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="gioithieu">
                            <h3 class="header text-uppercase font-weight-bold">Về MyBook</h3>
                            <a href="{{asset('')}}public/#">Giới thiệu về MyBook</a>
                            <a href="{{asset('')}}public/#">Tuyển dụng</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="hotrokh">
                            <h3 class="header text-uppercase font-weight-bold">HỖ TRỢ KHÁCH HÀNG</h3>
                            <a href="{{asset('')}}public/#">Hướng dẫn đặt hàng</a>
                            <a href="{{asset('')}}public/#">Phương thức thanh toán</a>
                            <a href="{{asset('')}}public/#">Phương thức vận chuyển</a>
                            <a href="{{asset('')}}public/#">Chính sách đổi trả</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="lienket">
                            <h3 class="header text-uppercase font-weight-bold">HỢP TÁC VÀ LIÊN KẾT</h3>
                            <img src="{{asset('')}}public/images/dang-ky-bo-cong-thuong.png" alt="dang-ky-bo-cong-thuong">
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="ptthanhtoan">
                            <h3 class="header text-uppercase font-weight-bold">Phương thức thanh toán</h3>
                            <img src="{{asset('')}}public/images/visa-payment.jpg" alt="visa-payment">
                            <img src="{{asset('')}}public/images/master-card-payment.jpg" alt="master-card-payment">
                            <img src="{{asset('')}}public/images/jcb-payment.jpg" alt="jcb-payment">
                            <img src="{{asset('')}}public/images/atm-payment.jpg" alt="atm-payment">
                            <img src="{{asset('')}}public/images/cod-payment.jpg" alt="cod-payment">
                            <img src="{{asset('')}}public/images/payoo-payment.jpg" alt="payoo-payment">
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- nut cuon len dau trang -->
        <div class="fixed-bottom">
            <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="{{asset('')}}public/#" style="background:#CF111A; margin: 10px;">
                <i class="fa fa-chevron-up text-white"></i>
            </div>
        </div>
    </body>
</html>
<!-- <script>
	@if(Session::has('name'))
	document.write('Hello ');
	var $name = "{{Session::get('name')}}";
	sessionStorage.setItem("name", $name);
    document.write($name);
    @else
    sessionStorage.clear();
    @endif
</script> -->