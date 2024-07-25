<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Node;

class AddNumberController extends AbstractController
{


    #[Route('/', name: 'app_save', methods:['POST'])]

    public function SaveNode(ManagerRegistry $mng, Request $req): Response
    {
        $entityManager = $mng->getManager();

        $node = new Node();

        $data = $req->getPayload();

        $name = $data->get('name');
        $phone = $data->get('phone');
        $node->setName($name);
        $node->setPhone($phone);


        $entityManager->persist($node);
        $entityManager->flush();

        return $this->redirectToRoute('app_get');
       
    }


    #[Route('/', name: 'app_add_number', methods:['GET'])]
    public function index(): Response
    {
        return $this->render('add_number/index.html.twig', [
            'controller_name' => 'AddNumberController',
        ]);
    }
}
