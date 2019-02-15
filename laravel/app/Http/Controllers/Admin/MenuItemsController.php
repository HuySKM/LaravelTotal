<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ContentCategoryModel;
use App\Model\Admin\ContentPageModel;
use App\Model\Admin\ContentPostModel;
use App\Model\Admin\ContentTagModel;
use App\Model\Admin\MenuItemsModel;
use App\Model\Admin\MenuModel;
use App\Model\Admin\ShopCategoryModel;
use App\Model\Admin\ShopProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MenuItemsController extends Controller
{

    /**
     * Hàm khởi tạo của class được chạy ngay khi khởi tạo đổi tượng
     * Hàm này nó luôn được chạy trước các hàm khác trong class
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $items = DB::table('menu_items')->paginate(10);

        $items = MenuItemsModel::getMenuItemRecursive();

        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();
        $data['menuitems'] = $items;

        return view('admin.content.menuitems.index', $data);
    }

    public function create() {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $data['types'] = MenuItemsModel::getTypeOfMenuItem();

        $data['menus'] = MenuModel::all();
        $data['menuitems'] = MenuItemsModel::getMenuItemRecursive();

        $data['shop_categories'] = ShopCategoryModel::all();
        $data['shop_products'] = ShopProductModel::all();
        $data['content_categories'] = ContentCategoryModel::all();
        $data['content_tags'] = ContentTagModel::all();
        $data['content_pages'] = ContentPageModel::all();
        $data['content_posts'] = ContentPostModel::all();

        return view('admin.content.menuitems.create', $data);
    }

    public function edit($id) {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $item = MenuItemsModel::find($id);
        $data['menu'] = $item;

        $data['types'] = MenuItemsModel::getTypeOfMenuItem();

        $data['menus'] = MenuModel::all();
        $data['menuitems'] = MenuItemsModel::getMenuItemRecursiveExcept($id);

        $data['shop_categories'] = ShopCategoryModel::all();
        $data['shop_products'] = ShopProductModel::all();
        $data['content_categories'] = ContentCategoryModel::all();
        $data['content_tags'] = ContentTagModel::all();
        $data['content_pages'] = ContentPageModel::all();
        $data['content_posts'] = ContentPostModel::all();

        return view('admin.content.menuitems.edit', $data);
    }

    public function delete($id) {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $item = MenuItemsModel::find($id);
        $data['menu'] = $item;

        return view('admin.content.menuitems.delete', $data);
    }

    public function store(Request $request) {

        $validatedData = $request->validate
        ([
            'name' => 'required|max:255',
            'type' => 'required',
            'desc' => 'required',
            'menu_id' => 'required',
        ]);

        $input = $request->all();

        $item = new MenuItemsModel();

        $params = array();

        $types = MenuItemsModel::getTypeOfMenuItem();
        foreach ($types as $type_key => $type) {
            $params['params_'.$type_key] = isset($input['params_'.$type_key]) ? $input['params_'.$type_key] : '';
        }

        $params_json = json_encode($params);

        $item->name = $input['name'];
        $item->type = isset($input['type']) ? $input['type'] : '';
        $item->params = $params_json;
        $item->link = isset($input['link']) ? $input['link'] : '';
        $item->desc = $input['desc'];
        $item->icon = isset($input['icon']) ? $input['icon'] : '';
        $item->menu_id = isset($input['menu_id']) ? $input['menu_id'] : 0;
        $item->parent_id = isset($input['parent_id']) ? $input['parent_id'] : 0;

        $item->save();

        return redirect('/admin/menuitems');
    }



    public function update(Request $request, $id) {

        $validatedData = $request->validate
        ([
            'name' => 'required|max:255',
            'type' => 'required',
            'desc' => 'required',
            'menu_id' => 'required',
        ]);

        $input = $request->all();

        $item = MenuItemsModel::find($id);

        $params = array();

        $types = MenuItemsModel::getTypeOfMenuItem();
        foreach ($types as $type_key => $type) {
            $params['params_'.$type_key] = isset($input['params_'.$type_key]) ? $input['params_'.$type_key] : '';
        }

        $params_json = json_encode($params);

        $item->name = $input['name'];

        $item->type = isset($input['type']) ? $input['type'] : '';
        $item->params = $params_json;
        $item->link = isset($input['link']) ? $input['link'] : '';
        $item->desc = $input['desc'];
        $item->icon = isset($input['icon']) ? $input['icon'] : '';
        $item->menu_id = isset($input['menu_id']) ? $input['menu_id'] : 0;
        $item->parent_id = isset($input['parent_id']) ? $input['parent_id'] : 0;

        $item->save();

        return redirect('/admin/menuitems');
    }

    public function destroy($id) {
        $item = MenuItemsModel::find($id);

        $item->delete();

        return redirect('/admin/menuitems');
    }
}
