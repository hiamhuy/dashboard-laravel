<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function register(Request $request)
    {
       
        $dataUser = User::where('email', '=', $request->email)->first();
        if($dataUser != null){
           return $this->sendFailedRegisterResponse($request);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->verification_code = sha1(time());
        $user->save();
        if($user != null){
            MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
            alert()->success('Đăng ký thành công!','Chúng tôi đã gửi đến gmail của bạn mã xác thực, hãy xác thực tài khoản để đăng nhập.');
            return redirect()->back();
        }
        alert()->error('Đã có lỗi xảy ra !','Vui lòng kiểm tra lại thông tin.');
        return redirect()->back();
    }

    public function verifyUser(Request $request){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where('verification_code','=', $verification_code)->first();
        if($user != null){
            $user->is_verified = 1;
            $user->save();
            alert()->success('Xác thực thành công!','Bây giờ bạn có thể đăng nhập vào hệ thống.');
            return redirect(route('login'));
        }
        alert()->error('Đã có lỗi xảy ra !','Mã xác thực không hợp lệ.');
        return redirect(route('login'));
    }

    public function sendFailedRegisterResponse(Request $request){

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.email_exist',[],'vi')],
        ]);
    }
    
    public function username()
    {
        return 'email';
    }
}