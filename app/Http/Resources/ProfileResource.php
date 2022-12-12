<?php

namespace App\Http\Resources;

use App\Models\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id_user' => $this->id,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'email' => $this->email,
            'profileImage' => $this->profile_image,
            'userPoints' => $this->points,
            'role' => $this->role,
            'User_posts' => PostResources::collection( $this->posts),
            'User_comments' => UserCommentResource::collection( $this->comments),
            'saved_Articles' => ArticleResource::collection($this->articles)


        ];
    }
}
