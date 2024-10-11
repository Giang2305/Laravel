@extends('Admin.Layout.master')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Sửa loài hoa
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form method="post" action="{{ route('edit_brand', $brand->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $brand->id }}">

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-2 text-md-right col-form-label">Tên loài hoa</label>
                            <div class="col-md-9 col-xl-9">
                                <input required name="name" id="name" placeholder="Name" type="text"
                                    class="form-control" value="{{ $brand->name }}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="slug" class="col-md-2 text-md-right col-form-label">Tên phụ</label>
                            <div class="col-md-9 col-xl-9">
                                <input required name="slug" id="slug" placeholder="Slug" type="text"
                                    class="form-control" value="{{ $brand->slug }}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="is_active" class="col-md-2 text-md-right col-form-label">Hiển thị</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="is_active" id="is_active_yes" value="1" class="form-check-input" {{ $brand->is_active ? 'checked' : '' }}>
                                        Có
                                    </label>
                                </div>
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="is_active" id="is_active_no" value="0" class="form-check-input" {{ !$brand->is_active ? 'checked' : '' }}>
                                        Không
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="created_by" class="col-md-2 text-md-right col-form-label">Tạo bởi</label>
                            <div class="col-md-9 col-xl-9">
                                <input required name="created_by" id="created_by" placeholder="Create by" type="text" class="form-control" value="{{ $brand->created_by }}">
                            </div>
                        </div>

                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="{{ route('all_brand') }}" class="border-0 btn btn-outline-danger mr-1">
                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                        <i class="fa fa-times fa-w-20"></i>
                                    </span>
                                    <span>Huỷ</span>
                                </a>

                                <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-download fa-w-20"></i>
                                    </span>
                                    <a style="color: white" href="{{ route('all_brand') }}">Lưu</a>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
