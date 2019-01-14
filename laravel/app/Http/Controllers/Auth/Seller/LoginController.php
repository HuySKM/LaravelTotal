<?php

namespace App\Http\Controllers\Auth\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:seller')->except('logout');
    }

    /**
     * Phương thức trả về view dùng để đăng nhập cho Seller
     */
    public function login()
    {
        return view('seller.auth.login');

    }

    /**
     * Phương thức này dùng để đăng nhập cho Seller
     * Lấy thông tin từ form có METHOD : POST
     */
    public function loginSeller(Request $request)
    {
        // Validate dữ liệu
        $this->validate($request, array(
            'email' => 'required|email',
            'password' => 'required|min:6'
        ));

        // Đăng nhập
        if (Auth::guard('seller')->attempt(
            ['email' => $request->email,'password' => $request->password],$request->remember
        ))

        {
            // Nếu đăng nhập thành công thì chuyển hướng về view dashboard của Seller
            return redirect()->intended(route('seller.dashboard'));
        }
        // Nếu đăng nhập thất bại thì quay trở về form đăng nhập với giá trị 2 ô input email & remember
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    /**
     * Phương thức này dùng để đăng xuất
     */
    public function logout()
    {
        Auth::guard('seller')->logout();
        // Chuyển hướng về trang login của Seller
        return redirect()->route('seller.auth.login');
    }
}
