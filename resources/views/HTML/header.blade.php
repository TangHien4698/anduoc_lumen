@php
if(\Illuminate\Support\Facades\Session::has('user'))
{
$user = \Illuminate\Support\Facades\Session::get('user');
}
    @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    @yield('header')
    <link rel="stylesheet" href="css/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/cart.css">
    <link rel="stylesheet" href="css/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/DetailProduct.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/search.css">
    <link rel="stylesheet" type="text/css" href="css/category.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.css">
    <link src="css/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="header">
    <div class="container">
        <div class="row row-header">
            <div class="col-sm-3">
                <div class="logo-header">
                    <a href="{{url('')}}" title="logo-trangchu">
                        <img src="{{url('image/logo_header.png')}}" alt="Logo-header" title="Logo header">
                    </a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="search">
                            <form class="form-search" method="GET" action="{{url('search')}}">
{{--                                {{ csrf_field() }}--}}
                                <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm" class="input-search test_input">
                                <input type="hidden" name="page"  value="1" placeholder="Nhập từ khóa tìm kiếm" class="input-search test_input">
                                <button type="submit" class="button-search"><i class="fa fa-search" aria-hidden="true"></i> </button>
                            </form>
                            <div class="text-search">
                                <p class="title-list-key">
                                    Từ khóa phổ biến
                                </p>
                                <p class="list-key">
                                    Giảm cân New Perfer, Rich slim, Tăng cường sinh lý Nam Đế Hoàn
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 action">
                        <div class="action-top">
                            <div class="row">
                                <div class="col-sm-4 notification">
                                    <a href="" style="width: 100%">
                                        <div class="icon">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                            <p class="number-notification">3</p>
                                        </div>
                                        <div class="text-icon">
                                            <p class="text-notification">Thông báo</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-4 account">
                                    <div class="icon">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>

                                        @if (isset($user))
                                        <div class="text-icon login-account" href="{{url('logout')}}">
                                            <p class="account-user">{{$user["name"]}}</p>
                                        </div>
                                            @else
                                        <div  class="text-icon login-account" href="{{url('login')}}">
                                            <p class="text-account">Tài khoản</p>
                                            <p class="text-login">Đăng nhập</p>
                                        </div>
                                            @endif

                                    <div class="login">
                                        @if (isset($user))
                                            <div class="icon-text logout">
                                            <a href="{{url('logout')}}" class="logout"> Logout</a>
                                            </div>
                                        @else
                                            <div class="icon-text google">
                                                <a href="{{url('redirect')}}" class="google"><i class="fa fa-google"></i> Google</a>
                                            </div>
                                            <div class="icon-text facebook">
                                                <a href="" class="facebook"> Facebook</a>
                                            </div>

                                        @endif
                                    </div>
                                </div>


                                    <a href="{{url("cart")}}">
                                        <div class="col-sm-4 cart">
                                        <div class="icon">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        </div>
                                        <div class="text-icon">
                                            <p class="text-cart">Giỏ hàng</p>
                                        </div>
                                        <div class="number-product">
                                            <span class="text-number-product">
                                                @if(isset($cart))
                                                    {{count($cart->toArray())}}
                                                    @else
                                                    0
                                                    @endif
                                            </span>
                                        </div>
                                        </div>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-cuon">
    <div class="container">
        <div class="row row-header">
            <div class="col-sm-3">
                <div class="logo-header">
                    <a href="#" title="logo-trangchu">
                        <img src="{{url('image/logo_header.png')}}" alt="Logo-header" title="Logo header">
                    </a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="search">
                            <div class="form-search">
                                <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm" class="input-search">
                                <button type="submit" class="button-search"><i class="fa fa-search" aria-hidden="true"></i> </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 action">
                        <div class="action-top">
                            <div class="row">
                                <div class="col-sm-4 notification">
                                    <a href="" style="width: 100%" title="Thông báo">
                                        <div class="icon">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                            <p class="number-notification">3</p>
                                        </div>
                                        <div class="text-icon">
                                            <p class="text-notification">Thông báo</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-4 account account-cuon">
                                    <div class="icon">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
{{--                                    <div class="text-icon">--}}
                                        @if (isset($user))
                                            <div  class="text-icon login-account" href="{{url('logout')}}">
                                                <p class="account-user">{{$user["name"]}}</p>
                                            </div>
                                        @else
                                            <div  class="text-icon login-account" href="{{url('login')}}">
                                            <p class="text-account">Tài khoản</p>
                                            <p class="text-login">Đăng nhập</p>
                                            </div>
                                        @endif
{{--                                    </div>--}}
                                    <div class="login login-cuon">
                                        @if (isset($user))
                                            <div class="icon-text logout">
                                                <a href="{{url('logout')}}" class="logout"> Logout</a>
                                            </div>
                                        @else
                                            <div class="icon-text google">
                                                <a href="{{url('redirect')}}" class="google"><i class="fa fa-google"></i> Google</a>
                                            </div>
                                            <div class="icon-text facebook">
                                                <a href="" class="facebook"> Facebook</a>
                                            </div>

                                        @endif
                                    </div>
                                </div>
                                <a href="{{url("cart")}}">
                                <div class="col-sm-4 cart">
                                    <div class="icon">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </div>
                                    <div class="text-icon">
                                        <p class="text-cart">Giỏ hàng</p>
                                    </div>
                                    <div class="number-product">
                                        <span class="text-number-product">
                                        @if(isset($cart))
                                                {{count($cart->toArray())}}
                                            @else
                                                0
                                            @endif</span>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="category">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="tittle-category">
                    <div class="icon-category">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                    <div class="text-category">
                        <h2>DANH MỤC SẢN PHẨM</h2>
                    </div>
                    <div class="col-sm-3 menu sub-category-model">
                        <ul class="list-submenu">
                            @foreach($categoryParent as $valueCategoryParent)
                                <li>
                                    <div class="menusub">
                                        <a href="{{$valueCategoryParent["cat_rewrite"]}}" title="{{$valueCategoryParent["cat_name"]}}"  class="tittle-menu">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            <span class="">{{$valueCategoryParent["cat_name"]}}</span>
                                        </a>
                                        <ul class="submenu" role="menuitem">
                                            <p class="title-submenu">
                                                <a href="{{$valueCategoryParent["cat_rewrite"]}}" title="{{$valueCategoryParent["cat_name"]}}">
                                                    <span> {{$valueCategoryParent["cat_name"]}}</span>
                                                </a>
                                            </p>
                                            @foreach($valueCategoryParent["childs"] as $valueCategoryChild)
                                                    <li role="menuitem">
                                                        <a href="{{$valueCategoryChild["cat_rewrite"]}}" title="{{$valueCategoryChild["cat_name"]}}">
                                                            <span> {{$valueCategoryChild["cat_name"]}}</span>
                                                        </a>
                                                    </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="phone">
                    <div class="icon-category">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="text-category">
                        <p>Hot Line: 08 888 2898</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="tranpost">
                    <div class="icon-category">
                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                    </div>
                    <div class="text-category">
                        <p>Giao hàng toàn quốc</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

