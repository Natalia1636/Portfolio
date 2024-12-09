<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TrainingResource;
use App\Models\Training;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Parameter;
use OpenApi\Attributes\Response;
use OpenApi\Attributes\Schema;

class TrainingController extends Controller
{
    #[Get(
        path:'/api/trainings',
        summary: 'Получение списка курсов',
        security: [['bearer_token' => []]],
        tags: ['Trainings'],
        responses: [
            new Response(
                response: 200,
                description: 'Список trainings',
                content: new JsonContent(
                    type: 'array',
                    items: new Items(
                        ref: '#/components/schemas/TrainingResource'
                    )
                )
            ),
        ],
    )]
    public function index()
    {
        return TrainingResource::collection(Training::all());
    }

    #[Get(
        path:'/api/trainings/{training}',
        summary: 'Получение одного курса',
        security: [['bearer_token' => []]],
        tags: ['Trainings'],
        parameters: [
            new Parameter(
                parameter: 'training',
                name: 'trainingId',
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
                description: 'Training',
                content: new JsonContent(
                    ref: '#/components/schemas/TrainingResource'
                )
            ),
        ],
    )]
    public function show(Training $training)
    {
        return new TrainingResource($training);
    }
}
