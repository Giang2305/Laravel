@extends('admin.Layout.master')
@section('content')
<!-- Main -->
                <div class="app-main__inner">

                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>
                                    User
                                    <div class="page-title-subheading">
                                        View, create, update, delete and manage.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <form method="post" action="{{ route('create_user') }}">
                                        {{ csrf_field() }}
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-2 text-md-right col-form-label">Tên người dùng</label>
                                            <div class="col-md-9 col-xl-9">
                                                <input required name="name" id="name" placeholder="Tên người dùng" type="text" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="email" class="col-md-2 text-md-right col-form-label">Email</label>
                                            <div class="col-md-9 col-xl-9">
                                                <input required name="email" id="email" placeholder="Email" type="email" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="password" class="col-md-2 text-md-right col-form-label">Password</label>
                                            <div class="col-md-9 col-xl-9">
                                                <input required name="password" id="password" placeholder="Password" type="password" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="product_category_id" class="col-md-2 text-md-right col-form-label">Danh mục</label>
                                            <div class="col-md-9 col-xl-8">
                                                <select required name="category_id" id="product_category_id" class="form-control">
                                                    <option value="">-- Danh mục --</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group mb-1">
                                            <div class="col-md-9 col-xl-8 offset-md-2">
                                                <a href="{{ URL::to('/admin/users') }}" class="border-0 btn btn-outline-danger mr-1">
                                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                                        <i class="fa fa-times fa-w-20"></i>
                                                    </span>
                                                    <span>Huỷ</span>
                                                </a>
                                                <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                                        <i class="fa fa-download fa-w-20"></i>
                                                    </span>
                                                    <span>Lưu</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->
    @endsection