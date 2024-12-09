<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TechnologyResource;
use App\Models\Technology;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Parameter;
use OpenApi\Attributes\Response;
use OpenApi\Attributes\Schema;

class TechnologyController extends Controller
{
    #[Get(
        path:'/api/technologies',
        summary: 'Получение списка технологий',
        security: [['bearer_token' => []]],
        tags: ['Technologies'],
        responses: [
            new Response(
                response: 200,
                description: 'Список technologies',
                content: new JsonContent(
                    type: 'array',
                    items: new Items(
                        ref: '#/components/schemas/TechnologyResource'
                    )
                )
            ),
        ],
    )]
    public function index()
    {
        return TechnologyResource::collection(Technology::all());
    }

    #[Get(
        path:'/api/technologies/{technology}',
        summary: 'Получение одной технологии',
        security: [['bearer_token' => []]],
        tags: ['Technologies'],
        parameters: [
            new Parameter(
                parameter: 'technology',
                name: 'technologyId',
                description: 'Уникальный ключ',
                in: 'path',
                required: true,
                schema: new Schema(
                    type: 'integer',
                    format: 'int64',
                )
            ),
        ],
        responses: [
            new Response(
                response: 200,
                description: 'Technology',
                content: new JsonContent(
                    ref: '#/components/schemas/TechnologyResource'
                )
            ),
        ],
    )]
    public function show(Technology $technology)
    {
        return new TechnologyResource($technology);
    }
}
