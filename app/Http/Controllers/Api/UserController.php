<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Parameter;
use OpenApi\Attributes\Response;
use OpenApi\Attributes\Schema;

class UserController extends Controller
{
    #[Get(
        path:'/api/users',
        summary: 'Получение списка пользователей',
        security: [['bearer_token' => []]],
        tags: ['Users'],
        responses: [
            new Response(
                response: 200,
                description: 'Список users',
                content: new JsonContent(
                    type: 'array',
                    items: new Items(
                        ref: '#/components/schemas/UserResource'
                    )
                )
            ),
        ],
    )]
    public function index()
    {
        return UserResource::collection(User::all());
    }

    #[Get(
        path:'/api/users/{user}',
        summary: 'Получение одного пользователя',
        security: [['bearer_token' => []]],
        tags: ['Users'],
        parameters: [
            new Parameter(
                parameter: 'user',
                name: 'userId',
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
                description: 'User',
                content: new JsonContent(
                    ref: '#/components/schemas/UserResource'
                )
            ),
        ],
    )]
    public function show(User $user)
    {
        return new UserResource($user);
    }
}
