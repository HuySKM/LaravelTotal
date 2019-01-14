<?php

namespace App\Http\Controllers;

use App\Model\ShipperModel;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    /**
     * Hàm khởi tạo của Class được chạy ngay khi khởi tạo đối tượng
     * Hàm này nó luôn được chạy trước các hàm khác trong Class
     * SellerController Constructor
     */
    public function __construct()
    {
        $this->middleware('auth:shipper')->only('index');
    }
    /**
     * Phương thức trả về view khi Shipper đăng nhập thành công
     */
    public function index()
    {
        return view('shipper.dashboard');

    }

    /**
     * Phương thức trả về view dùng để đăng ký tài khoản Shipper
     */
    public function create()
    {
        return view('shipper.auth.register');

    }

    public function store(Request $request)
    {
        // Validate dữ liệu được gửi từ form đi
        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ));

        // Khởi tạo Model để lưu Shipper mới
        $shipperModel = new ShipperModel();
        $shipperModel->name = $request->name;
        $shipperModel->email = $request->email;
        $shipperModel->password = bcrypt($request->password);
        $shipperModel->save();

        return redirect()->route('shipper.auth.login');
    }
}
