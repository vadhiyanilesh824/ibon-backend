<?php

namespace App\Http\Resources\V1;

use App\Models\Media;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'file' =>  MediaResource::collection($this->media)->first() //Media::where('id','=',$this->media_id)->first()//MediaResource::collection($this->whenLoaded('media')) 
        ];
    }
}
