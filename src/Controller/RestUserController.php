<?php

namespace App\Controller;

use App\Repository\UserRepository;
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
     * @param int $id
     * @param UserService $service
     * @param UserRepository $repository
     * @return JsonResponse
     */
    public function show(int $id, UserService $service, UserRepository $repository): JsonResponse
    {
        $user = $repository->find($id);
        $dataUser = $service->getUser($user);

        $response = new JsonResponse($dataUser);
        $response->setStatusCode('200', 'success');

        return $response;
    }

    /**
     * @Route("/create", methods={"POST"}, name="user_create")
     *
     * @param Request $request
     * @param UserService $service
     * @return JsonResponse
     */
    public function create(Request $request, UserService $service): JsonResponse
    {
        $service->create($request);

        $response = new JsonResponse();
        $response->setStatusCode('200', 'success');

        return $response;
    }

    /**
     * @Route("/{id}", methods={"PUT"}, name="user_update")
     *
     * @param int $id
     * @param Request $request
     * @param UserService $service
     * @param UserRepository $repository
     * @return JsonResponse
     */
    public function update(int $id, Request $request,  UserService $service, UserRepository $repository): JsonResponse
    {
        $user = $repository->find($id);
        $service->update($user, $request);

        $response = new JsonResponse();
        $response->setStatusCode('200', 'success');

        return $response;
    }

    /**
     * @Route("/{id}", methods={"DELETE"}, name="user_delete")
     *
     * @param int $id
     * @param UserService $service
     * @param UserRepository $repository
     * @return JsonResponse
     */
    public function delete(int $id, UserService $service, UserRepository $repository): JsonResponse
    {
        $user = $repository->find($id);
        $service->remove($user);

        $response = new JsonResponse();
        $response->setStatusCode('200', 'success');

        return $response;
    }
}
