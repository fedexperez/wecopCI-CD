<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EcoProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'facts' => $this->getFacts(),
            'description' => $this->getDescription(),
            'emision' => $this->getEmision(),
            'product_life' => $this->getProductLife(),
            'categories' => $this->getCategories(),
        ];
    }
}

