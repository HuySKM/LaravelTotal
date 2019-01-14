<?php

namespace App\Http\Controllers\Auth\Shipper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:shipper')->except('logout');
    }

    /**
     * Phương thức trả về view dùng để đăng nhập cho Shipper
     */
    public function login()
    {
        return view('shipper.auth.login');

    }

    /**
     * Phương thức này dùng để đăng nhập cho Shipper
     * Lấy thông tin từ form có METHOD : POST
     */
    public function loginShipper(Request $request)
    {
        // Validate dữ liệu
        $this->validate($request, array(
            'email' => 'required|email',
            'password' => 'required|min:6'
        ));

        // Đăng nhập
        if (Auth::guard('shipper')->attempt(
            ['email' => $request->email,'password' => $request->password],$request->remember
        ))

        {
            // Nếu đăng nhập thành công thì chuyển hướng về view dashboard của Shipper
            return redirect()->intended(route('shipper.dashboard'));
        }
        // Nếu đăng nhập thất bại thì quay trở về form đăng nhập với giá trị 2 ô input email & remember
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    /**
     * Phương thức này dùng để đăng xuất
     */
    public function logout()
    {
        Auth::guard('shipper')->logout();
        // Chuyển hướng về trang login của Shipper
        return redirect()->route('shipper.auth.login');
    }
}
