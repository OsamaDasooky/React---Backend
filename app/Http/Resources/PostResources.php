<?php

namespace App\Http\Resources;

use App\Http\Resources\CommentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
        [
            'postId' => $this->id,
            'postOwnerId' => $this->user->id ,
            'postOwner' => $this->user->first_name . " " . $this->user->last_name ,
            'post_Owner_photo' => $this->user->profile_image ,
            'postPhoto' => $this->photo,
            'content' => $this->content,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'postComments' => CommentResource::collection($this->comments)
        ];
    }
}
