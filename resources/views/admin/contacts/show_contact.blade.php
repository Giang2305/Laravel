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
                    Quản lý liên hệ
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                </div>

                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Tên</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Số điện thoại</th>
                                <th class="text-center">Nội dung</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_contact as $contact)
                            <tr>
                                <td class="text-center text-muted">#{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td class="text-center">{{ $contact->email }}</td>
                                <td class="text-center">{{ $contact->phone }}</td>
                                <td class="text-center">{{ Str::limit($contact->comment, 50) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('show_contact', ['id' => $contact->id]) }}" data-toggle="tooltip" title="View"
                                    data-placement="bottom" class="btn btn-outline-primary border-0 btn-sm">
                                        <span class="btn-icon-wrapper opacity-8">
                                            <i class="fa fa-eye fa-w-20"></i>
                                        </span>
                                    </a>
                                    <form action="{{ route('delete_contact', $contact->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Xác nhận xoá liên hệ này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-toggle="tooltip" title="Delete" data-placement="bottom" class="btn btn-hover-shine btn-outline-danger border-0 btn-sm">
                                            <span class="btn-icon-wrapper opacity-8">
                                                <i class="fa fa-trash fa-w-20"></i>
                                            </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-block card-footer">
                    {{ $all_contact->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection