@foreach($listProduct as $value)
<div class="col-sm-4 element-product">
    <div class="detail-product">
        <div class="wrap-item-product">
            <div class="avatar-product" title="{{$value->pro_name}}">
                <a href="{{url($value->pro_link)}}" title="name" class="img-product">
                    <img src="{{getUrlImageMain($value->pro_picture,200)}}" alt="" title="{{$value->pro_name}}">
                </a>
            </div>
            <div class="tittle-product">
                <a href="{{url($value->pro_link)}}" title="{{$value->pro_name}}">
                    {{$value->pro_name}}
                </a>
            </div>
            <div class="price-product">
                <p class="price">
                    {{number_format($value->pro_price)}}
                </p>
                <div class="shopping shipping-svg-icon icon-free-shipping">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                </div>
            </div>
            <div class="rating-product">
                <div class="rating-like-wrap">
                    <div class="shopee-svg-icon icon-like-2">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </div>
                    <div class="number-like">
                        10
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
