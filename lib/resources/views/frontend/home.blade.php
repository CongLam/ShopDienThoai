@extends('frontend/master/master')
@section('title', 'Trang chủ')
@section('main')
    <div id="wrap-inner">
        <div class="products">
            <h3>Sản phẩm nổi bật</h3>
            <div class="product-list row">
                @foreach ($featuredProduct as $item)
                    <div class="product-item col-md-3 col-sm-6 col-xs-12">
                        <a href="#"><img src="{{ asset('lib/storage/app/avatar/'.$item->product_img) }}" class="img-thumbnail"></a>
                        <p><a href="#">{{ $item->product_name }}</a></p>
                        <p class="price">{{ number_format($item->product_price, 0, ',','.') }}VNĐ</p>
                        <div class="marsk">
                            <a href="{{ asset('detail/'.$item->product_id.'/'.$item->product_slug.'.html') }} ">Xem chi tiết</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="products">
            <h3>sản phẩm mới</h3>
            <div class="product-list row">
                @foreach ($newProduct as $item)
                    <div class="product-item col-md-3 col-sm-6 col-xs-12">
                        <a href="#"><img src="{{ asset('lib/storage/app/avatar/'.$item->product_img) }}" class="img-thumbnail"></a>
                        <p><a href="#">{{ $item->product_name }}</a></p>
                        <p class="price">{{ number_format($item->product_price, 0, ',','.') }}VNĐ</p>
                        <div class="marsk">
                            <a href="{{ asset('detail/'.$item->product_id.'/'.$item->product_slug.'.html') }}">Xem chi tiết</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

