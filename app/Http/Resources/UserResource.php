<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use OpenApi\Attributes\Xml;

#[Schema(
    title: 'UserResource',
    description: 'Users',
    properties: [
        new Property (
            property: 'id',
            description: 'Идентификатор записи',
            type: 'integer',
        ),
        new Property (
            property: 'name',
            description: 'Имя',
            type: 'string',
        ),
        new Property (
            property: 'surname',
            description: 'Фамилия',
            type: 'string',
        ),
        new Property (
            property: 'position',
            description: 'Должность',
            type: 'string',
        ),
        new Property (
            property: 'description',
            description: 'О себе',
            type: 'string',
        ),
        new Property (
            property: 'interests',
            description: 'Интересы',
            type: 'string',
        ),
        new Property (
            property: 'linkedin',
            description: 'linkedin',
            type: 'string',
        ),
        new Property (
            property: 'telegram',
            description: 'telegram',
            type: 'string',
        ),
        new Property (
            property: 'gitlab',
            description: 'gitlab',
            type: 'string',
        ),
        new Property (
            property: 'github',
            description: 'github',
            type: 'string',
        ),
        new Property (
            property: 'image',
            description: 'image',
            type: 'string',
        ),
    ],
    xml:new Xml(
        name: 'UserResource',
    )
)]
class UserResource extends JsonResource
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
            'name'=>$this->name,
            'surname'=>$this->surname,
            'position'=>$this->position,
            'description'=>$this->description,
            'interests'=>$this->interests,
            'image'=>asset('storage/' . $this->image),
            'linkedin'=>$this->linkedin,
            'telegram'=>$this->telegram,
            'gitlab'=>$this->gitlab,
            'github'=>$this->github,
        ];
    }
}
