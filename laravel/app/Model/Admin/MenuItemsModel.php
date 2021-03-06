<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenuItemsModel extends Model
{
    public $table = 'menu_items';

    public static function outputLevelCategories($input_categories, &$output_categories, $parent_id = 0, $lvl = 1) {

        if (count($input_categories) > 0) {
            foreach ($input_categories as $key =>  $category) {
                $category = (array) $category;
                if ($category['parent_id'] == $parent_id) {
                    $category['level'] = $lvl;
                    $output_categories[] = (array) $category;
                    unset($input_categories[$key]);

                    $new_parent_id = $category['id'];
                    $new_level = $lvl + 1;
                    self::outputLevelCategories($input_categories, $output_categories, $new_parent_id, $new_level);
                }
            }
        }

    }

    public static function outputLevelCategoriesExcept($input_categories, &$output_categories, $parent_id = 0, $lvl = 1, $except) {

        if (count($input_categories) > 0)
        {
            foreach ($input_categories as $key => $category) {
                if ($category['parent_id'] == $parent_id) {
                    $category['level'] = $lvl;
                    if ($category['id'] != $except) {
                        $output_categories[] = (array)$category;
                    }
                    unset($input_categories[$key]);

                    if ($category['id'] != $except)  {
                        $new_parent_id = $category['id'];
                        $new_level = $lvl + 1;
                        self::outputLevelCategoriesExcept($input_categories, $output_categories, $new_parent_id, $new_level, $except);
                    }

                }
            }
        }

    }

    public static function getMenuItemRecursiveExcept($except)
    {
        $result = array();
        $source = MenuItemsModel::all()->toArray();

        self::outputLevelCategoriesExcept($source, $result, 0, 1, $except);

        return $result;
    }

    public static function getMenuItemRecursive()
    {
        $result = array();
        $source = MenuItemsModel::all()->toArray();

        self::outputLevelCategories($source, $result);

        return $result;
    }

    public static function getTypeOfMenuItem()
    {

        $types = array();
        $types[1] = 'Shop Category';
        $types[2] = 'Shop Product';
        $types[3] = 'Content Category';
        $types[4] = 'Content Post';
        $types[5] = 'Content Page';
        $types[6] = 'Content Tag';
        $types[7] = 'Custom Link';

        return $types;

    }

    public static function getMenuItemsByHeader()
    {
        $menu_header = DB::table('menus')->where('location', 1)->first();
        if (isset($menu_header->id)) {
            $source = DB::table('menu_items')->where('menu_id', $menu_header->id)->get()->toArray();
            $result = array();

            self::outputLevelCategories($source, $result);
        } else {
            $result = array();
        }
        return $result;
    }

    public static function getMenuItemsByFooter1()
    {
        $menu_header = DB::table('menus')->where('location', 2)->first();
        if (isset($menu_header->id)) {
            $menu_items_header = DB::table('menu_items')->where('menu_id', $menu_header->id)->get();
        } else {
            $menu_items_header = array();
        }

        return $menu_items_header;
    }

    public static function getMenuItemsByFooter2()
    {
        $menu_header = DB::table('menus')->where('location', 3)->first();
        if (isset($menu_header->id)) {
            $menu_items_header = DB::table('menu_items')->where('menu_id', $menu_header->id)->get();
        } else {
            $menu_items_header = array();
        }

        return $menu_items_header;
    }

    public static function getMenuItemsByFooter3()
    {
        $menu_header = DB::table('menus')->where('location', 4)->first();
        if (isset($menu_header->id)) {
            $menu_items_header = DB::table('menu_items')->where('menu_id', $menu_header->id)->get();
        } else {
            $menu_items_header = array();
        }
        return $menu_items_header;
    }

    public static function buildMenuHTML($input_categories, &$html, $parent_id = 0, $lvl = 1)
    {
        if (count($input_categories) > 0) {
            if ($lvl == 1) {
                $html .= "<ul class=\"nav navbar-nav \">";
            } elseif ($lvl == 2) {
                $html .= "<ul class=\"dropdown-menu multi\">
                                <div class=\"row\">
                                    <ul class=\"multi-column-dropdown\">";
            } else {
                // Không hiện
            }

            foreach ($input_categories as $key => $category)
            {
                if ($category['parent_id'] == $parent_id) {
                    $category['level'] = $lvl;
                    if ($lvl == 1) {
                        $html .= '<li class="dropdown1"><a href="about.html" class="hyper"><span>';
                    } elseif ($lvl == 2) {
                        $html .= '<li><a href="jewellery.html"><i class="fa fa-angle-right" aria-hidden="true"></i>';
                    } else {

                    }
                    if ($lvl == 1 || $lvl == 2) {
                        $html .= $category['name'];
                    }
                    unset($input_categories[$key]);

                    $new_parent_id = $category['id'];
                    $new_level = $lvl + 1;
                    self::buildMenuHTML($input_categories, $html, $new_parent_id, $new_level);

                    if ($lvl == 1) {
                        $html .= '</span></a></li>';
                    } elseif ($lvl == 2) {
                        $html .= '</a></li>';
                    } else {

                    }
                }
            }
            if ($lvl == 1)
            {
                $html .= "</ul>";
            } elseif ($lvl == 2) {
                $html .= "</ul><div class=\"clearfix\"></div>
                                </div>
                            </ul>";
            } else {
                // Không hiện
            }
        }
    }

    public static function getMenuUlLi($source)
    {
        $html_menu = '';

        self::buildMenuHTML($source, $html_menu);

        return $html_menu;
    }
}
