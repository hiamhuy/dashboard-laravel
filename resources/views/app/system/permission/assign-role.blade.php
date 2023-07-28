@extends('app.layouts.app')
@section('title', 'Gán vai trò')
@section('page-id','permission')

@section('main')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{ route('system.permission') }}">Danh sách</a></li>
              <li class="breadcrumb-item active" aria-current="page">Gán vai trò</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <h1>Quyền : {{ $data->name }}</h1>
                <form action="{{ route('system.permission.assign.action',$data->id) }}" method="post">
                    @csrf
                        @foreach($listRole as $item)
                        <div class="form-check">
                            <input class="form-check-input" name="roles[]" 
                            @if($role_has_p->count() > 0) 
                                @foreach($role_has_p as $r)
                                    @if($r->permission_id == $data->id && $r->role_id == $item->id)
                                        checked
                                    @endif
                                @endforeach
                            @endif
                            type="checkbox" value="{{ $item->id }}" id="permissionChecked">
                            <label class="form-check-label" for="permissionChecked">
                                {{ $item->name }}
                            </label>
                        </div>

                        @endforeach

                        <div class="mb-3 mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-regular fa-floppy-disk"></i> Lưu
                            </button>
                            <a href="{{ route('system.permission') }}" class="btn btn-secondary">
                                <i class="fa-solid fa-chevron-left"></i> Trở lại
                            </a>
                        </div>   
                 </form>
            </div>

        </div>
 
@endsection
