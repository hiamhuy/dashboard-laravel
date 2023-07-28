@extends('app.layouts.app')
@section('title', 'Role')
@section('page-id', 'role')
@section('main')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6 d-flex justify-content-start">
                    <form action="{{ route('system.user') }}" method="GET">
                        <div class="f-search">
                            <input type="search" name="searchData" class="form-control" id="search-table" placeholder="enter search...">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" style="width:60px">#</th>
                            <th scope="col" style="width:100px">Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col" style="width:150px">Trạng thái</th>
                            <th scope="col" style="width:120px">Vai trò</th>
                            <th scope="col" style="width:120px"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @if($data->count() > 0)
                                @foreach($data as $index => $dt)
                                    <tr>
                                        <th style="width:60px" scope="row">{{ $index + $data->firstItem() }}</th>
                                        <td style="width:100px">{{$dt->name }}</td>
                                        <td >
                                            {{ $dt->email }}
                                        </td>
                                        <td style="width:150px">

                                        </td>
                                        <td style="width:120px">

                                        </td>

                                        <td style="width:120px">
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuAction" data-bs-toggle="dropdown" aria-expanded="false">
                                                  Hành động
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuAction">
                                                    <a class="dropdown-item" href="{{ route('system.user', $dt->id) }}">
                                                        <i class="fa-solid fa-user-gear"></i> Phân quyền
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('system.user', $dt->id) }}">
                                                        <i class="fa-solid fa-user-lock"></i> Khóa tài khoản
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('system.user', $dt->id) }}">
                                                        <i class="fa-solid fa-unlock"></i> Mở tài khoản
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

                        @if($data->count() > 0)
                            <div class="fw-bold fs-6">Tổng: {{$data->count().' / '. $data->total() }} bản ghi</div>
                            <div class="p-3">{{ $data->links() }}</div>
                        @endif
                     
                    </nav>
              </div>
           </div>

        </div>
    </div>
</div>

@endsection