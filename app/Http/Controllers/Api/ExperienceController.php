<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExperienceResource;
use App\Models\Experience;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Parameter;
use OpenApi\Attributes\Response;
use OpenApi\Attributes\Schema;

class ExperienceController extends Controller
{
    #[Get(
        path:'/api/experiences',
        summary: 'Получение списка работ',
        security: [['bearer_token' => []]],
        tags: ['Experiences'],
        responses: [
            new Response(
                response: 200,
                description: 'Список experiences',
                content: new JsonContent(
                    type: 'array',
                    items: new Items(
                        ref: '#/components/schemas/ExperienceResource'
                    )
                )
            ),
        ],
    )]
    public function index()
    {
        $experiences = Experience::with('technologies')->get();
        return ExperienceResource::collection($experiences);
    }

    #[Get(
        path:'/api/experiences/{experience}',
        summary: 'Получение одной работы',
        security: [['bearer_token' => []]],
        tags: ['Experiences'],
        parameters: [
            new Parameter(
                parameter: 'experience',
                name: 'experienceId',
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
                description: 'Experience',
                content: new JsonContent(
                    ref: '#/components/schemas/ExperienceResource'
                )
            ),
        ],
    )]
    public function show(Experience $experience)
    {
        return new ExperienceResource($experience);
    }
}
