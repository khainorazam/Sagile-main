<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->proj_name,
            'description' => $this->proj_desc,
            'team' => $this->team_name,
            'statuses' => $this->statuses,
            'userstories' => $this->userstories,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            // 'sprints' => $this->sprints,
        ];
    }
}
