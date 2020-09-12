<!-- header -->
<header id="header">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-md-3 col-sm-12 col-xs-12">
                <h1>
                    <a href="{{ asset('/') }}"><img src="img/home/conglam-logo.png" width="98%"></a>
                    <nav><a id="pull" class="btn btn-danger" href="#">
                        <i class="fa fa-bars"></i>
                    </a></nav>
                </h1>
            </div>
            <div id="search" class="col-md-7 col-sm-12 col-xs-12">
                <form action="{{ asset('search/') }}" method="get">
                    <input type="text" name="enterKeyword" placeholder="Nhập từ khóa...">
                    <input type="submit" name="search" value="Tìm Kiếm">
                </form>
            </div>
            <div id="cart" class="col-md-2 col-sm-12 col-xs-12">
                <a class="display" href="{{ asset('cart/show') }}">Giỏ hàng</a>
                <a href="{{ asset('cart/show') }}">{{ Cart::count() }}</a>
            </div>
        </div>
    </div>
</header><!-- /header -->
<!-- endheader -->
