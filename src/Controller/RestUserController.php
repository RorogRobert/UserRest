<?php

namespace App\Controller;

use App\Entity\User;
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
    public function show(User $id): JsonResponse
    {
    }

    /**
     * @Route("/create", methods={"POST"}, name="user_create")
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
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
