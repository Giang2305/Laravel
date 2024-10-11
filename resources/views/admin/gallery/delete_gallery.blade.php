@extends('Admin.Layout.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Delete Gallery Image</div>

                <div class="card-body">
                    <p>Bạn có chắc chắn xoá ảnh?</p>
                    <img src="{{ asset('images/' . $gallery->image_path) }}" alt="Gallery Image" style="max-width: 100%; height: auto;">
                    <form action="{{ route('delete_gallery', $gallery->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this gallery image?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xoá</button>
                        <a href="{{ route('all_gallery') }}" class="btn btn-secondary">Huỷ</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
