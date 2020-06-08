<?php 
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller{


	public function login() {

		return view('auth.login');
	}

	public function postLogin(Request $request) {

		if(Auth::guard('admin')->attempt($request->only('username','password'), $request->has('remember'))) {
			
				return redirect()->route('backend.home')->with('success','Chào mừng trở lại');
		}
		else {
			return redirect()->back()->with('error','Sai tên đăng nhập hoặc mật khẩu');
		}
	}

	public function logout() {

		Auth::guard('admin')->logout();
		return redirect()->route('backend.login');
	}
}

?>