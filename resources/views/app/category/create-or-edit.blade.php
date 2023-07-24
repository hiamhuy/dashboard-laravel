@section('title')
Loại bài đăng
@endsection

@section('page-id')
category
@endsection

@section('main')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/dashboard">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="/dashboard/category">Danh sách</a></li>
              <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <div class="row">

                    @if($data != null)
                        <form action="/dashboard/category/update/{{$data->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-3">
                                    <label for="nameEdit" class="form-label">Tên loại</label>
                                    <input type="text" class="form-control" name="nameEdit" id="nameEdit" 
                                            value="{{ $data->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="isActive" class="form-label">Active</label>
                                    <select class="form-select" name="isActive">
                                        @if($data->isActive == 1)
                                            <option value="1" selected>Hiển thị</option>
                                            <option value="2">Ẩn</option>
                                        @elseif($data->isActive == 2)
                                            <option value="1">Hiển thị</option>
                                            <option value="2" selected>Ẩn</option>
                                        @else
                                            <option value="" selected>Chọn...</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="2">Ẩn</option>
                                        @endif
                                      </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-regular fa-floppy-disk"></i> Lưu
                                    </button>
                                    <a href="/dashboard/category" class="btn btn-secondary">
                                        <i class="fa-solid fa-chevron-left"></i> Trở lại
                                    </a>
                                </div>                
                        </form>
                    @else
                        <form action="/dashboard/category/insert" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên loại</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-plus"></i> Thêm
                                    </button>
                                    <a href="/dashboard/category" class="btn btn-secondary">
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
@include('app.layouts.app')