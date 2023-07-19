@section('title')
Post type
@endsection

@section('page-id')
post_type
@endsection

@section('main')
    <div class="container">
        
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Kiểu bài đăng</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6 d-flex justify-content-start">
                        <form action="/" method="POST">
                            <div class="f-search">
                                <input type="search" name="searchData" class="form-control" id="search-table" placeholder="enter search...">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                        </form>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <a href="posttype/create/0" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i> Thêm mới
                        </a>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" style="width:60px">#</th>
                                <th scope="col">Tên kiểu</th>
                                <th scope="col" style="width:100px">Trạng thái</th>
                                <th scope="col" style="width:150px">Ngày tạo</th>
                                <th scope="col" style="width:120px">Hành động</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach( $data as $val)
                                <tr>
                                    <th style="width:60px" scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $val->name }}</td>
                                    <td style="width:100px">
                                        @if($val->isActive == 1)
                                        <span class="badge bg-primary">Hiển thị</span>
                                        @else
                                        <span class="badge bg-secondary">Ẩn</span>
                                        @endif
                                    </td>
                                    <td style="width:150px">{{ $val->created_at->format('d/m/Y')}}</td>
                                    <td style="width:120px">
                                        <a href="./posttype/edit/{{ $val->id }}">Sửa</a> |
                                        <a href="./posttype/delete/{{ $val->id }}">Xóa</a>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination d-flex justify-content-end">
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                  <span aria-hidden="true">&laquo;</span>
                                </a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                  <span aria-hidden="true">&raquo;</span>
                                </a>
                              </li>
                            </ul>
                          </nav>
                    </div>
                </div>
            </div>
        </div>


    </div>
 
@endsection

@include('app.layouts.app')




