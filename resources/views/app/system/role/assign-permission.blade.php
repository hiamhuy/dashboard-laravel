@extends('app.layouts.app')
@section('title', 'Gán quyền')
@section('page-id','role')

@section('main')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{ route('system.role') }}">Danh sách</a></li>
              <li class="breadcrumb-item active" aria-current="page">Gán quyền</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <h1>Vai trò : {{ $data->name }}</h1>
                 <form action="{{ route('system.role.assign.action',$data->id) }}" method="post">
                    @csrf
                        @foreach($listPers as $item)
                        <div class="form-check">
                            <input class="form-check-input" name="permissions[]" 
                            @if($role_has_p->count() > 0) 
                                @foreach($role_has_p as $r)
                                    @if($r->role_id == $data->id && $r->permission_id == $item->id)
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
                            <a href="{{ route('system.role') }}" class="btn btn-secondary">
                                <i class="fa-solid fa-chevron-left"></i> Trở lại
                            </a>
                        </div>   
                 </form>
            </div>

        </div>
 
@endsection
