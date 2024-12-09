<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use OpenApi\Attributes\Xml;

#[Schema(
    title: 'ProjectResource',
    description: 'Projects',
    properties: [
        new Property (
            property: 'id',
            description: 'Идентификатор записи',
            type: 'integer',
        ),
        new Property (
            property: 'title',
            description: 'Название',
            type: 'string',
        ),
        new Property (
            property: 'description',
            description: 'Описание',
            type: 'string',
        ),
        new Property (
            property: 'position',
            description: 'Должность',
            type: 'string',
        ),
        new Property (
            property: 'link',
            description: 'Ссылка',
            type: 'string',
        ),
        new Property (
            property: 'image',
            description: 'Картинка',
            type: 'string',
        ),
    ],
    xml:new Xml(
        name: 'ProjectResource',
    )
)]
class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'link'=>$this->link,
            'image'=>asset('storage/' . $this->image),
        ];
    }
}
