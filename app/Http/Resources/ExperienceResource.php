<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use OpenApi\Attributes\Xml;

#[Schema(
    title: 'ExperienceResource',
    description: 'Experiences',
    properties: [
        new Property (
            property: 'id',
            description: 'Идентификатор записи',
            type: 'integer',
        ),
        new Property (
            property: 'position',
            description: 'Должность',
            type: 'string',
        ),
        new Property (
            property: 'short_description',
            description: 'Краткое описание',
            type: 'string',
        ),
        new Property (
            property: 'date_from',
            description: 'Дата до',
            type: 'string',
        ),
        new Property (
            property: 'date_to',
            description: 'Дата после',
            type: 'string',
        ),
        new Property (
            property: 'company_name',
            description: 'Компания',
            type: 'string',
        ),
        new Property (
            property: 'technologies',
            description: 'Технологии',
            type: 'string',
        ),
    ],
    xml:new Xml(
        name: 'ExperienceResource',
    )
)]
class ExperienceResource extends JsonResource
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
            'position'=>$this->position,
            'short_description'=>$this->short_description,
            'date_from'=>Carbon::parse($this->date_from)->translatedFormat('F Y'),
            'date_to'=>Carbon::parse($this->date_to)->translatedFormat('F Y'),
            'company_name'=>$this->company_name,
            'technologies'=>TechnologyResource::collection($this->technologies),
        ];
    }
}
