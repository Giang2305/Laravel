@extends('layouts.base')

@section('content')

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Liên hệ</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active"> Liên hệ </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Contact Us  -->
<div class="contact-box-main" style="display: flex; justify-content: center; align-items: center; padding: 50px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right" style="width: 100%; max-width: 700px; margin: 20px; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <h2 class="text-center" style="text-align: center; margin-bottom: 20px;">Để lại lời nhắn</h2>
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" style="font-weight: bold;">Tên<span>*</span></label>
                                    <input type="text" class="form-control rounded-input" id="name" name="name" required>
                                    @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" style="font-weight: bold;">Email<span>*</span></label>
                                    <input type="email" class="form-control rounded-input" id="email" name="email" required>
                                    @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone" style="font-weight: bold;">Số điện thoại*</label>
                                    <input type="text" class="form-control rounded-input" id="phone" name="phone" required>
                                    @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comment" style="font-weight: bold;">Lời nhắn</label>
                                    <textarea class="form-control rounded-input" id="comment" name="comment" rows="4" required></textarea>
                                    @error('comment') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="submit-button text-center">
                                    <button class="btn hvr-hover" id="submit" type="submit">Gửi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Contact Us  -->

@endsection
