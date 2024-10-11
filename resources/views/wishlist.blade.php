@extends("layouts.base")
@section("content")
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Mục yêu thích</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Mục yêu thích</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Wishlist  -->
    <div class="wishlist-box-main">
        <div class="container">
            @if($items->count() > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Đặt mua</th>
                                    <th>Xoá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="{{route('shop.product.details',['slug'=>$item->model->slug])}}">
									<img class="img-fluid" src="{{asset('images')}}/{{$item->model->image}}" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="{{route('shop.product.details',['slug'=>$item->model->slug])}}">
									{{$item->model->name}}
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>${{$item->model->price}}</p>
                                    </td>
                                    @if($item->model->stock_status == "instock")
                                        <td class="quantity-box">In Stock</td>
                                    @else
                                        <td class="quantity-box">Stock Out</td>
                                    @endif
                                    <td class="add-pr">
                                        @if($item->model->stock_status == 'instock')
                                        <a class="btn hvr-hover icon" onclick="moveToCart('{{$item->rowId}}')" href="javascript:void(0)">Add to Cart</a>
                                        @else
                                        <a class="btn hvr-hover icon disabled" href="javascript:void(0)">Add to Cart</a>
                                        @endif
                                    </td>
                                    <td class="remove-pr">
                                        <a href="javascript:void(0)" class="icon" onclick="removeFromWishlist('{{$item->rowId}}')">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="cold-md-12 text-end">
                    <a href="javascript:void(0)" onclick="clearWishlist()" style="color: red; text-decoration: underline !important;">Xoá danh sách</a>
                </div>
            </div>
            @else
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>Danh sách mục đang trống</h2>
                        <a href="{{route('shop.index')}}" class="btn btn-warning mt-5">Thêm ngay</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- End Wishlist -->
<form id="deleteFromWishlist" action="{{route('wishlist.remove')}}" method="POST">
    @csrf
    @method('delete')
    <input type="hidden" id="rowId"  name="rowId">
</form>

<form id="clearWishlist" action="{{route('wishlist.clear')}}" method="POST">
    @csrf
    @method('delete')
</form>
<form id="moveToCart" action="{{route('wishlist.move.to.cart')}}" method="POST">
    @csrf
    <input type="hidden" name="rowId" id="mrowId">
</form>
@endsection

@push('scripts')
    <script>
        function removeFromWishlist(rowId){
            $("#rowId").val(rowId);
            $("#deleteFromWishlist").submit();
        }

        function clearWishlist(){
            $("#clearWishlist").submit();
        }

        function moveToCart(rowId){
            $("#mrowId").val(rowId);
            $("#moveToCart").submit();
        }
    </script>
@endpush