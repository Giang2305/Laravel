@extends('layouts.base')
@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Thông tin sản phẩm</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Thông tin sản phẩm</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img style="height: 320px; object-fit: cover" class="d-block w-100" src="{{asset('images')}}/{{$product->image}}"> </div>
                            @if ($product->images)
                            @php
                                $images = explode(',',$product->images);
                            @endphp
                            @foreach ($images as $image)
                            <div class="carousel-item"> <img  style="height: 320px; object-fit: cover" class="d-block w-100" src="{{asset('images')}}/{{$image}}"> </div>
                            @endforeach
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					</a>
                    <br>
                        <ol class="carousel-indicators">
                        @if ($product->images)
                            @php
                                $images = explode(',',$product->images);
                            @endphp
                            @foreach ($images as $image)
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img style="height: 84px; width: 84px; object-fit: cover" class="d-block w-100 img-fluid" src="{{asset('images')}}/{{$image}}"/>
                            </li>
                            @endforeach
                        @endif
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{$product->name}}</h2>
                        <h5>{{$product->price}}</h5>
                        <p class="available-stock"><span>
                            @if($product->stock_status=='instock')
                                Trạng thái: Còn hàng
                            @else
                                Trạng thái: Hết hàng
                            @endif
                        </span><p>
						<h4>Mô tả:</h4>
						<p>{{$product->description}}</p>
                        <ul>
							<li>
								<div class="form-group quantity-box">
									<label class="control-label">Số lượng</label>
									<input class="form-control" id="quantity" value="1" min="1" type="number">
								</div>
							</li>
						</ul>

						<div class="price-box-bar">
							<div class="cart-and-bay-btn">
                                <a href="javascript:void(0)" onclick="addToCart()" id="cardEffect" class="btn btn-solid hover-solid btn-animation">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span style="font-weight: bold; height: 44px" class="btn hvr-hover" data-fancybox-close=""><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</span>
                                    <form id="addtocart" method="post" action="{{route('cart.store')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="hidden" name="quantity" id="qty" value="1">
                                    </form>
                                </a>
                                <a class="btn hvr-hover" href="#" onclick="addProductToWishlist({{$product->id}},'{{$product->name}}',1,{{$product->price}})"><i class="fas fa-heart"></i> Thêm vào mục yêu thích</a>
							</div>                      
						</div>		
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <br><br>
                        <h1>Sản phẩm khác</h1>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                    @foreach ($rproducts as $rproduct)
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img style="height: 273px; object-fit: cover" src="{{asset('images')}}/{{$rproduct->image}}" class="img-fluid">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="{{route('shop.product.details',['slug'=>$product->slug])}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a class="wishlist" href="javascript:void(0)" onclick="addProductToWishlist({{$product->id}},'{{$product->name}}',1,{{$product->price}})" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="{{route('shop.product.details',['slug'=>$rproduct->slug])}}" style="display: block; font-size: 15px">Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <a href="{{route('shop.product.details',['slug'=>$rproduct->slug])}}">{{$rproduct->name}}</a>
                                    <h5>{{$rproduct->price}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
    <script>
        function addToCart() {
            let quantity = document.getElementById('quantity').value;
            document.getElementById('qty').value = quantity;
            document.getElementById('addtocart').submit();
        }
        function addProductToWishlist(id,name,quantity,price){
            $.ajax({
                type:'POST',
                url:"{{route('wishlist.store')}}",
                data:{
                    "_token":"{{ csrf_token() }}",
                    id:id,
                    name:name,
                    quantity:quantity,
                    price:price
                },
                success:function(data){
                    if(data.status == 200){
                        getCartWishlistCount();
                        $.notify({
                            icon:"fa fa-check",
                            title:"Thành công!",
                            message:"Sản phẩm đã được thêm vào mục yêu thích!"
                        });
                    }
                }
            });
       } 

       function getCartWishlistCount(){
        $.ajax({
            type:"GET",
            url:"{{route('shop.cart.wishlist.count')}}",
            success:function(data){
                if(data.status==200){
                    $("#cart-count").html(data.cartCount);
                    $("#wishlist-count").html(data.wishlistCount);
                }
            }
        })
       }
    </script>
@endsection