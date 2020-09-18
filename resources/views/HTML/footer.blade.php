
</div>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="header-footer">
                <div class="col-sm-3">
                    <div class="logo-footer">
                        <img src="{{url('image/logo_header.png')}}" alt="logo_footer" title="Logo footer">
                        <h3 class="address">
                            102 Thái Thinh, Đống Đa, Hà Nội
                        </h3>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="menu-footer-product">
                        <ul>
                            <li>
                                <h5>
                                    <a href="#" tittle="Thực phẩm chức năng">
                                        <span>Thực phẩm chức năng</span>
                                    </a>
                                </h5>
                                <a href="#" title="TPCN - giảm cân"><span>TPCN - giảm cân</span></a>
                                <a href="#" title="TPCN - Nở ngực"><span>TPCN - Nở ngực</span></a>
                            </li>
                            <li>
                                <h5>
                                    <a href="#" tittle="Mỹ phẩm làm đẹp">
                                        <span>Mỹ phẩm làm đẹp</span>
                                    </a>
                                </h5>
                                <a href="#" title="Mỹ phẩm làm đẹp da"><span>Mỹ phẩm làm đẹp da</span></a>
                                <a href="#" title="Mỹ phẩm trang điểm"><span>Mỹ phẩm trang điểm</span></a>
                            </li>
                            <li>
                                <h5>
                                    <a href="#" tittle="Sức khỏe tình dục">
                                        <span>Sức khỏe tình dục</span>
                                    </a>
                                </h5>
                                <a href="#" title="Ngừa thai"><span>Ngừa thai</span></a>
                                <a href="#" title="Tăng cường sinh lý"><span>Tăng cường sinh lý</span></a>
                            </li>
                            <li>
                                <h5>
                                    <a href="#" tittle="Nhân sâm hồng sâm">
                                        <span>Nhân sâm hồng sâm</span>
                                    </a>
                                </h5>
                                <a href="#" title="Nhân sâm"><span>Nhân sâm</span></a>
                                <a href="#" title="Hồng sâm"><span>Hồng sâm</span></a>
                            </li>
                            <li>
                                <h5>
                                    <a href="#" tittle="Nhân sâm hồng sâm">
                                        <span>Nhân sâm hồng sâm</span>
                                    </a>
                                </h5>
                                <a href="#" title="Chăm sóc chấn thương - Sơ cứu"><span>Chăm sóc chấn thương - Sơ cứu</span></a>
                                <a href="#" title="Nhiệt kế"><span>Nhiệt kế</span></a>
                            </li>
                            <li>
                                <h5>
                                    <a href="#" tittle="Các sản phẩm theo bệnh">
                                        <span>Các sản phẩm theo bệnh</span>
                                    </a>
                                </h5>
                                <a href="#" title="Bổ Tổng Hợp"><span>Bổ Tổng Hợp</span></a>
                                <a href="#" title="Bổ Não"><span>Bổ Não</span></a>
                            </li>
                            <li>
                                <h5>
                                    <a href="#" tittle="Mẹ và bé">
                                        <span>Mẹ và bé</span>
                                    </a>
                                </h5>
                                <a href="#" title="Cho bé"><span>Cho bé</span></a>
                                <a href="#" title="Cho mẹ"><span>Cho mẹ</span></a>
                            </li>
                            <li>
                                <h5>
                                    <a href="#" tittle="Thực phẩm đồ uống">
                                        <span>Thực phẩm đồ uống</span>
                                    </a>
                                </h5>
                                <a href="#" title="Các loại hạt"><span>Các loại hạt</span></a>
                                <a href="#" title="kẹo"><span>kẹo</span></a>
                            </li>
                            <li>
                                <h5>
                                    <a href="#" tittle="Hàng tiêu dùng">
                                        <span>Hàng tiêu dùng</span>
                                    </a>
                                </h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <p>
                © Copyright 2006-2020
            </p>
        </div>
    </div>
    <div class="infor-cart-footer">
        <ul>
            <li class="cart-footer">
                <div class="icon-cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="text-cart-footer">
                    <span>Giỏ hàng</span>
                </div>
                <div class="number-cart-footer">
                    <span>
                        @if(isset($cart))
                            {{count($cart->toArray())}}
                        @else
                            0
                        @endif
                    </span>
                </div>
            </li>
            <li class="user-footer">
                <div class="icon-user">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="text-user">
                    <span>Tài khoản</span>
                </div>
            </li>
            <li class="like-footer">
                <div class="icon-like">
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                </div>
                <div class="text-like">
                    <span>Yêu thích</span>
                </div>
            </li>
            <li class="view-footer">
                <div class="icon-view">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
                <div class="text-view">
                    <span>Đã xem</span>
                </div>
            </li>
        </ul>
    </div>
</div>
</body>

<script src="js/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="js/jquery/jquery-3.2.1.min.js"></script>
<script src="js/animsition/js/animsition.min.js"></script>

<script src="js/bootstrap/js/popper.js"></script>
<script src="js/bootstrap/js/bootstrap.min.js"></script>


<script src="js/select2/select2.min.js"></script>
<script src="js/daterangepicker/moment.min.js"></script>

<script src="js/daterangepicker/daterangepicker.js"></script>
<script src="js/countdowntime/countdowntime.js"></script>
<script src="js/main.js"></script>
@yield('footer')
<script>
    $(document).ready(function($) {
        $(".a-menu-detail").on('click',function () {
            var idCategory = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'{{url('ajax/getproduct')}}',
                data:
                    {
                        idCategory:idCategory,
                    },
                success:function (data) {
                    $('.list-product').html(data);
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
        // $('.test_input').on('click',function () {
        //     $(this).css("border","none");
        // });
    });
</script>
</html>




