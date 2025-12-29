<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RunResource extends JsonResource
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
            'status' => $this->status,
            'random_seed' => $this->random_seed,
            'current_time' => $this->current_time,
            'iteration' => $this->iteration,
            'data_version' => $this->data_version,
            'experiment' => new ExperimentResource($this->whenLoaded('experiment')),
            'run_states' => RunStateResource::collection($this->whenLoaded('runStates')),
            'orders' => OrderResource::collection($this->whenLoaded('orders')),
            'trades' => TradeResource::collection($this->whenLoaded('trades')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
