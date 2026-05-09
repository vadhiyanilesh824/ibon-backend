<?php

/**
 * Get Assets from system
 */

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;

if (!function_exists('api_asset')) {
    function api_asset($id)
    {
        if (($asset = \App\Models\Upload::find($id)) != null) {
            return $asset->file_name;
        }
        return "";
    }
}

//return file uploaded via uploader
if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id)
    {
        if (($asset = \App\Models\Upload::find($id)) != null) {
            return my_asset($asset->file_name);
        }
        return null;
    }
}

if (!function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function my_asset($path, $secure = null)
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return Storage::disk('s3')->url($path);
        } else {
            return app('url')->asset($path, $secure);
        }
    }
}

if (!function_exists('static_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function static_asset($path, $secure = null)
    {
        return app('url')->asset('public/' . $path, $secure);
    }
}

if (!function_exists('formatBytes')) {
    function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}


if (!function_exists('site_settings')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function site_settings($key, $url = true)
    {
        $setting = SiteSetting::where('key', $key)->first();
        if ($setting) {
            if ($setting->value == null) {
                return '';
            } else if ($url && $setting->type == 'image') {
                return \App\Services\Helpers::uploaded_asset($setting->value);
            }
            return $setting->value;
        } else {
            return '';
        }
    }
}

if (!function_exists('get_children_category_menu')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function get_children_category_menu($cat, $slug)
    {
        $html = '';
        if ($cat->childrenCategories()->count() > 0) {
            $html .= '<ul class="list show_hide_collapse_' . $cat->id . '_list">';
            foreach ($cat->childrenCategories as $child) {
                $trxt = "'show_hide_collapse_" . $child->id . "'";
                $html .= ' <li class=" ' . ($slug == $child->slug ? 'active fw-900 text-base-color' : '') . '">
                                                            <i
                                                                    class="fa fa-angle-right" onclick="show_hide_collapse(' . $trxt . ',this)"></i><a href="' . route('site.product', $child->slug) . '"
                                                                    class="inherited-a ' . ($slug == $child->slug ? 'active fw-900 text-base-color' : '') . '">
                                                                &nbsp; ' . $child->name . '</a>
                                                        </li>';
                $html .= get_children_category_menu($child, $slug);
            }
            $html .= '</ul>';
        }
        return  $html;
    }
}
if (!function_exists('get_children_category_options')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */

    function get_children_category_options($cat, $count,$sc , $id)
    {
        $html = '';
        if ($cat->childrenCategories()->count() > 0) {
            foreach ($cat->childrenCategories as $child) {
                $html .= '<option class="sc'.$id.' sc" value="' . $child->id . '" '.($child->id == $sc ? 'selected':'').'>' . $count . $child->name . '</option>';
                $html .= get_children_category_options($child, $count . ' -- ',$sc,$id);
            }
        }
        return  $html;
    }
}
if (!function_exists('get_parent_category_menu')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function get_parent_category_menu($category)
    {
        $html = '<a class="" href="' .
            route('site.product', $category->slug) .
            '">' .
            $category->name .
            '</a>';
        if ($category->parentCategory != NULL) {
            $html = ' / ' . $html;
            $html = get_parent_category_menu($category->parentCategory) . $html;
        }
        return  $html;
    }
}
