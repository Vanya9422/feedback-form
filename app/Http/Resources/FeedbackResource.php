<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $phone
 * @property mixed $id
 * @property mixed $name
 * @property mixed $message
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property mixed $uuid
 */
class FeedbackResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->whenNotNull($this->id),
            'uuid' => $this->whenNotNull($this->uuid),
            'name' => $this->whenNotNull($this->name),
            'phone' => $this->whenNotNull($this->phone),
            'message' => $this->whenNotNull($this->message),
            'created_at' => $this->whenNotNull($this->created_at),
            'updated_at' => $this->whenNotNull($this->updated_at),
        ];
    }
}
