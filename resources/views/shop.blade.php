@extends('layouts.base')
@push('style')
    <style>
        .items-center {
            text-align: center !important;
        }
        nav svg{
            height: 20px;
        }
    </style>
@endpush
@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Sản phẩm</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('app.index')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left" style="display: flex">
                                <div class="toolbar-sorter-right" style="margin-right: 5px">
                                    <span>Sắp xếp </span>
                                    <select id="orderby" name="orderby" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                                        <option value="-1" {{$order == -1 ? 'selected':''}}>Mặc định</option>
                                        <option value="1" {{$order == 1 ? 'selected':''}}>Mới đến cũ</option>
                                        <option value="2" {{$order == 2 ? 'selected':''}}>Cũ đến mới</option>
                                        <option value="3" {{$order == 3 ? 'selected':''}}>Giá thấp đến cao</option>
                                        <option value="4" {{$order == 4 ? 'selected':''}}>Giá cao đến thấp</option>
								    </select>
                                </div>
                                
                                <div class="toolbar-sorter-right">
                                    <span>Hiển thị </span>
                                    <select class="selectpicker show-tick form-control" name="size" id="pagesize">
                                        <option value="12" {{ $size == 12 ? 'selected':''}}>12 Sản phẩm một trang</option>
                                        <option value="24" {{$size == 24 ? 'selected':''}}>24 Sản phẩm một trang</option>
                                        <option value="52" {{$size == 52 ? 'selected':''}}>52 Sản phẩm một trang</option>
                                        <option value="100" {{$size == 100 ? 'selected':''}}>100 Sản phẩm một trang</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            @if ($product->is_active)
                                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="products-single fix">
                                                        <div class="box-img-hover">
                                                            <!-- Add inline CSS to set the height of the container div -->
                                                            <div style="height: 200px; overflow: hidden;">
                                                                <!-- Add inline CSS to set the width and height of the image and ensure it fills the container -->
                                                                <img src="images/{{$product->image}}" class="img-fluid" alt="Image" style="width: 100%; height: 100%; object-fit: cover;">
                                                            </div>
                                                            <div class="mask-icon">
                                                                <ul>
                                                                    <li><a href="{{route('shop.product.details',['slug'=>$product->slug])}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                    <li><a class="wishlist" href="javascript:void(0)" onclick="addProductToWishlist({{$product->id}},'{{$product->name}}',1,{{$product->price}})" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                                </ul>
                                                                <a class="cart" href="{{route('shop.product.details',['slug'=>$product->slug])}}" style="display: block; font-size: 15px">Thêm vào giỏ hàng</a>
                                                            </div>
                                                        </div>
                                                        <div class="why-text">
                                                            <a href="{{route('shop.product.details',['slug'=>$product->slug])}}" style="display: block; font-size: 18px">{{$product->name}}</a>
                                                            <h5> {{$product->price}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{$products->links()}}
                    </div>
                </div>
				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <input id="searchInput" class="form-control" placeholder="Tìm kiếm..." type="text">
                            <button id="searchButton" type="button"> <i class="fa fa-search"></i> </button>
                        </div>
                        
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Danh mục sản phẩm</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a style="font-size: 20px;" class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">
                                        Tổng số danh mục
                                        <small class="text-muted">
                                            {{$categories->where('is_active', true)->count()}}
                                        </small>
                                    </a>
                                    
                                        <div class="collapse" id="sub-men1" data-parent="#list-group-men">
                                            <div >
                                                @foreach ($categories as $category)
                                                    @if ($category->is_active)
                                                        <div style="display:flex">
                                                            <input style="margin-left: 30px;" id="ct{{$category->id}}" name="categories" @if(in_array($category->id,explode(',',$q_categories))) checked="checked" @endif value="{{$category->id}}" type="checkbox" onchange="filterProductsByCategory(this)">
                                                            <label class="list-group-item list-group-item-action">{{$category->name}}</label> <small class="text-muted">{{$category->products->count()}}</small></label>      
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Loài hoa</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a style="font-size: 20px;" class="list-group-item list-group-item-action" href="#sub-men3" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men3">
                                        Tổng số loài hoa 
                                        <small class="text-muted">
                                            {{$brands->where('is_active', true)->count()}}
                                        </small>
                                    </a>
                                    
                                    </a>
                                        <div class="collapse" id="sub-men3" data-parent="#list-group-men">
                                            <div >
                                                @foreach ($brands as $brand)
                                                    @if ($brand->is_active)
                                                        <div style="display:flex">
                                                            <input style="margin-left: 30px;" id="br{{$brand->id}}" name="brands" @if(in_array($brand->id,explode(',',$q_brands))) checked="checked" @endif value="{{$brand->id}}" type="checkbox" onchange="filterProductsByBrand(this)">
                                                            <label class="list-group-item list-group-item-action">{{$brand->name}}</label> <small class="text-muted">{{$brand->products->count()}}</small></label>      
                                                        </div>
                                                    @endif
                                                @endforeach

                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="title-left">
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
<form id="frmFilter" method="GET">
    <input type="hidden" name="page" id="page" value="{{$page}}">
    <input type="hidden" name="size" id="size" value="{{$size}}">
    <input type="hidden" name="order" id="order" value="{{$order}}">
    <input type="hidden" name="brands" id="brands" value="{{$q_brands}}">
    <input type="hidden" name="categories" id="categories" value="{{$q_categories}}">
    <input type="hidden" name="prange" id="prange" value="">
</form>
@endsection

@push("scripts")
    <script>
       $(function(){
            $("#pagesize").on("change", function(){
                $("#size").val($("#pagesize option:selected").val());
                $("#frmFilter").submit();
            });
            $("#orderby").on("change", function(){
                    $("#order").val($("#orderby option:selected").val());
                    $("#frmFilter").submit();
            });

            // var $range = $(".js-range-slider");
            // instance = $range.data("ionRangeSlider");
            // instance.update({
            //     from: {{$from}},
            //     to: {{$to}}
            // });
            // $("#prange").on("change",function(){
            //     setTimeout(()=>{
            //         $("#frmFilter").submit();
            //     },1000);
            // });
       });

       function filterProductsByBrand(brand){
            var brands = "";
            $("input[name='brands']:checked").each(function(){
                if(brands==""){
                    brands += this.value;
                }
                else{
                    brands += "," + this.value;
                }
            });
            $("#brands").val(brands);
            $("#frmFilter").submit();
       }

       function filterProductsByCategory(category){
            var categories = "";
            $("input[name='categories']:checked").each(function(){
                if(categories==""){
                    categories += this.value;
                }
                else{
                    categories += "," + this.value;
                }
            });
            $("#categories").val(categories);
            $("#frmFilter").submit();
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
    // Get references to the search input and search button
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');

    // Add event listener to the search button
    searchButton.addEventListener('click', function() {
        // Get the search query entered by the user
        const searchQuery = searchInput.value.toLowerCase();

        // Get all product items
        const productItems = document.querySelectorAll('.products-single');

        // Loop through each product item
        productItems.forEach(function(item) {
            // Get the product name from the item
            const productName = item.querySelector('.why-text a').textContent.toLowerCase();

            // Check if the product name contains the search query
            if (productName.includes(searchQuery)) {
                // Show the product item if it matches the search query
                item.style.display = 'inline-block';
            } else {
                // Hide the product item if it doesn't match the search query
                item.style.display = 'none';
            }
        });
    });
</script>

    
@endpush
