<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\PostRequest;
use App\Http\Resources\V1\PostCollection;
use App\Http\Resources\V1\PostResource;
use App\Models\Post;
use App\Services\V1\PostQuery;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index(Request $request){
        $filter = new PostQuery();
        $queryItems = $filter->transform($request);
        
        if(count($queryItems) == 0){
            //return new PostCollection(Post::join('media','media.id','=','posts.file_id','left')->paginate());  // ::all() will return all records
            //return new PostCollection(Post::with("media")->paginate());
            return new PostCollection(Post::with("media")->paginate());
        }else{
            return new PostCollection(Post::where($queryItems)->paginate());
        }

        
    }

    public function show(Post $post){
        return new PostResource($post);
    }

    public function store(PostRequest $request){
        return new PostResource(Post::create($request->all()));
    }

    public function update(PostRequest $request, Post $post){
        $post->update($request->all());
        return new PostResource($post);
    }
}
