<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rest/user", name="rest_")
 */
class RestUserController extends AbstractController
{
    /**
     * @Route("/{id}", methods={"GET"}, name="user_show")
     *
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $response = new JsonResponse();
        $response->setStatusCode('200', 'OK');

        return $response;
    }

    /**
     * @Route("/create", methods={"POST"}, name="user_create")
     *
     * @param Request $request
     * @param UserService $userService
     * @return JsonResponse
     */
    public function create(Request $request, UserService $userService): JsonResponse
    {
        $userService->create($request);

        $response = new JsonResponse();
        $response->setStatusCode('200', 'OK');

        return $response;
    }

    /**
     * @Route("/{id}/update", methods={"PUT"}, name="user_update")
     *
     * @return JsonResponse
     */
    public function update(Request $request, User $id): JsonResponse
    {
    }

    /**
     * @Route("/{id}", methods={"DELETE"}, name="user_delete")
     *
     * @return JsonResponse
     */
    public function delete(User $id): JsonResponse
    {
    }
}
