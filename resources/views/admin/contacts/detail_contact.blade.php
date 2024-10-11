@extends('Admin.Layout.master')
@section('content')
<!-- Main -->
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-mail icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Chi tiết liên hệ
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-pencil icon-gradient bg-plum-plate"> </i>
                    Chi tiết đơn liên hệ
                </div>
                <div class="card-body">
                    <div class="position-relative row form-group">
                        <label for="name" class="col-md-2 text-md-right col-form-label">Tên người gửi</label>
                        <div class="col-md-9 col-xl-9">
                            <input readonly name="name" id="name" placeholder="Name" type="text"
                                class="form-control" value="{{ $contact->name }}">
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="email" class="col-md-2 text-md-right col-form-label">Email</label>
                        <div class="col-md-9 col-xl-9">
                            <input readonly name="email" id="email" placeholder="Email" type="text"
                                class="form-control" value="{{ $contact->email }}">
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="phone" class="col-md-2 text-md-right col-form-label">Số điện thoại</label>
                        <div class="col-md-9 col-xl-9">
                            <input readonly name="phone" id="phone" placeholder="Phone" type="text"
                                class="form-control" value="{{ $contact->phone }}">
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="comment" class="col-md-2 text-md-right col-form-label">Nội dung</label>
                        <div class="col-md-9 col-xl-9">
                            <textarea readonly name="comment" id="comment" placeholder="{{$contact->comment}}" type="text"
                                class="form-control" value="{{ $contact->comment }}"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('all_contact') }}" class="btn btn-primary px-5">Trở lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection