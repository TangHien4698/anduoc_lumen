@php

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $link = "https";
    else
        $link = "http";
    // Here append the common URL characters.
    $link .= "://";
    // Append the host(domain name, ip) to the URL.
    $link .= $_SERVER['HTTP_HOST'];
    // Append the requested resource location to the URL
    $link .= $_SERVER['REQUEST_URI'];
    // Print the link
    if(isset($_GET["page"]))
    {
        $array_uri = explode("&",$link);
        $link = $array_uri[0];
    }
@endphp
@extends('HTML.layout')
@section('header')
    <meta id="metaDes" name="description" content="Trang kinh doanh của nhà thuốc An Dược : chuyên gia chăm sóc khách hàng, tư vấn tâm sinh lý, sức khỏe, sức đẹp đối với mọi lứa tuổi. Với sologan của nhà thuốc: Tận tình, chu đáo, niềm tin khách hàng là quan trọng nhất" />
    <meta id="metakeywords" name="keywords" content="teen viet nam, giới trẻ, xu hướng, âm nhạc, xem phim, đời sống, hàng hiệu, chuyện lạ, thời trang trẻ, mới lớn, đang yêu, sành điệu, chuyện cười, khéo tay, các sao, chăm sóc tận tình, sức khỏe" />
    <title>Tìm kiếm : {{$_GET["keyword"]}}</title>
    <link rel="canonical" href="{{URL::current()}} ?keyword={{$_GET["keyword"]}}"/>
@endsection()
@section('content')
<div class="ResultSearchProduct">
    <div class="container">
        <div class="row">
            <div class="banner-section1">
                <div class="content-banner1">
                    <h1 class="hd-banner1">Kết quả tìm kiếm :{{$_GET["keyword"]}}</h1>
                </div>
            </div>
            @if(!is_null($result))
            <div class="list-product">
                @foreach($result as $value)
                <div class="wrap-product">
                    <div class="detail-product">
                        <div class="wrap-item-product">
                            <div class="avatar-product" title="{{$value["_source"]["pro_name"]}}">
                                <a href="#" title="{{$value["_source"]["pro_name"]}}" class="img-product">
                                    <img src="{{url('image/product_1.jpeg')}}" alt="{{$value["_source"]["pro_name"]}}" title="{{$value["_source"]["pro_name"]}}">
                                </a>
                            </div>
                            <div class="tittle-product">
                                <a href="#" title="{{$value["_source"]["pro_name"]}}">
                                    {{$value["_source"]["pro_name"]}}
                                </a>
                            </div>
                            <div class="price-product">
                                <span class="price-detail">
                                            {{$value["_source"]["pro_price"]}}
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
                @if($number_page > 1)
                    <div class="pagiantion">
                        <div class="list-button">
                                @for($i = 1;$i<= $number_page;$i++)
                                    @if(isset($_GET["page"]))
                                        @if($i == $_GET["page"])
                                            <a href="{{$link}}&page={{$i}}" class="first action">{{$i}}</a>
                                        @else
                                            <a href="{{$link}}&page={{$i}}" class="first">{{$i}}</a>
                                        @endif
                                    @else
                                        @if($i == 1)
                                            <a href="{{$link}}&page={{$i}}" class="first action">{{$i}}</progress>
                                        @else
                                            <a href="{{$link}}&page={{$i}}" class="first">{{$i}}</a>
                                        @endif
                                    @endif
                                @endfor
                        </div>
                    </div>
                @endif
            @else
                <h3 style="text-align: center">Không tìm thấy kết quả như mong muốn !</h3>
                @endif
        </div>
    </div>
</div>
@endsection
