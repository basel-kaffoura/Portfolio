<?php

namespace App\Http\Resources\Api\Frontend;

use App\Http\Resources\Api\Frontend\Users\DiscountPriceResources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'p_id' => $this->p_id,
            'name' => $this->name,
            'sale_price' => $this->sale_price,
            'slug' => $this->slug,
            'sku' => $this->sku,
            'image' => asset(Storage::url('products/' . $this->image)),
            'discount' => $this->discount,
            'type' => $this->type,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'expire_date' => $this->expire_date,
        ];
    }
}