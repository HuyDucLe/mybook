@extends('templates.default')

@section('css')
<link rel="stylesheet" href="{{asset('')}}public/css/item.css">
@endsection

@section('content')
<section class="content my-4">
    <div class="container">
        <div> 
			<center>
				<h2 class='header text-uppercase'>Sách thể loại: {{$cate_name}}</h2>
			</center>
				@php ($count = count($items))
				@if($count == 0) 
					<center>Không có sản phẩm nào phù hợp.</center>
				@endif

        </div>
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="items">
                <div class="row">
                	@foreach($items as $item)
						<div class='col-lg-3 col-md-4 col-xs-6 col-sm-2'>
	                        <div class='card'>
	                            <a href='{{asset('')}}item/{{$item->id}}' class='motsanpham' style='text-decoration: none; color: black;' data-toggle='tooltip' data-placement='bottom' title='{{$item->book_name}}'>
	                                <img class='card-img-top anh' src='{{asset('')}}public/images/{{$item->id}}.jpg' alt='Ảnh mặt trước {{$item->id}}'>
	                                <div class='card-body noidungsp mt-3'>
	                                    <h6 class='card-title ten'>"{{$item->book_name}}"</h6>
	                                    <small class='tacgia text-muted'>{{$item->author}}</small>
	                                    <div class='gia d-flex align-items-baseline'>
	                                        <div class='giamoi'>{{$item->promote}}₫</div>
	                                        <div class='giacu text-muted'>{{$item->price}}₫</div>
	                                        <div class='sale'>-{{100 - ceil($item->promote *100 / $item->price)}}%</div>
	                                    </div>
	                                    <div class='danhgia'>
	                                        <ul class='d-flex' style='list-style: none;'>
					                        @for($r = 1; $r<= ceil($item->rate); $r++)
						                	    <i class='fa fa-star active'></i>
						                	@endfor
						                	@for($r = 1; $r<= 5-ceil($item->rate); $r++)
						                	    <i class='fa fa-star'></i>
						                	@endfor
	                                            <span class='text-muted'>0 nhận xét</span>
	                                        </ul>
	                                    </div>
	                                </div>
	                            </a>
	                        </div>
	                    </div>
	                @endforeach
                </div>
                <!-- pagination bar  -->
                <div class="pagination-bar my-3">
                            {{ $items->links();}}

                </div>
            <!--het khoi san pham-->
        </div>
        <!--het div noidung-->
    </div>
    <!--het container-->
</section> 
@endsection