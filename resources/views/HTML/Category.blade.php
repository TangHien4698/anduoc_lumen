
@extends('HTML.layout')
@section('header')
    <meta id="metaDes" name="description" content="Trang kinh doanh của nhà thuốc An Dược : chuyên gia chăm sóc khách hàng, tư vấn tâm sinh lý, sức khỏe, sức đẹp đối với mọi lứa tuổi. Với sologan của nhà thuốc: Tận tình, chu đáo, niềm tin khách hàng là quan trọng nhất" />
    <meta id="metakeywords" name="keywords" content="teen viet nam, giới trẻ, xu hướng, âm nhạc, xem phim, đời sống, hàng hiệu, chuyện lạ, thời trang trẻ, mới lớn, đang yêu, sành điệu, chuyện cười, khéo tay, các sao, chăm sóc tận tình, sức khỏe" />
    <title>Danh sách sản phẩm thuộc: @if(isset($categoryChild)){{$categoryChild["cat_name"]}}@else {{$Category["cat_name"]}} @endif</title>
    <link rel="canonical" href="{{URL::current()}}"/>
@endsection()
@section('content')
<div class="ResultSearchProduct">
    <div class="container">
        <div class="row">
            <div class="tittle-page">
                <ul>
                    <li>
                        <a href="#">
                            <h1>Trang chủ</h1>
                        </a>
                    </li>
                    <li>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <a href="{{url($Category["cat_rewrite"])}}">
                            <span> {{$Category["cat_name"]}}</span>
                        </a>
                    </li>
                    @if(isset($categoryChild))
                    <li>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <a href="{{url($categoryChild["cat_rewrite"])}}">
                            <span> {{$categoryChild["cat_name"]}}</span>
                        </a>
                    </li>
                        @endif
                </ul>
            </div>
            <div class="category-list-product">
                <div class="col-sm-2">
                    <div class="list-category">
                        <h3 class="name_category">
                            {{$Category["cat_name"]}}
                        </h3>
                        @foreach($Category["childs"] as $value)
                        <a href="{{url($value->cat_rewrite)}}" class="a-menu-detail" href="{{$value->cat_rewrite}}" data-id="{{$value->cat_id}}">
                            <span>{{$value->cat_name}}</span>
                        </a>
                            @endforeach
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="list-product">
                        @foreach($listProduct as $value)
                        <div class="wrap-product">
                            <div class="detail-product">
                                <div class="wrap-item-product">
                                    <div class="avatar-product" title="{{$value["pro_name"]}}">
                                        <a href="{{url($value["pro_link"])}}" title="{{$value["pro_name"]}}" class="img-product">
                                            <img src="{{getUrlImageMain($value["pro_picture"],200)}}" alt="{{$value["pro_name"]}}" title="{{$value["pro_name"]}}">
                                        </a>
                                    </div>
                                    <div class="tittle-product">
                                        <a href="{{url($value["pro_link"])}}" title=" {{$value["pro_name"]}}">
                                            {{$value["pro_name"]}}
                                        </a>
                                    </div>
                                    <div class="price-product">
                                        <span class="price-detail">
                                            {{number_format($value["pro_price"])}}
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
                    </div>
                </div>
            </div>

            <div class="pagiantion">
                <div class="list-button">
                    {{ $listProduct->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
