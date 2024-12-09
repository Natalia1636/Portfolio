<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use OpenApi\Attributes\Xml;

#[Schema(
    title: 'TrainingResource',
    description: 'Trainings',
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
            property: 'qualification',
            description: 'Квалификация',
            type: 'string',
        ),
        new Property (
            property: 'programme_name',
            description: 'Программа',
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
    ],
    xml:new Xml(
        name: 'TrainingResource',
    )
)]
class TrainingResource extends JsonResource
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
            'qualification'=>$this->qualification,
            'programme_name'=>$this->programme_name,
            'date_from'=>Carbon::parse($this->date_from)->translatedFormat('F Y'),
            'date_to'=>Carbon::parse($this->date_to)->translatedFormat('F Y'),
        ];
    }
}
