<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IssueResource extends JsonResource
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
            'bug_number_id' => $this->bug_number_id,
            'title' => $this->title,
            'environment' => $this->environment,
            'steps_to_reproduce' => $this->steps_to_reproduce,
            'expected_result' => $this->expected_result,
            'actual_result' => $this->actual_result,
            'visual_proof' => $this->visual_proof,
            'priority' => $this->priority,
            'status' => $this->status,
            'reporter' => $this->reporter,
            'assign_to' => $this->assign_to,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
          ];
    }
}
