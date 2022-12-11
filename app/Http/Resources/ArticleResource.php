<?php

namespace App\Http\Resources;

use App\Http\Resources\CommentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'article_id' => $this->id,
            'title' => $this->list_title,
            'author' => $this->list_author,
            'published_date' => $this->list_published_date,
            'published_date_precision' => $this->list_published_date_precision,
            'link' => $this->list_link,
            'clean_url' => $this->list_clean_url,
            'excerpt' => $this->list_excerpt,
            'summary' => $this->list_summary,
            'rights' => $this->list_rights,
            'rank' => $this->list_rank,
            'topic' => $this->list_topic,
            'country' => $this->list_country,
            'language' => $this->list_language,
            'authors' => $this->list_authors,
            'media' => $this->list_media,
            'is_opinion' => $this->list_is_opinion,
            'twitter_account' => $this->list_twitter_account,
            'score' => $this->list_score,


        ];
    }
}
