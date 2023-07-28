@section('title')
Đăng bài
@endsection

@section('page-id')
post
@endsection

@section('main')

   <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đăng bài</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-6 d-flex justify-content-start">
                        <form action="/dashboard/post" method="GET">
                            <div class="f-search">
                                <input type="search" name="searchData" class="form-control" id="search-table" placeholder="enter search...">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                        </form>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <a href="post/create/0" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i> Thêm mới
                        </a>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" style="width:60px">#</th>
                                <th scope="col" style="width:120px">Hình ảnh</th>
                                <th scope="col">Tên bài viết</th>
                                <th scope="col" style="width:200px">Slug</th>
                                <th scope="col" style="width:150px">Kiểu bài viết</th>
                                <th scope="col" style="width:100px">Trạng thái</th>
                                <th scope="col" style="width:150px">Ngày tạo</th>
                                <th scope="col" style="width:120px"></th>
                              </tr>
                            </thead>
                            <tbody>
                                @if($data->count() > 0)
                                    @foreach( $data as $index => $val)
                                        <tr>
                                            <th style="width:60px" scope="row">{{ $index + $data->firstItem() }}</th>
                                            <td style="width:120px">
                                                <div class="thumb-wrapper object-cover">
                                                    @if($val->image != null)
                                                        <img src="{{ asset('storage/post/'.$val->image) }}" alt="">
                                                    @else
                                                        <img src="{{ asset('assets/no-image.jpg') }}" alt="">
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ $val->name }}</td>

                                            <td style="width:200px"> {{ $val->slug }} </td>

                                            <td style="width:150px">
                                                {{ $val->name_category }}
                                            </td>
                                            
                                            <td style="width:100px">
                                                @if($val->status == 1)
                                                <span class="badge bg-primary">Hiển thị</span>
                                                @else
                                                <span class="badge bg-secondary">Ẩn</span>
                                                @endif
                                            </td>

                                            <td style="width:150px">{{ $val->created_at->format('d/m/Y')}}</td>
                                            
                                            <td style="width:120px">
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuAction" data-bs-toggle="dropdown" aria-expanded="false">
                                                      Hành động
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuAction">
                                                        <a class="dropdown-item" href="{{ route('post.edit', $val->id) }}"><i class="fa-regular fa-pen-to-square"></i> Sửa</a>
                                                        <a class="dropdown-item" href="{{ route('post.delete', $val->id) }}" data-confirm-delete="true"><i class="fa-regular fa-trash-can"></i> Xóa</a>
                                                    </ul>
                                                </div>
                                              
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10">Không có dữ liệu ...</td> 
                                    </tr>
                                @endif
                            </tbody>
                          </table>
                    </div>
                    <div class="col-12">
                        <nav class="d-flex justify-content-end align-items-center">
                            @if($data->count() > 0)
                                <div class="fw-bold fs-6">Tổng: {{$data->count().' / '.$data->total() }} bản ghi</div>
                                <div class="p-3">
                                        {{ $data->links() }}
                                </div>
                            @endif
                        </nav>
                  </div>
                </div>
                
            </div>
        </div>
    </div>

@endsection


@include('app.layouts.app')

