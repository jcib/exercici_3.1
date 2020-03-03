<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use App\Entity\User; 


class RoleController extends AbstractController
{
    /**
     * @Route("/role", name="role")
     */
    public function index()
    {
        // Determinamos el rol máximo (user, super o admin)
        $roles_array = $this->getUser()->getRoles();
        $salir = false;

        for ($i=0; $i < count($roles_array) && $salir == false; $i++) { 
            if($roles_array[$i] == "ROLE_ADMIN") {
                $role_maximo = "ROLE_ADMIN";
                $salir = true;
            } 
            if($roles_array[$i] == "ROLE_SUPER") {
                $role_maximo = "ROLE_SUPER";
                $salir = true;
            } 
            if($roles_array[$i] == "ROLE_USER") {
                $role_maximo = "ROLE_USER";
                $salir = true;
            } 
        }

        if($role_maximo == "ROLE_ADMIN") {
            $array_users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();
        } else if($role_maximo == "ROLE_SUPER") {
            $array_users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findSuperAndUsers();
        } else if($role_maximo == "ROLE_USER") {            
            $array_users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findUsersOnly();
        }
        
        return $this->render('role/index.html.twig', [
            'controller_name' => 'RoleController',
            'role_maximo' => $role_maximo,
            'array_users' => $array_users
        ]);
    }
}
