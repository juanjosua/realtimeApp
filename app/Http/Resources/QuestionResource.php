<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        // return specified fields rather than all fields
        return [
          'title' => $this->title,
          'slug' => $this->path,
          'body' => $this->body,
          'created_at' => $this->created_at->diffForHumans(),
          'user' => $this->user->name,
        ];
    }
}
