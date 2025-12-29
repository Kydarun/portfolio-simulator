<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TradeResource extends JsonResource
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
            'price' => $this->price,
            'quantity' => $this->quantity,
            'commission' => $this->commission,
            'executed_price' => $this->executed_price,
            'meta' => $this->meta,
            'run' => new RunResource($this->whenLoaded('run')),
            'order' => new OrderResource($this->whenLoaded('order')),
            'instrument' => new InstrumentResource($this->whenLoaded('instrument')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
