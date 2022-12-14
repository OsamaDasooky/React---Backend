<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comment_Owner_id' => $this->user->id ,
            'comment_Owner' => $this->user->first_name . " " . $this->user->last_name ,
            'comment_Owner_photo' => $this->user->profile_image ,
            'comment_id' => $this->id,
            'comment_content' => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
