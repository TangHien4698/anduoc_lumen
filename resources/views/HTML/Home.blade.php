
@extends('HTML.layout')
@section('header')
    <meta id="metaDes" name="description" content="Trang kinh doanh của nhà thuốc An Dược : chuyên gia chăm sóc khách hàng, tư vấn tâm sinh lý, sức khỏe, sức đẹp đối với mọi lứa tuổi. Với sologan của nhà thuốc: Tận tình, chu đáo, niềm tin khách hàng là quan trọng nhất" />
    <meta id="metakeywords" name="keywords" content="teen viet nam, giới trẻ, xu hướng, âm nhạc, xem phim, đời sống, hàng hiệu, chuyện lạ, thời trang trẻ, mới lớn, đang yêu, sành điệu, chuyện cười, khéo tay, các sao, chăm sóc tận tình, sức khỏe" />
    <title>Chuyên trang tư vấn các sản phẩm Sức khỏe và làm đẹp</title>
    <link rel="canonical" href="{{URL::current()}}"/>
@endsection()
@section('content')
        <div class="sectionn">
            <div class="container">
                <div class="slide">
                    <div class="row">
                        <div class="col-sm-3 menu">
                                <ul class="list-submenu">
                                    @foreach($categoryParent as $valueCategoryParent)
                                    <li>
                                        <div class="menusub">
                                            <a href="{{$valueCategoryParent["cat_rewrite"]}} " title="{{$valueCategoryParent["cat_name"]}}"  class="tittle-menu">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                <span class="">{{$valueCategoryParent["cat_name"]}}</span>
                                            </a>
                                            <ul class="submenu" role="menuitem" id="submenu-home">
                                                <p class="title-submenu">
                                                    <a href="{{$valueCategoryParent["cat_rewrite"]}}" title="Thực phẩm chức năng">
                                                        <span> {{$valueCategoryParent["cat_name"]}}</span>
                                                    </a>
                                                </p>
                                                @foreach($valueCategoryParent["childs"] as $valueCategoryChild)
                                                <li role="menuitem">
                                                    <a href="{{$valueCategoryChild["cat_rewrite"]}}" title="{{$valueCategoryChild["cat_name"]}}">
                                                        <span> {{$valueCategoryChild["cat_name"]}}</span>
                                                    </a>
                                                </li>
                                                @endforeach()
                                            </ul>
                                        </div>

                                    </li>
                                    @endforeach()
                                </ul>
                        </div>
                        <div class="col-sm-9 banner-img">
                            <div class="banner">
                                <img src="{{url('image/banner.jpg')}}" alt="banner-trangchu" title="Banner Trang Chu">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="new-product">
                    <div class="title-new-product">
                        <p></p>
                        <p></p>
                        <h1>SẢN PHẨM MỚI</h1>
                    </div>
                    <div class="slick-product">
                        @foreach($listProductNew as $value)
                        <div class="detail-product">
                            <div class="wrap-item-product">
                                <div class="avatar-product" title="{{$value["pro_name"]}}">
                                    <a href="{{url($value["pro_link"])}}" title="{{$value["pro_name"]}}" class="img-product">
                                        <img src="{{getUrlImageMain($value["pro_picture"],200)}}" alt="{{$value["pro_name"]}}" title="{{$value["pro_name"]}}">
                                    </a>
                                </div>
                                <div class="tittle-product">
                                    <a href="{{url($value["pro_link"])}}" title="{{$value["pro_name"]}}">
                                       {{$value["pro_name"]}}
                                    </a>
                                </div>
                                <div class="price-product">
                                    <p class="price">
                                        {{number_format($value["pro_price"])}}
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
                        @endforeach()
                    </div>
                </div>
                 @php($i = 1)
                @foreach($categoryParent as $valueCategoryParent_2)
                <div class="category-1">
                    <div class="row">
                        <div class="col-sm-6 col-list-banner">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="menu-category">
                                        <a class="title-menu-category" href="{{url($valueCategoryParent_2["cat_rewrite"])}}" title="Menu category">
                                            <p class="STT">
                                                {{$i}}
                                            </p>
                                            <h3>
                                                {{$valueCategoryParent_2["cat_name"]}}
                                            </h3>
                                        </a>
                                        <div class="buy-category">
                                            <div class="icon-cart mcon-shopping-cart-2">
                                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                            </div>
                                            <span></span>
                                            <div class="icon-buy mcon-eye">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="menu-datail-category">
                                            @foreach($valueCategoryParent_2["childs"] as $valueCategoryChild)
{{--                                                {{dd($valueCategoryChild)}}--}}
                                            <a href="{{url($valueCategoryChild["cat_rewrite"])}}" title="{{$valueCategoryChild["cat_name"]}}" class="a-menu-detail" data-id="{{$valueCategoryChild["cat_id"]}}">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                {{$valueCategoryChild["cat_name"]}}
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="banner-category">
                                        <img src="{{url('image/banner1.jpg')}}" alt="Banner" title="Banner">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-list-product">
                            <div class="row row-product">
                                <div class="product-line" id="product-line">
                                    @foreach($valueCategoryParent_2->products as $valueProductDetail)
                                        <div class="col-sm-4 element-product">
                                            <div class="detail-product">
                                                <div class="wrap-item-product">
                                                    <div class="avatar-product" title="{{$valueProductDetail["pro_name"]}}">
                                                        <a href="{{url($valueProductDetail["pro_link"])}}" title="{{$valueProductDetail["pro_name"]}}" class="img-product">
                                                            <img src="{{getUrlImageMain($valueProductDetail["pro_picture"],200)}}" alt="Avatar-product" title="{{$valueProductDetail["pro_name"]}}">
                                                        </a>
                                                    </div>
                                                    <div class="tittle-product">
                                                        <a href="{{url($valueProductDetail["pro_link"])}}" title="{{$valueProductDetail["pro_name"]}}">
                                                            {{$valueProductDetail["pro_name"]}}
                                                        </a>
                                                    </div>
                                                    <div class="price-product">
                                                        <p class="price">
                                                            {{number_format($valueProductDetail["pro_price"])}}
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @php($i++)

                @endforeach
            </div>
        </div>
        @endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.0/slick.min.js"></script>
{{--    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>--}}
    <script>
        jQuery(document).ready(function($) {
            $(".a-menu-detail").on('click',function () {
                var idCategory = $(this).data('id');
                var lineProduct = $(this).closest('.category-1').children('.product-line');
                 console.log(idCategory);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:'{{url('ajax/filterproduct')}}',
                    data:
                        {
                            idCategory:idCategory,
                        },
                    success:function (data) {
                        $('.product-line').html(data);
                    },

                });
            });

                $(window).scroll(function(event) {
                    var pos_body = $('html,body').scrollTop();

                    if(pos_body>120){

                         $(".header-cuon").css("display", "block");
                    }
                    else
                    {
                        $(".header-cuon").css("display", "none");
                    }
                });
        });

    </script>
</html>
    <link rel="stylesheet" href="js/sweetalert2.min.css">
    <script src="js/sweetalert2.min.js"></script>
    @if(\Illuminate\Support\Facades\Session::has('error'))
            <script>
            Swal.fire({
                             icon: 'error',
                             // title: 'Thank you!',
                             text: '{{\Illuminate\Support\Facades\Session::get('error')}}',
                         })
            </script>
            {{\Illuminate\Support\Facades\Session::forget('error')}}
    @endif
@endsection
