<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * UserService constructor.
     * @param EntityManagerInterface $em
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->em = $em;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param User $user
     * @return array
     */
    public function getUser(User $user): array
    {
        return [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'username' => $user->getUsername(),
            ];
    }

    /**
     * @param Request $request
     * @return User
     */
    public function create(Request $request): User
    {
        $data = $this->requestJsonDecode($request);

        $user = new User;
        $password = $this->passwordEncoder->encodePassword($user, $data['password']);
        $user->setEmail($data['email']);
        $user->setUsername($data['username']);
        $user->setPassword($password);
        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }

    /**
     * @param User $user
     * @param Request $request
     */
    public function update(User $user, Request $request)
    {
        $data = $this->requestJsonDecode($request);
        $user->setEmail($data['email']);
        $user->setUsername($data['username']);
        $this->em->flush();
    }

    /**
     * @param User $user
     */
    public function remove(User $user)
    {
        $this->em->remove($user);
        $this->em->flush();
    }

    /**
     * @param Request $request
     * @return array
     */
    private function requestJsonDecode(Request $request): array
    {
        return json_decode($request->getContent(), true);
    }
}
