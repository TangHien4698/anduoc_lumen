@extends('HTML.layout')
@section('content')
<div class="section">
    <h1 style="text-align: center">404 </h1>
    <h2 style="text-align: center">   Trang đó không thể tìm thấy! </h2>
    <h3 style="text-align: center">Xin lỗi, nhưng trang bạn đang tìm kiếm không tồn tại</h3>
    <a href="{{url('/')}}" class="return_home" style="padding: 10px 20px;
    border: 1px solid salmon;
    margin-left: 46%;
    background: red;
    color: white;
    font-size: 15px;" >Quay về trang chủ</a>
</div>
@endsection
