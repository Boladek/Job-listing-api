<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobsResource extends JsonResource
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
            'id' => (string)$this->id,
            'type' => 'Jobs',
            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
                'type' => $this->type,
                'conditions' => $this->conditions,
                'categories' => $this->categories,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
             ] 
        ];
    }
}
