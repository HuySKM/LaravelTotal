<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\ConfigModel;

class ConfigController extends Controller
{
    /**
     * Hàm khởi tạo của Class được chạy ngay khi khởi tạo đối tượng
     * Hàm này nó luôn được chạy trước các hàm khác trong Class
     * AdminController Constructor
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index ()
    {
        $items = ConfigModel::all();
        /**
         * Biến truyền từ Controller xuống View
         */
        $data = array();
        $data['configs'] = $items;

        return view('admin.content.config.index', $data);
    }
}
