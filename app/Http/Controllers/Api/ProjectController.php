<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Parameter;
use OpenApi\Attributes\Response;
use OpenApi\Attributes\Schema;

class ProjectController extends Controller
{
    #[Get(
        path:'/api/projects',
        summary: 'Получение списка проектов',
        security: [['bearer_token' => []]],
        tags: ['Projects'],
        responses: [
            new Response(
                response: 200,
                description: 'Список projects',
                content: new JsonContent(
                    type: 'array',
                    items: new Items(
                        ref: '#/components/schemas/ProjectResource'
                    )
                )
            ),
        ],
    )]
    public function index()
    {
        return ProjectResource::collection(Project::all());
    }

    #[Get(
        path:'/api/projects/{project}',
        summary: 'Получение одного проекта',
        security: [['bearer_token' => []]],
        tags: ['Projects'],
        parameters: [
            new Parameter(
                parameter: 'project',
                name: 'projectId',
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
                description: 'Project',
                content: new JsonContent(
                    ref: '#/components/schemas/ProjectResource'
                )
            ),
        ],
    )]
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }
}
