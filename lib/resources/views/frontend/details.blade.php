@extends('frontend/master/master')
@section('title', 'Chi tiết sản phẩm')
@section('main')
	<link rel="stylesheet" href="css/details.css">
    <div id="wrap-inner">
        <div id="product-info">
            <div class="clearfix"></div>
            <h3>{{ $detailProduct->product_name }}</h3>
            <div class="row">
                <div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
                    <img width="250px" src="{{ asset('lib/storage/app/avatar/'.$detailProduct->product_img) }}">
                </div>
                <div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
                    <p>Giá: <span class="price">{{ number_format($detailProduct->product_price, 0, ',','.') }}</span></p>
                    <p>Bảo hành: {{ $detailProduct->product_warranty }}</p>
                    <p>Phụ kiện: {{ $detailProduct->product_accessories }}</p>
                    <p>Tình trạng: {{ $detailProduct->product_condition }}</p>
                    <p>Khuyến mại: {{ $detailProduct->product_promotion }}<</p>
                    <p>Còn hàng:
                        @if($detailProduct->product_status == 1)
                            Còn hàng
                        @else
                            Hết hàng
                        @endif
                    </p>
                    <p class="add-cart text-center"><a href="#">Đặt hàng online</a></p>
                </div>
            </div>
        </div>
        <div id="product-detail">
            <h3>Chi tiết sản phẩm</h3>
            <p class="text-justify">{!! $detailProduct->product_description !!}</p>
        </div>
        <div id="comment">
            <h3>Bình luận</h3>
            <div class="col-md-9 comment">
                <form method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input required type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Tên:</label>
                        <input required type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="cm">Bình luận:</label>
                        <textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-default">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="comment-list">
            @foreach ($commentsProduct as $com)
                <ul>
                    <li class="com-title">
                       {{ $com->comment_name}}
                        <br>
                        <span>{{ date_format($com->created_at,"d/m/Y H:i:")  }}</span>
                    </li>
                    <li class="com-details">
                        {{ $com->comment_content}}
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection
