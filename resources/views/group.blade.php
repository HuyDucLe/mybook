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
	                    @include('templates.card')
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