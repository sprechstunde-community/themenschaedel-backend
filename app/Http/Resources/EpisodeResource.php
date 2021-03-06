<?php

namespace App\Http\Resources;

use App\Models\Claim;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EpisodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return array_merge(parent::toArray($request), [
            'claimed' => $this->claimed instanceof Claim,
            'upvotes' => count($this->votes()->where('positive', true)->get()),
            'downvotes' => count($this->votes()->where('positive', false)->get()),
            'flags' => count($this->flags),
        ]);
    }
}
