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
                        <form action="{{ route('post.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-3">
                                    <div class="thumb object-contain">
                                        @if($data->image != null)
                                            <img id="thumbpreview" src="{{ asset('storage/post/'.$data->image) }}" alt="">
                                        @else
                                            <img id="thumbpreview" src="{{ asset('assets/no-image.jpg') }}" alt="">
                                        @endif
                                        
                                    </div>
                                    <input class="form-control mt-3" type="file" name="e_image" id="image" accept="image/*,.pdf">
                                </div>

                                <div class="mb-3">
                                    <label for="e_name" class="form-label">Tên bài viết</label>
                                    <input type="text" class="form-control" name="e_name" id="name" value="{{ $data->name }}">
                                </div>

                                <div class="mb-3">
                                    <label for="e_slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control" name="e_slug" id="slug" value="{{ $data->slug }}">
                                </div>

                                <div class="mb-3">
                                    <label for="e_title" class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" name="e_title" id="title" value="{{ $data->title }}">
                                </div>

                                <div class="mb-3">
                                    <label for="e_content" class="form-label">Nội dung</label>
                                    <textarea name="e_content" class="form-control" id="content" cols="30" rows="10">
                                        {{ $data->content }}
                                    </textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="e_type" class="form-label">Loại bài viết</label>
                                    <select class="form-select" name="e_type">
                                        @foreach($type as $value)
                                            @if($data->type == $value->id)
                                            <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                                            @else
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>

                                            @endif
                                        @endforeach
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
                        <form action="{{ route('post.insert') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="e_slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control" name="e_slug" id="slug">
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