@extends('app.layouts.app')
@section('title')
{{ $data? 'Chỉnh sửa': 'Thêm mới' }}
@endsection
@section('page-id','permission')

@section('main')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{ route('system.permission') }}">Danh sách</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $data!=null? 'Chỉnh sửa':'Thêm mới' }}</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <div class="row">

                    @if($data != null)
                        <form action="{{ route('system.permission.update',$data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-3">
                                    <label for="nameEdit" class="form-label">Tên quyền</label>
                                    <input type="text" class="form-control" name="nameEdit" id="nameEdit" 
                                            value="{{ $data->name }}">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-regular fa-floppy-disk"></i> Lưu
                                    </button>
                                    <a href="{{ route('system.permission') }}" class="btn btn-secondary">
                                        <i class="fa-solid fa-chevron-left"></i> Trở lại
                                    </a>
                                </div>                
                        </form>
                    @else
                        <form action="{{ route('system.permission.insert') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên quyền</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-plus"></i> Thêm
                                    </button>
                                    <a href="{{ route('system.permission') }}" class="btn btn-secondary">
                                        <i class="fa-solid fa-chevron-left"></i> Trở lại
                                    </a>
                                </div>                
                        </form>
                    @endif

                </div>
            </div>
        </div>

  </div>
 
@endsection
