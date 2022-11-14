<?php


namespace app\models;


use wfm\App;

class Breadcrumbs extends AppModel
{
    public static function getBreadcrumbs($category_id, $name = ''):string {
        $lang = App::$app->getProperty('language');
        $categories = App::$app->getProperty("categories_{$lang['code']}");
        $breadcrumbs_array = self::getParts($categories, $category_id);
        $breadcrumbs = "<li class='breadcrumb-item'><a href='" . base_url() . "'>" . ___('tpl_home_breadcrumbs') . "</a></li>";
        if ($breadcrumbs_array) {
            foreach ($breadcrumbs_array as $slug => $title) {
                $breadcrumbs .= "<li class='breadcrumb-item'><a href='category/{$slug}'>{$title}</a></li>";
            }
        }
        if ($name) {
            $breadcrumbs .= "<li class='breadcrumb-item active'>$name</li>";
        }
        return $breadcrumbs;
    }
    
    public static function getParts($cats, $id): array|false {
        if(!$id) {
            return false;
        }
        $breadcrumbs = [];
        foreach ($cats as $k=>$v) {
            if(isset($cats[$id])){
                $breadcrumbs[$cats[$id]['slug']] = $cats[$id]['title'];
                $id = $cats[$id]['parent_id'];
            } else {
                break;
            }
        }
        return array_reverse($breadcrumbs, true);
    }
}