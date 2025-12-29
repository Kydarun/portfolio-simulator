<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RunStateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'iteration' => $this->iteration,
            'simulated_time' => $this->simulated_time,
            'cash' => $this->cash,
            'total_value' => $this->total_value,
            'positions' => $this->positions,
            'metrics' => $this->metrics,
            'run' => new RunResource($this->whenLoaded('run')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
