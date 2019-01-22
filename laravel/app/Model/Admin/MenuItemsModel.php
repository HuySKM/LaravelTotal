<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class MenuItemsModel extends Model
{
    public $table = 'menu_items';

    public static function getTypeOfMenuItems()
    {
        $types = array();
        $types[1] = 'Shop Category';
        $types[2] = 'Shop Product';
        $types[3] = 'Content Category';
        $types[4] = 'Content Post';
        $types[5] = 'Content Page';
        $types[6] = 'Content Tag';
        $types[7] = 'Customer Link';

        return $types;
    }

}
