<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ShopProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopProductController extends Controller
{
    public function index()
    {
        $items = DB::table('shop_products')->paginate(10);
        /**
         * Biến truyền từ Controller xuống View
         */
        $data = array();
        $data['products'] = $items;

        return view('admin.content.shop.product.index', $data);

    }

    public function create()
    {
        $data = array();
        return view('admin.content.shop.product.create', $data);

    }

    public function edit($id)
    {
        $data = array();
        $item = ShopProductModel::find($id);
        $data['products'] = $item;
        return view('admin.content.shop.product.edit', $data);

    }

    public function delete($id)
    {
        $data = array();
        $item = ShopProductModel::find($id);
        $data['products'] = $item;
        return view('admin.content.shop.product.delete', $data);

    }


    public function store(Request $request)
    {
        $input = $request->all();
        $item = new ShopProductModel();
        $item ->name = $input['name'];
        $item ->slug = $input['slug'];
        $item ->images = $input['images'];
        $item ->intro = $input['intro'];
        $item ->desc = $input['desc'];
        $item ->priceCore = $input['priceCore'];
        $item ->priceSale = $input['priceSale'];
        $item ->stock = $input['stock'];
        $item ->cat_id = $input['cat_id'];

        $item->save();
        return redirect('admin/shop/product');
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $item = ShopProductModel::find($id);
        $item ->name = $input['name'];
        $item ->slug = $input['slug'];
        $item ->images = $input['images'];
        $item ->intro = $input['intro'];
        $item ->desc = $input['desc'];
        $item ->priceCore = $input['priceCore'];
        $item ->priceSale = $input['priceSale'];
        $item ->stock = $input['stock'];
        $item ->cat_id = $input['cat_id'];

        $item->save();
        return redirect('admin/shop/product');

    }

    public function destroy($id)
    {
        $item = ShopProductModel::find($id);
        $item->delete();

        return redirect('admin/shop/product');

    }
}
