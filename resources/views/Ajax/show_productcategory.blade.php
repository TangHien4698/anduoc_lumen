@foreach($listProduct as $value)
    <div class="wrap-product">
        <div class="detail-product">
            <div class="wrap-item-product">
                <div class="avatar-product" title="{{$value->pro_name}}">
                    <a href="{{url($value->pro_link)}}" title="{{$value->pro_name}}" class="img-product">
                        <img src="{{getUrlImageMain($value->pro_picture,200)}}" alt="{{$value->pro_name}}" title="{{$value->pro_name}}">
                    </a>
                </div>
                <div class="tittle-product">
                    <a href="{{url($value->pro_link)}}" title=" {{$value->pro_name}}">
                        {{$value->pro_name}}
                    </a>
                </div>
                <div class="price-product">
                                        <span class="price-detail">
                                            {{number_format($value->pro_price)}}
                                        </span>
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
