@extends('app.layouts.app')
@section('title', 'Role')
@section('page-id', 'role')
@section('main')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6 d-flex justify-content-start">
                    <form action="{{ route('system.role') }}" method="GET">
                        <div class="f-search">
                            <input type="search" name="searchData" class="form-control" id="search-table" placeholder="enter search...">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </form>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a href="{{ route('system.role.create') }}" class="btn btn-primary">
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
                            <th scope="col">Tên</th>
                            <th scope="col" style="width:150px">Ngày tạo</th>
                            <th scope="col" style="width:120px"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @if($roles->count() > 0)
                                @foreach($roles as $index => $role)
                                    <tr>
                                        <th style="width:60px" scope="row">{{ $index + $roles->firstItem() }}</th>
                                        <td>{{ $role->name }}</td>
                                        <td style="width:150px">{{ $role->created_at->format('d/m/Y') }}</td>
                                        <td style="width:120px">
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuAction" data-bs-toggle="dropdown" aria-expanded="false">
                                                  Hành động
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuAction">
                                                    
                                                    <a class="dropdown-item" href="{{ route('system.role.assign', $role->id) }}">
                                                        <i class="fa-solid fa-gears"></i> Gán quyền
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('system.role.edit', $role->id) }}">
                                                        <i class="fa-regular fa-pen-to-square"></i> Sửa
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('system.role.delete', $role->id) }}" data-confirm-delete="true">
                                                        <i class="fa-regular fa-trash-can"></i> Xóa
                                                    </a>

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

                        @if($roles->count() > 0)
                        <div class="fw-bold fs-6">Tổng: {{$roles->count().' / '. $roles->total() }} bản ghi</div>
                        <div class="p-3">{{ $roles->links() }}</div>
                      @endif
                     
                    </nav>
              </div>
           </div>

        </div>
    </div>
</div>

@endsection