@extends('Admin.Layout.master')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-photo-gallery icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Quản lý thư viện ảnh
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="row">
                <div class="col-md-12">

                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('all_gallery') }}" class="btn btn-warning float-end">Trở về</a>
                            <h4 style="margin-left: 20px">Sửa ảnh thư viện</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update_gallery', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label>Loài hoa</label>
                                    <select name="brand_id" class="form-control">
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $gallery->brand_id == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Chọn ảnh mới tại đây</label>
                                    <input type="file" name="image" class="form-control" />
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Hoàn thành</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
        </div>
</div>
@endsection