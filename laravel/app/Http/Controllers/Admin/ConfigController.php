<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\ConfigModel;

class ConfigController extends Controller
{
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
