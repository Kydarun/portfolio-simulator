<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExperimentResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'tick_interval_seconds' => $this->tick_interval_seconds,
            'initial_cash' => $this->initial_cash,
            'settings' => $this->settings,
            'status' => $this->status,
            'owner' => new UserResource($this->whenLoaded('ownerUser')),
            'preset' => new PresetResource($this->whenLoaded('preset')),
            'instruments' => InstrumentResource::collection($this->whenLoaded('instruments')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
