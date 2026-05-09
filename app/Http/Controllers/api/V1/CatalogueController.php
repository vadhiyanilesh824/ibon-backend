<?php

namespace App\Http\Controllers\api\V1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalogue;
use App\Models\Category;
use GrahamCampbell\ResultType\Success;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\DB;

class CatalogueController extends Controller
{
   public function catalogue()
   {
        $cat =  DB::table('categories')->where('parent_id',0)->join('catalogues','catalogues.parentcategory_id','=','categories.id')->where('catalogues.id','!=',null)->select('categories.id','categories.name')->get();
        $category = Category::where('parent_id',0)->join('catalogues','catalogues.parentcategory_id','=','categories.id')->where('catalogues.id','!=',null)->select('categories.id','categories.name')->get()->map(function($data){
            $catalogue = Catalogue::where('category_id',$data->id)->get();
            $data['catalogues'] = $catalogue;
            return $data;
        })->toArray();
        // $catalogue = Catalogue::join('categories','catalogues.category_id','=','categories.id')->select('catalogues.id','catalogues.title','catalogues.description','catalogues.pdf','catalogues.image','categories.name as category_name')->get();
        return response()->json([
       
            'success'=>true,
            'Message'=>'Success fully got it',
            'code'=>200,
            'data'=>array(
            'category'=>$cat,
            'catalogue'=>$category
        
            )
           
        ]);
   }
}
