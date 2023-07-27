@extends('app.layouts.app')
@section('title', 'Permissions')
@section('page-id', 'permissions')

@section('main')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6 d-flex justify-content-start">
                    <form action="/dashboard/category" method="GET">
                        <div class="f-search">
                            <input type="search" name="searchData" class="form-control" id="search-table" placeholder="enter search...">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </form>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a href="category/create/0" class="btn btn-primary">
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
                            <th scope="col">Tên kiểu</th>
                            <th scope="col" style="width:100px">Trạng thái</th>
                            <th scope="col" style="width:150px">Ngày tạo</th>
                            <th scope="col" style="width:120px">Hành động</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if($permissions->count() > 0)
                                @foreach($permissions as $index => $data)
                                    <tr>
                                        <th style="width:60px" scope="row">{{ $index + $data->firstItem() }}</th>
                                        <td>{{ $data->name }}</td>
                                        <td style="width:120px">
                                            <a href="">Sửa</a> |
                                            <a href="" data-confirm-delete="true">Xóa</a>
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
                        @if($permissions->count() > 0)
                            <div class="fw-bold fs-6">Tổng: {{$permissions->count().' / '. $permissions->total() }} bản ghi</div>
                            <div class="p-3">{{ $permissions->links() }}</div>
                        @endif
                    </nav>
              </div>
           </div>

        </div>
    </div>
</div>

@endsection