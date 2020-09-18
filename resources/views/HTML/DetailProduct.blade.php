@php
    $a = json_decode($inforProduct["pro_picture"]);
    $array_img = array();
    foreach ($a as $value)
    {
     array_push($array_img,getUrlPicture($value->name));
    }

@endphp
@extends('HTML.layout')
@section('header')
    <meta id="metaDes" name="description" content="Sản phẩm {{$inforProduct->pro_name}} hiện đã có mặt tại cửa hàng của hiệu thuốc An Dược, sản phẩm có rất nhiều tác dụng đối với mọi lứa tuổi, sản phẩm được điều chế từ các loại thảo dược có nguồn gốc 100% từ thiên nhiên" />
    <meta id="metakeywords" name="keywords" content="teen viet nam, giới trẻ, xu hướng, âm nhạc, xem phim, đời sống, hàng hiệu, chuyện lạ, thời trang trẻ, mới lớn, đang yêu, sành điệu, chuyện cười, khéo tay, các sao, chăm sóc tận tình, sức khỏe" />
    <title>Sản Phẩm: {{$inforProduct->pro_name}}</title>
    <link rel="canonical" href="{{URL::current()}}"/>
@endsection()
@section('content')
    <style>
        button.button-search {
            padding-bottom: 4px;
        }
        </style>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="tittle-page">
                <ul>
                    <li>
                        <a href="#" title="Trang chủ">
                            <span>Trang chủ</span>
                        </a>
                    </li>

                    <li>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <a href="{{url($inforCategoryParent["cat_rewrite"])}}" title="Thực phẩm chức năng">
                            <h3>{{$inforCategoryParent["cat_name"]}}</h3>
                        </a>
                    </li>

                    <li>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <a href="{{url($inforCategory["cat_rewrite"])}}" title="TPCN - giảm cân">
                            <h3>{{$inforCategory["cat_name"]}}</h3>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="detail-product">
                <div class="col-sm-5">
                    <div class="images-product">
                        <div class="slider-for" >
                            @foreach($array_img as $value)
                            <img class="img-responsive" src="{{url($value)}}" title="Avatar chi tiết sản phẩm" alt="Avatar chi tiết sản phẩm">
                            @endforeach
                        </div>
                        <div class="pro-slide-nav">
                            <div class="pro-thumb-slide">
                                @foreach($array_img as $value)
                                    <img class="img-responsive" src="{{url($value)}}" title="Avatar chi tiết sản phẩm" alt="Avatar chi tiết sản phẩm">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 product-infor">
                    <div class="infor-product">
                        <div class="name-product col-sm-12">
                            <h1>
                               {{$inforProduct->pro_name}}
                            </h1>
                        </div>
                        <div class="price-product col-sm-12">
                            <p>
                                {{number_format($inforProduct->pro_price)}}
                            </p>
                        </div>
                        <div class="vote-view col-sm-12">
                            <ul>
                                <li class="rating">
                                <span class="number-rating">
                                    {{$inforProduct->pro_total_reviews}}
                                </span>
                                    <span class="text-rating">
                                    Đánh giá
                                </span>
                                </li>
                                <li class="view">
                                    <sapn class="number-view">
                                        9876
                                    </sapn>
                                    <span class="text-view">
                                    Lượt đã xem
                                </span>
                                </li>
                                <li class="buy">
                                <span class="number-nuy">
                                    70
                                </span>
                                    <span class="text-buy">
                                    Lượt đã mua thành công
                                </span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-12">
                            <div class="inforProduct">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="bold">ID Sản phẩm</td>
                                        <td>{{$inforProduct->pro_id }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Tên sản phẩm</td>
                                        <td>{{$inforProduct->pro_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Thương hiệu</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Xuất xứ</td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 amount">
                            <span class="text-amount">Số lượng</span>
                            <div class="input">
                                <button class="decrease">-</button>
                                <input type="number" value="1" class="number-input" min="1">
                                <button class="increase">+</button>
                            </div>
                            <div class="button_order">
                                <button class="oder">Đặt hàng</button>
                            </div>
                        </div>
                        <div class="col-sm-12 tittle-regis">
                            <span> Đăng ký nhận tư vấn về sản phẩm</span>
                            <form action="#">
                                <div class="line-1">
                                    <input type="text" name="name" value="" placeholder="Họ tên">
                                    <input type="text" name="phone" value="" placeholder="Số điện thoại">
                                </div>
                                <div class="line-2">
                                    <input type="email" name="email" value="" placeholder="Email">
                                    <button type="submit"> Đăng ký tư vấn</button>
                                </div>

                            </form>
                        </div>
                        <div class="support col-sm-12">
                            <div class="tittle-support">
                                Hỗ trợ trực tuyến
                            </div>
                            <div class="tel-support">
                                <div class="support1">
                                    <i class="fa fa-skype" aria-hidden="true"></i>
                                    <p class="tel">Hỗ trợ 1 - <span class="">18008183</span></p>
                                </div>
                                <div class="support2">
                                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                                    <p class="tel">Hỗ trợ 2 - <span class="">0123456789</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detailInfor">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 detail-infor">
                            <p class="tittle"> <span class="detail-tittle">Thông tin chi tiết</span></p>
                        </div>
                        <div class="content">
                           {{ strip_tags(htmlspecialchars_decode($inforProduct->pro_description))}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="ratingStar">
                {{--            để sau làm--}}
            </div>
        </div>
    </div>
</div>
@endsection
@section("footer")
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.0/slick.min.js"></script>--}}
<script src="js/ajax/libs/slick-carousel/1.8.0/slick.min.js"></script>
<link rel="stylesheet" href="js/sweetalert2.min.css">
<script src="js/sweetalert2.min.js"></script>
<script>
     $(document).ready(function(){
         var number_product_cart = $('.text-number-product').html();
         var valueinput = $('.number-input').val();
         $('.increase').click(function () {
             valueinput++;
             $('.number-input').val(valueinput);
         });
         $('.decrease').click(function () {

             if(valueinput >=2)
             {
                 valueinput--;
                 $('.number-input').val(valueinput);
             }

         });
         // order product
         $('.oder').click(function () {
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 type:'POST',
                 url:'{{url('ajax/addcart')}}',
                 data:
                     {
                         number:valueinput,
                         masanpham:{{$inforProduct->pro_id}}
                     },
                 success:function (data) {
                     if(data)
                     {
                         Swal.fire({
                             icon: 'success',
                             // title: 'Thank you!',
                             text: 'Thêm vào giỏ hàng  thành công!',
                         })
                         number_product_cart++;
                         // alert(number_product_cart);
                         $('.text-number-product').html(number_product_cart);
                     }
                     else
                     {
                         Swal.fire({
                             icon: 'error',
                             // title: 'Thank you!',
                             text: 'Vui lòng đăng nhập !',
                         })
                     }
                 },

             });
         });


         $('.slider-for').slick({
             slidesToShow: 1,
             slidesToScroll: 1,
             arrows: false,
             fade: true,
             autoplay: true,
             autoplaySpeed: 3000,
             asNavFor: '.pro-thumb-slide'
         });
         $('.pro-thumb-slide').slick({
             slidesToShow: 3,
             slidesToScroll: 1,
             asNavFor: '.slider-for',
             arrows: false,
             dots: false,
             centerMode: true,
             focusOnSelect: true
         });
         // //
         $(".slick-prev").html("<");
         $(".slick-next").html(">");
     });
</script>
@endsection
