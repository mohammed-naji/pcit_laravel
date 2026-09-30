<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'image' => $this->image ? url($this->image) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRy2uj3_mjrEub4V-3k68ibeHybc2gFzNBdYUgnpWj7HTeLpYg8meFpdY0E&s=10',
            'content' => $this->content,
            'created_at' => $this->created_at->format('d M, Y'), // 5 May, 2026
            'updated_at' => $this->updated_at->diffForHumans(),
            // 'updated_at' => $this->updated_at->toDateString(),
        ];
    }
}
