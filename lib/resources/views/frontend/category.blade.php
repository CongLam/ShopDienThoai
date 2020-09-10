@extends('frontend/master/master')
@section('title', 'Danh mục sản phẩm')
@section('main')
	<link rel="stylesheet" href="css/category.css">
    <div id="wrap-inner">
        <div class="products">
            <h3>{{ $cateName->cate_name }}</h3>
            <div class="product-list row">
                @foreach ($productCate as $prod)
                <div class="product-item col-md-3 col-sm-6 col-xs-12">
                    <a href="#"><img src="{{ asset('lib/storage/app/avatar/'.$prod->product_img) }}" class="img-thumbnail"></a>
                        <p><a href="#">{{ $prod->product_name }}</a></p>
                        <p class="price">{{ number_format($prod->product_price, 0, ',','.') }}VNĐ</p>
                        <div class="marsk">
                            <a href="{{ asset('detail/'.$prod->product_id.'/'.$prod->product_slug.'.html') }} ">Xem chi tiết</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="pagination">
            {{ $productCate->links() }}
        </div>
    </div>
@endsection

