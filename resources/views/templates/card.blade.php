<div class='col-lg-3 col-md-4 col-xs-6 col-sm-2'>
    <div class="card">
        <a href="{{asset('')}}item/{{$item->id}}" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="{{$item->book_name}}">
            <img class="card-img-top anh" src="{{asset('')}}public/images/{{$item->id}}.jpg" alt="Ảnh mặt trước {{$item->id}}">
            <div class="card-body noidungsp mt-3">
                <h3 class="card-title ten">{{$item->book_name}}</h3>
                <small class="tacgia text-muted">{{$item->author}}</small>
                <div class="gia d-flex align-items-baseline">
                    <div class="giamoi">{{number_format($item->promote, 0 , ',' , '.' )}} ₫</div>
                    <div class="giacu text-muted">{{number_format($item->price, 0 , ',' , '.')}} ₫</div>
                    <div class="sale">-{{100 - ceil($item->promote *100 / $item->price)}}%</div>
                </div>
                <div class="danhgia">
                    <ul class="d-flex" style="list-style: none;">
                    	@for($r = 1; $r<= ceil($item->rate); $r++)
                    	    <i class='fa fa-star active'></i>
                    	@endfor
                    	@for($r = 1; $r<= 5-ceil($item->rate); $r++)
                    	    <i class='fa fa-star'></i>
                    	@endfor
                        <span class="text-muted">0 nhận xét</span>
                    </ul>
                </div>
            </div>
        </a>
    </div>
</div>