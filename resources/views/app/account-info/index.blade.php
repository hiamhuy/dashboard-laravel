@section('title')
Thông tin tài khoản
@endsection
@section('page-id')
account-info
@endsection


@section('main')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
            </ol>
          </nav>
        <div class="card">
            <div class="card-body">
                <form action="./account-info/edit/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                       <div class="form-avatar">
                        <div class="avatar">
                            @if(Auth::user()->avatar != null || Auth::user()->avatar != '')
                                <img id="imgpreview"
                                src="{{ asset('/storage/user/'.Auth::user()->avatar) }}"
                                alt="">
                            @else
                                <img id="imgpreview"
                                src="{{ asset('/storage/user/admin.png') }}"
                                alt="">
                            @endif

                            
                        </div>
                        <input class="form-control mt-3" type="file" name="avatar" id="avatar" accept="image/*,.pdf">
                       </div>
                       
                     </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="displayname" class="form-label">{{ __('login.name',[],'vi') }}</label>
                            <input type="text" name="displayname" class="form-control" id="displayname" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('login.email_address',[],'vi') }}</label>
                            <input type="email" disabled name="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('login.password',[],'vi') }}</label>
                            <div class="fm-pass d-flex flex-row">
                                <div class="fm-p">
                                    <input type="password" disabled name="password" class="form-control" name="password" id="password" value="{{ Auth::user()->password }}">
                                    <i class="fa-regular fa-eye-slash" id="show_psw"></i>
                                </div>
                                <div class="fm-b">
                                    <button data-bs-toggle="tooltip" title="Đổi mật khẩu" type="button" class="btn btn-primary btn-changepass">
                                        <i class="fa-solid fa-arrows-rotate"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 fm-pass d-none">
                            <label for="passwordNew" class="form-label">Mật khẩu mới</label>
                            <input id="passwordNew" type="password" class="form-control @error('password') is-invalid @enderror" name="passwordNew" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-regular fa-floppy-disk"></i> Lưu thay đổi
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

@include('app.layouts.app')