@extends('layouts.base')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-user icon-gradient bg-mean-fruit"></i>
                </div>
                <div style="text-align: center; font-size: 30px; padding-top: 20px; padding-bottom: 20px">
                    Tài khoản người dùng
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form method="post" action="{{ route('users.account.update') }}">
                        {{ csrf_field() }}

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Tên tài khoản</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="name" id="name" placeholder="Name" type="text" class="form-control" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                            <div class="col-md-9 col-xl-8">
                                <input required name="email" id="email" placeholder="Email" type="email" class="form-control" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="password" class="col-md-3 text-md-right col-form-label">Mật khẩu</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="password" id="password" placeholder="Password" type="password" class="form-control">
                                <p class="form-text text-muted">*Để trống để giữ nguyên mật khẩu</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2" style="text-align: center; width: 100px">
                                <button style="width: 200px;" type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-save fa-w-20"></i>
                                    </span>
                                    <span>Lưu</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <form style="text-align: center" method="post" action="{{ route('users.account.delete') }}" onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản?');">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <button style="width: 200px; margin-top: 20px"  type="submit" class="btn-shadow btn-hover-shine btn btn-danger">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-trash fa-w-20"></i>
                                    </span>
                                    <span>Xóa tài khoản</span>
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
