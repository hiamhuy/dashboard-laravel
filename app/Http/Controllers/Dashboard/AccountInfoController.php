<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountInfoController extends Controller
{
    //
    public function index(){
        return view('app.account-info.index');
    }

    public function edit(Request $request, $id){
        $data = User::find($id);
        $dataUpdate = array(
            'name' => $request->get('displayname'),
            'password' => Hash::make($request->get('passwordNew')),
        );
        $dataUpdate = array_filter($dataUpdate);
        $data->update($dataUpdate);
        if($request -> hasFile('avatar')){
            $request -> file('avatar')->move('storage/user', $request->file('avatar')->getClientOriginalName());
            $data->avatar = $request->file('avatar')->getClientOriginalName();
            $data->save();
        }
        return redirect(route('account-info'))->with('success', 'Update Successfully!');
    }
}