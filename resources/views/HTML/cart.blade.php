
@extends('HTML.layout')
@section('content')
    <div class="show_cart">
        <div class="container">
            <div class="title">
                <span class="shop">
                    <span>An dược </span> | <span>Giỏ hàng</span>
                </span>
            </div>
                @if($list_product->count()>0)
                <div class="cart-info">
                    <div class="row">
                        <div class="col-md-9 cart-pop" style="background: white">
                            @foreach($list_product as $value)
                            <div class="row">
                                 <div class="col-md-9">
                                     <div class="row">
                                         <div class="col-md-4">
                                             <img src="{{getUrlImageMain($value->products_cart->pro_picture)}}">
                                         </div>
                                         <div class="col-md-8">
                                             <p class="text-name-product" style="color: blue">{{$value->products_cart->pro_name}}</p>
                                             <div class="delete" data-id="{{$value->pro_id}}"><h5>Xóa</h5></div>
                                         </div>
                                     </div>
                                 </div>
                                <div class="col-md-3">
                                    <div class="col-md-6">
                                        <h5 class="price">{{number_format($value->products_cart->pro_price)}}</h5>
                                    </div>
                                    <div class="col-md-6 change">
                                        <button data-id="{{$value->pro_id}}" class="decrease">-</button>
                                        <input type="number" value="{{$value->quantity}}" class="number-input" min="1">
                                        <button data-id="{{$value->pro_id}}" class="increase">+</button>
{{--                                        <input class="count_product" value="{{$value->quantity}}" readonly>--}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="col-md-3">
                            <div class="col-md-12 total_price">
                                <span class="text_sum">Tổng tiền:</span>
                                <span class="number_sum">{{number_format($total_price)}} VNĐ</span>
                            </div>
                            <div class="col-md-12 buy_cart">
                                <button>Mua Hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="cart_null">
                    <div class="image_cart">
                        <img src="/image/empty_cart.jpg" style="margin-left: 360px;">
                    </div>
                    <div>
                        <p class="text_cart">Không có sản phẩm nào trong giỏ hàng của bạn!</p>
                    </div>
                    <div class="redirect">
                        <a class="btn btn-info" href="{{url('')}}">Tiếp tục mua sắm</a>
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection
@section('footer')
    <link rel="stylesheet" href="js/sweetalert2.min.css">
    <script src="js/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function(){

            // order product
            $('.delete').click(function () {
                var id_product = $(this).data('id');;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:'{{url('ajax/delete')}}',
                    data:
                        {
                            masanpham:id_product
                        },
                    success:function (data) {
                        if(data)
                        {
                            Swal.fire({
                                icon: 'success',
                                // title: 'Thank you!',
                                text: 'Xóa sản phẩm trong giỏ hàng  thành công!',
                            })
                            window.location.href = "{{url('cart')}}";
                        }
                    },
                });
            });
            var number_product_cart = $('.text-number-product').html();

            $('.increase').click(function () {
                var id_product = $(this).data('id');;
                var valueinput = $(this).parents().children('.number-input').val();
                // alert(valueinput);
                valueinput++;
                $(this).parents().children('.number-input').val(valueinput);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:'{{url('ajax/update')}}',
                    data:
                        {
                            masanpham:id_product,
                            soluong:valueinput
                        },
                    success:function (data) {
                        if(data)
                        {
                            window.location.href = "{{url('cart')}}";
                        }

                    },

                });

            });
            $('.decrease').click(function () {
                var valueinput = $(this).parents().children('.number-input').val();
                if(valueinput >=2)
                {

                    valueinput--;
                    $(this).parents().children('.number-input').val(valueinput);
                    var id_product = $(this).data('id');;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:'{{url('ajax/update')}}',
                        data:
                            {
                                masanpham:id_product,
                                soluong:valueinput
                            },
                        success:function (data) {
                            if(data)
                            {
                                window.location.href = "{{url('cart')}}";
                            }

                        },

                    });
                }

            });


        });
    </script>
@endsection

