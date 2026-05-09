<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class Helpers
{
    public static function uploaded_asset($id)
    {
        if (($asset = \App\Models\Upload::find($id)) != null) {
            return Helpers::my_asset($asset->file_name);
        }
        return null;
    }
    public static function my_asset($path, $secure = null)
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return Storage::disk('s3')->url($path);
        } else {
            return app('url')->asset( $path, $secure);
        }
    }
}