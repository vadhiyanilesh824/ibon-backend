<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MediaCollection;
use App\Models\Media;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{
    //
    function index(Request $request){
        return new MediaCollection(Media::paginate());
    }
    
    public function upload(Request $request){
        $type = array(
            "jpg"=>"image",
            "jpeg"=>"image",
            "png"=>"image",
            "svg"=>"image",
            "webp"=>"image",
            "gif"=>"image",
            // "mp4"=>"video",
            // "mpg"=>"video",
            // "mpeg"=>"video",
            // "webm"=>"video",
            // "ogg"=>"video",
            // "avi"=>"video",
            // "mov"=>"video",
            // "flv"=>"video",
            // "swf"=>"video",
            // "mkv"=>"video",
            // "wmv"=>"video",
            // "wma"=>"audio",
            // "aac"=>"audio",
            // "wav"=>"audio",
            // "mp3"=>"audio",
            // "zip"=>"archive",
            // "rar"=>"archive",
            // "7z"=>"archive",
            // "doc"=>"document",
            // "txt"=>"document",
            // "docx"=>"document",
            "pdf"=>"document"
            // "csv"=>"document",
            // "xml"=>"document",
            // "ods"=>"document",
            // "xlr"=>"document",
            // "xls"=>"document",
            // "xlsx"=>"document"
        );

        if($request->hasFile('file')){
            $upload = new Upload;
            $extension = strtolower($request->file('file')->getClientOriginalExtension());

            if(isset($type[$extension])){
                $upload->file_original_name = null;
                $arr = explode('.', $request->file('file')->getClientOriginalName());
                for($i=0; $i < count($arr)-1; $i++){
                    if($i == 0){
                        $upload->file_original_name .= $arr[$i];
                    }
                    else{
                        $upload->file_original_name .= ".".$arr[$i];
                    }
                }

                $path = $request->file('file')->store('uploads/all', 'local');
                $size = $request->file('file')->getSize();
                $file_mime = $request->file('file')->getClientMimeType();
                // Return MIME type ala mimetype extension
                // $finfo = finfo_open(FILEINFO_MIME_TYPE); 
                // $finfo = ; 

                // Get the MIME type of the file
                // $file_mime = finfo_file($finfo, base_path('public/').$path);
                // $file_mime = finfo_file($finfo, base_path('public/').$path);
                // && get_setting('disable_image_optimization') != 1
                if($type[$extension] == 'image'){
                    try {
                        $img = Image::make($request->file('file')->getRealPath())->encode();
                        $height = $img->height();
                        $width = $img->width();
                        if($width > $height && $width > 1500){
                            $img->resize(1500, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                        }elseif ($height > 1500) {
                            $img->resize(null, 800, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                        }
                        $img->save(base_path('public/').$path);
                        clearstatcache();
                        $size = $img->filesize();

                    } catch (\Exception $e) {
                        //dd($e);
                    }
                }
                
                if (env('FILESYSTEM_DRIVER') == 's3') {
                    Storage::disk('s3')->put(
                        $path,
                        file_get_contents(base_path('public/').$path),
                        [
                            'visibility' => 'public',
                            'ContentType' =>  $extension == 'svg' ? 'image/svg+xml' : $file_mime
                        ]
                    );
                    if($arr[0] != 'updates') {
                        unlink(base_path('public/').$path);
                    }
                }

                $upload->extension = $extension;
                $upload->file_name = $path;
                $upload->user_id = Auth::user()->id??$request->user_id??0;
                $upload->type = $type[$upload->extension];
                $upload->file_size = $size;
                $upload->save();
            }
            return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully store file',
            'data' => array(
                $upload
            )
        ]);
        }
        return response()->json([

            'success' => false,
            'code' => 200,
            'message' => 'failed to store file',
            'data' => array(
            )
        ]);
    }
}
