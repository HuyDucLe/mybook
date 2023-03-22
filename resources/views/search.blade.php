@extends('templates.default')

@section('css')
<link rel="stylesheet" href="{{asset('')}}public/css/home.css">
@endsection

@section('content')
<section class="content my-4">
    <div class="container">
        <div> 
			<center>
				@php ($count = 0)
				@php ($s = '')
				@if(isset($items)) 
					@php ($count = count($items))
					@php ($s = $search)
				@endif				
				<h2 class="header text-uppercase">Tìm kiếm sách: {{$s}}</h2>
			</center>				
				@if($count == 0) 
					<center>Không có sản phẩm nào phù hợp.</center>
				@else
        </div>
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="items">
                <div class="row">
                	@foreach($items as $item)
						<div class="col-lg-3 col-md-4 col-xs-6 col-sm-2">
	                        @include('templates.card')
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
				@endif
    <!--het container-->
</section> 
@endsection