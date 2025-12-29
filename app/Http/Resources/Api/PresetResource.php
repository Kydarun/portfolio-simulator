<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PresetResource extends JsonResource
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
            'settings' => $this->settings,
            'is_public' => $this->is_public,
            'author' => new UserResource($this->whenLoaded('authorUser')),
            'instruments' => InstrumentResource::collection($this->whenLoaded('instruments')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
