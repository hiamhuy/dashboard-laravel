@section('title')
Đăng bài
@endsection

@section('page-id')
post_type
@endsection

@section('main')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/dashboard">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="/dashboard/post">Danh sách</a></li>
              <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <div class="row">

                    @if($data != null)
                        <form action="/dashboard/post/update/{{$data->id}}" method="post" enctype="multipart/form-data">
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
                                    <a href="/dashboard/post" class="btn btn-secondary">
                                        <i class="fa-solid fa-chevron-left"></i> Trở lại
                                    </a>
                                </div>                
                        </form>
                    @else
                        <form action="/dashboard/post/insert" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="mb-3">
                                    <div class="thumb object-contain"><img id="thumbpreview" src="{{ asset('/assets/no-image.jpg') }}" alt=""></div>
                                    <input class="form-control mt-3" type="file" name="image" id="image" accept="image/*,.pdf">
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên bài viết</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>

                                <div class="mb-3">
                                    <label for="title" class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>

                                <div class="mb-3">
                                    <label for="content" class="form-label">Nội dung</label>
                                    <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Loại bài viết</label>
                                    <select class="form-select" name="type">
                                        <option value="0" selected>Chọn...</option>
                                        @foreach($type as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                      </select>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-plus"></i> Thêm
                                    </button>
                                    <a href="/dashboard/post" class="btn btn-secondary">
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